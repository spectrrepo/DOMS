<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Dotenv\Validator;
use Illuminate\Http\Request;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
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
     * @param $rawPosts
     * @return mixed
     */
    private function formPosts ($rawPosts)
    {
        $posts = $rawPosts->map(function ($item) {
            return  [
                "id" => $item['img']->id,
                "image" => Storage::url($item['img']->img_middle),
                "idAuthor" => $item['img']->author_id,
                "nameAuthor" => $item['img']->user->name,
                "avaAuthor" => Storage::url($item['img']->user->img_middle),
                "sexAuthor" => $item['img']->user->sex,
                "numViews" => $item['img']->views,
                "numLikes" => count($item['img']->likes),
                "numFavorites" => count($item['img']->favorites),
                "dateEvent" => $item['date'],
                "comments" => CommentsController::newsCommentLoad($item['img']->id, $item['date']),
                "numComments" => count($item['img']->comments),
                "likes" => LikesController::newsLikesLoad($item['img']->id, $item['date']),
                "favorites" => FavoritesController::newsFavoritesLoad($item['img']->id, $item['date']),
            ];
        });

        return $posts;
    }

    /**
     * @param $item
     * @param $dates
     * @param $nameEvent
     */
    private function findPartEvent ($item, $dates, $nameEvent) {
        if ($item->$nameEvent->count()) {
            $dateEventBegin = Carbon::parse($item->$nameEvent->first()->date)
                ->addSeconds(-Carbon::parse($item->$nameEvent->first()->date)->second)
                ->addMinutes(-Carbon::parse($item->$nameEvent->first()->date)->minute)
                ->addHours(-Carbon::parse($item->$nameEvent->first()->date)->hour);
            $dateEventEnd = Carbon::parse($dateEventBegin)->addSeconds(59)->addMinutes(59)->addHours(23);
            $dates->push([$dateEventBegin, $item->id]);
            foreach ($item->$nameEvent as $item) {
                if (!($item->date > $dateEventBegin) && ($item->date <= $dateEventEnd)) {
                    $dates->push([$item->date, $item->post_id]);

                    $dateEventBegin = Carbon::parse($item->date)
                        ->addSeconds(-Carbon::parse($item->date)->second)
                        ->addMinutes(-Carbon::parse($item->date)->minute)
                        ->addHours(-Carbon::parse($item->date)->hour);
                    $dateEventEnd = Carbon::parse($dateEventBegin)->addSeconds(59)->addMinutes(59)->addHours(23);
                }
            }
        }
    }
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
     public function index ($id)
     {
         $user = User::find($id);
         $socials = UserSocial::where('user_id', '=', $id )->get();

         $likePosts = $user->likes->map(function ($item) {
             return $item->post;
         });

         $favoritePosts = $user->favorites->map(function ($item) {
             return $item->post;
         });

         $commentPosts = $user->comments->map(function ($item) {
             return $item->post;
         });

         $rawData = $likePosts->union($favoritePosts)->union($commentPosts);
         $rawData = $rawData->map( function ($item) {

             $datesLike = collect();
             $this->findPartEvent($item, $datesLike, 'likes');

             $datesFavorite = collect();
             $this->findPartEvent($item, $datesFavorite, 'favorites');

             $datesComment = collect();
             $this->findPartEvent($item, $datesComment, 'comments');

             $datesEvent = $datesLike->merge($datesFavorite)->merge($datesComment)->unique();

             $collect = collect();
             foreach ($datesEvent as $date) {
                 $collect->push(['img' => $item, 'date' => $date[0]]);
             }

             return $collect;
         });

         $rawData = $rawData->unique()->flatten(1)->sortBy('date')->reverse()->values()->take(5);

         $posts = $this->formPosts($rawData);

         return view('profile.user.feed.index', [
                           'user' => $user,
                           'socials' => $socials,
                           'posts' => $posts,
                           'id' => $id,
         ]);
     }

    /**
     * @return array
     */
     public function ajaxLoadNews ()
     {
         $user = User::find(Input::get('userId'));

         $likePosts = $user->likes->map(function ($item) {
             return $item->post;
         });

         $favoritePosts = $user->favorites->map(function ($item) {
             return $item->post;
         });

         $commentPosts = $user->comments->map(function ($item) {
             return $item->post;
         });

         $rawData = $likePosts->union($favoritePosts)->union($commentPosts);
         $rawData = $rawData->map( function ($item) {

             $datesLike = collect();
             $this->findPartEvent($item, $datesLike, 'likes');

             $datesFavorite = collect();
             $this->findPartEvent($item, $datesFavorite, 'favorites');

             $datesComment = collect();
             $this->findPartEvent($item, $datesComment, 'comments');

             $datesEvent = $datesLike->merge($datesFavorite)->merge($datesComment)->unique();

             $collect = collect();
             foreach ($datesEvent as $date) {
                 $collect->push(['img' => $item, 'date' => $date[0]]);
             }

             return $collect;
         });

         $rawData = $rawData->unique()->flatten(1)->sortBy('date')->reverse()->values()->slice(Input::get('last'), Input::get('last')+5)->values();

         $posts = $this->formPosts($rawData);
         return $posts;
     }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
     public function login (Request $request)
     {
         $v = \Illuminate\Support\Facades\Validator::make($request->all(),
             [
             'email' => 'required|string',
             'password' => 'required|string',
             ]
         );

         if ($v->fails())
         {
             return redirect()->back()->with('login', true)->withErrors($v->errors());
         }

         $email = Input::get('email');
         $password = Input::get('password');

         if (Auth::attempt(['email' => $email, 'password' => $password],true))
         {
            return redirect()->intended();
         }else {
            return redirect()->back()->with('login', true);
         }
     }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
     public function registration (Request $request)
     {
         $user = new User();

         $v = \Illuminate\Support\Facades\Validator::make($request->all(), $user->rules);

         if ($v->fails())
         {
             return redirect()->back()->with('reg', true)->withErrors($v->errors());
         }


         $user->name = Input::get('name');

         $users = User::where('email', '=', Input::get('email'))->get()->count();
         if ($users === 0) {
             $user->email = Input::get('email');
         }

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
              $user->img_mini = $this->saveFile('user','mini', Input::file('img'),32,32);
              $user->img_middle = $this->saveFile('user','mini', Input::file('img'),106,106);
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
