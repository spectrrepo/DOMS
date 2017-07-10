<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use Auth;
use Hash;
use DB;
use Mail;

use App\Models\Post;
use App\Models\User;
use App\Models\UserSocial;

class UserController extends BasePhotoController
{
    /**
     * @param $firstEl
     * @param $lastEl
     * @return array
     */
    private function getPartPosts ( $firstEl, $lastEl)
    {
        $firstEl -= 1;
        $posts =  DB::select("SELECT * FROM (
                                  (
                                    SELECT favorites.post_id AS postId,
                                           favorites.date AS dateEvent
                                    FROM favorites 
                                    JOIN users ON favorites.user_id = users.id
                                  )
                                  UNION
                                  (
                                    SELECT likes.post_id AS postId,
                                           likes.date AS dateEvent
                                    FROM likes 
                                    JOIN users ON likes.user_id = users.id
                                  )
                                  UNION
                                  (
                                    SELECT comments.post_id AS postId,
                                           comments.date AS dateEvent
                                    FROM comments 
                                    JOIN users ON comments.user_id = users.id
                                    WHERE comments.status=true
                                  )) AS events  
                                JOIN(
                                      SELECT posts.id AS postId,
                                             posts.img_middle AS image,
                                             users.id AS idAuthor,
                                             users.name AS nameAuthor,
                                             users.sex AS sexAuthor,
                                             users.img_square AS avaAuthor,
                                             posts.views AS num_views
                                      FROM users JOIN posts ON users.id=posts.author_id
                                    ) AS posts
                                ON events.postId=posts.postId
                                GROUP BY DATE_FORMAT (dateEvent,'%d-%m-%Y')
                                ORDER BY dateEvent ASC
                                LIMIT ?,?;", [$firstEl, $lastEl]);
        return $posts;
    }

    /**
     * @param $rawPosts
     * @return mixed
     */
    private function formPosts ($rawPosts)
    {
        $posts = [];

        foreach ( $rawPosts as $item){
            $newPost = [
                "id" => $item->postId,
                "image" => $item->image,
                "idAuthor" => $item->idAuthor,
                "nameAuthor" => $item->idAuthor,
                "avaAuthor" => $item->idAuthor,
                "sexAuthor" => $item->idAuthor,
                "numViews" => $item->idAuthor,
                "numLikes" => LikesController::numLikes($item->postId),
                "numFavorites" => FavoritesController::numFavorites($item->postId),
                "dateEvent" => $item->dateEvent,
                "comments" => CommentsController::newsThreeCommentLoad($item->postId, $item->dateEvent),
                "likes" => LikesController::newsLikesLoad($item->postId, $item->dateEvent),
                "favorites" => FavoritesController::newsFavoritesLoad($item->postId, $item->dateEvent),
            ];

            array_push($posts, $newPost);
        }
        return $posts;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
     public function index ($id)
     {
         $user = User::find($id);
         $socials = UserSocial::where('user_id', '=', $id )->get();

         $rawPosts = $this->getPartPosts(1, 10);
         $posts = $this->formPosts($rawPosts);

         return view('profile.user.feed.index', [
                     'user' => $user,
                     'socials' => $socials,
                     'posts' => $posts
         ]);
     }

    /**
     * @return array
     */
     public function ajaxLoadNews ()
     {
         $id = Input::get('id');
         $rawPosts = $this->getPartPosts($id, 10);

         $posts = $this->formPosts($rawPosts);

         return $posts;
     }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
     public function login ()
     {
         $email = Input::get('email');
         $password = Input::get('password');

         if (Auth::attempt(['email' => $email, 'password' => $password],true))
         {
            return redirect()->intended();
         }else {
            return redirect('/');
         }
     }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
     public function registration (Request $request)
     {
         $user = new User();
         $this->validate($request, $user->rules);

         $user->name = Input::get('name');
         $user->email = Input::get('email');
         $user->phone = Input::get('phone');
         $user->password = Hash::make(Input::get('password'));
         $user->sex = 'man';
         $user->img_mini = '/img/user.png';
         $user->img_middle = '/img/user.png';
         $user->img_large = '/img/user.png';
         $user->img_square = '/img/user.png';

         $user->seo_title = '';
         $user->seo_description = '';
         $user->seo_keywords = '';
         $user->alt = '';

         $user->save();

         DB::table('users_roles')
           ->insert(
               ['user_id' => $user->id,
                'role_id' => 1 ,
               ]);
         Auth::attempt(['email' => $user->email, 'password' => Input::get('password')]);
         Mail::send('emails.welcome', ['name' => $user->name,
                                            'e_mail' => $user->email,
                                            'password' => Input::get('password')],
         function($message)
         {
             $message->to(Input::get('email'), Input::get('name'))
             ->subject('Вы зарегистрировались на сайте www.doms.design');
         });

         return redirect()->back();
     }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
     public function logout ()
     {
         Auth::logout();
         return redirect('/');
     }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
     public function recoveryAccess ()
     {
         $user = User::where('e_mail', '=', Input::get('email'))
                     ->first();

         if (!empty($user)) {
             $new_password  = str_random(12);
             $user->password = Hash::make( $new_password );

             Mail::send('emails.recovery', array('new_password' => $new_password), function($message)
             {
                $message->to(Input::get('email'), User::where('e_mail', '=', Input::get('email'))
                                                    ->first()
                                                    ->name)
                        ->subject('Ваш новый пароль на сайте www.doms.design');
             });

             return redirect('/')->with('check','true');
         } else {
             return redirect('/');
         }

     }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
      public function editPage ()
      {
          $user = User::find(Auth::id());

          $links = UserSocial::where('user_id', '=', $user->id)->get();

          return view('profile.user.edit.index', ['user' => $user,
                                                        'links' => $links]);
      }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
     public function edit (Request $request)
     {
          $user = User::find(Auth::id());
          $this->validate($request, $user->rules);

          $user->name = Input::get('name');
          $user->sex = Input::get('sex');

          if (Input::has('skype')) {
              $user->skype = Input::get('skype');
          }

          if (Input::has('about')) {
              $user->about = Input::get('about');
          }

          if (Input::has('phone')) {
              $user->phone = Input::get('phone');
          }

          if (Input::file('img')) {
              $user->img_mini = $this->saveFile('user','mini', Input::file('img'),20,20);
              $user->img_middle = $this->saveFile('user','mini', Input::file('img'),32,32);
              $user->img_large = $this->saveFile('user','mini', Input::file('img'),180,180);
          }

          $user->save();

          return redirect()->back()->with('message', 'профиль успешно сохранен!');
     }


    /**
     * @param $id
     * @return mixed
     */
    public static function loadPhotoUser ( $id )
    {
        $pic = Post::find($id);
        $user = User::select('id', 'quadro_ava', 'name')
                    ->where('id', '=', $pic->author_id)
                    ->get();

        return $user;
    }


}
