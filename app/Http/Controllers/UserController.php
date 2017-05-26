<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Favorite;
use Carbon\Carbon;
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
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
     public function index ($id)
     {
         $user = User::find($id);
         $socials = UserSocial::where('user_id', '=', $id )
                               ->get;
         $news = Post::all();
         return view('some.view', [
                     'user' => $user,
                     'socials' => $socials,
         ]);
     }

    /**
     * @return array
     */
     public function ajaxLoadNews ()
     {



         $images = Post::join('comments')->join('likes')->join('favorites')->groupBy('date', 'post.id');
         $ds = [
             "image" =>"",
             "postId" =>"",
             "nameAuthor" =>"",
             "avaAuthor" =>"",
             "numViews" =>"",
             "numLikes" =>"",
             "numFavorites" =>"",
             "dateEvent" =>"",
             "comments" => [],
             "likes" => [],
             "favorites" => []
         ];
         return response()->json();
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
       $findUser = User::where('email', '=', Input::get('email'))->first();

       if (!empty($findUser)) {
         $user = new User();
         $this->validate($request, $user->rules);

         $user->name = Input::get('name');
         $user->email = Input::get('email');
         $user->phone = Input::get('phone');
         $user->password = Hash::make(Input::get('password'));
         $user->type = Input::get('phone');
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
                'role_id' => 3,
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
       } else {
         return redirect('/')->with('message', 'пользователь с таким email адресом уже зарегистрирован на сайте');
       }
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

          return view('profile.edit', ['user' => $user,
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

          if (Input::has('file')) {
              $user->img_mini = $this->saveFile('user','mini', Input::get('file'),40,40);
              $user->img_middle = $this->saveFile('user','mini', Input::get('file'),40,40);
              $user->img_large = $this->saveFile('user','mini', Input::get('file'),40,40);
              $user->img_square = $this->saveFile('user','mini', Input::get('file'),40,40);
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
