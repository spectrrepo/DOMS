<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Input;
use Auth;
use Hash;
use DB;
use Mail;

use App\Models\Post;
use App\Models\User;
use App\Models\Style;
use App\Models\Placement;
use App\Models\Color;
use App\Models\UserSocial;

class UserController extends BasePhotoController
{

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index ($id)
    {
        if(Auth::check()){
             $news_tpl = array();
             $news = array();
             $last_el = (object)['date_rus_event' => 'may'];
             array_push($images, $last_el);

             for ($i = 0; $i < count($images)-1; $i++ ){
                 if ($images[$i]->date_rus_event != $images[$i+1]->date_rus_event) {
                     for ( $j = 0; $j < count($images); $j++){
                         if (($images[$i]->date_rus_event == $images[$j]->date_rus_event)) {
                             array_push($news_tpl, $images[$j]);
                         }
                     }
                     array_push($news, $news_tpl);
                     $news_tpl = array();
                 }
             }
             array_pop($images);

             $user = User::find($id);
             $links = UserSocial::where('user', '=', $id)->get();
             return View('profile.index', [ 'id' => $id,
                                            'user' => $user,
                                            'news' => $news,
                                            'links' => $links]);
        }else {
            return redirect('/login');
        }

     }

    /**
     * @return array
     */
     public function ajaxLoadNews ()
     {
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
     * @return mixed
     */
    public function loadPhotoUser ()
    {
        $id = Input::get('id');
        $pic = Post::find($id);
        $user = User::select('id', 'quadro_ava', 'name')
                    ->where('id', '=', $pic->author_id)
                    ->get();

        return $user;
    }


}
