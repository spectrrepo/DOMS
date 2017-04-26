<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use Input;
use File;
use Auth;
use Hash;
use DB;
use Image;
use Mail;

use App\Models\Post;
use App\Models\User;
use App\Models\Style;
use App\Models\Placement;
use App\Models\View;
use App\Models\Tag;
use App\Models\Color;
use App\Models\Favorite;
use App\Models\Article;
use App\Models\Like;
use App\Models\UserSocial;

class UserController extends Controller
{

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function index($id)
     {  if(Auth::check()){
             $images = DB::select(
                 "SELECT * FROM (
                            (SELECT 'favorite' AS type,
                                   '' AS comment_id,
                                   Likeds.post_id AS img_id,
                                   Likeds.date AS date_event,
                                   Likeds.date_rus AS date_rus_event,
                                   '' AS comment_text,
                                   '' AS comment_status,
                                   Users.quadro_ava AS quadro_ava_user_event,
                                   Users.name AS user_name_event,
                                   Users.id AS id_user_event,
                                   Users.sex AS sex_user_event
                             FROM Likeds JOIN Users ON Likeds.user_id = Users.id)

                             UNION

                            (SELECT 'like' AS type,
                                   '' AS comment_id,
                                   Likes.post_id AS img_id,
                                   Likes.date AS date_event,
                                   Likes.date_rus AS date_rus_event,
                                   '' AS comment_text,
                                   '' AS comment_status,
                                   Users.quadro_ava AS quadro_ava_user_event,
                               Users.name AS user_name_event,
                               Users.id AS id_user_event,
                               Users.sex AS sex_user_event
                         FROM Likes JOIN Users ON Likes.user_id = Users.id)

                         UNION

                         (SELECT   'comment' AS type,
                                  Comments.Id AS comment_id,
                                  Comments.post_id AS img_id,
                                  Comments.date AS date_event,
                                  Comments.rus_date AS date_rus_event,
                                  Comments.text_comment AS comment_text,
                                  Comments.status AS comment_status,
                                  Users.quadro_ava AS quadro_ava_user_event,
                                  Users.name AS user_name_event,
                                  Comments.user_id AS id_user_event,
                                  Users.sex AS sex_user_event
                         FROM Comments JOIN Users ON Comments.user_id = Users.id
                         WHERE Comments.status='read')) AS t1
                    JOIN(
                         SELECT Images.id AS id,
                               Images.full_path AS img_photo,
                               Users.id AS user_id_add,
                               Users.name AS name_user_add,
                               Users.quadro_ava AS quadro_ava_add,
                               Images.views_count AS views_count,
                               Images.likes_count AS likes_count,
                               Images.favs_count AS favs_count
                         FROM Users JOIN Images ON Users.id=Images.author_id) AS t2
                    ON t1.img_id=t2.id
                    ORDER BY date_event;");

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
     public function ajaxDownloadUpdate () {
         $lastUpdate = $_POST['lastId'];
         $images = DB::select(
         "SELECT * FROM (
                    (SELECT 'favorite' AS type,
                           '' AS comment_id,
                           Likeds.post_id AS img_id,
                           Likeds.date AS date_event,
                           Likeds.date_rus AS date_rus_event,
                           '' AS comment_text,
                           '' AS comment_status,
                           Users.quadro_ava AS quadro_ava_user_event,
                           Users.name AS user_name_event,
                           Users.id AS id_user_event,
                           Users.sex AS sex_user_event
                     FROM Likeds JOIN Users ON Likeds.user_id = Users.id)

                     UNION

                    (SELECT 'like' AS type,
                           '' AS comment_id,
                           Likes.post_id AS img_id,
                           Likes.date AS date_event,
                           Likes.date_rus AS date_rus_event,
                           '' AS comment_text,
                           '' AS comment_status,
                           Users.quadro_ava AS quadro_ava_user_event,
                           Users.name AS user_name_event,
                           Users.id AS id_user_event,
                           Users.sex AS sex_user_event
                     FROM Likes JOIN Users ON Likes.user_id = Users.id)

                     UNION

                     (SELECT   'comment' AS type,
                              Comments.Id AS comment_id,
                              Comments.post_id AS img_id,
                              Comments.date AS date_event,
                              Comments.rus_date AS date_rus_event,
                              Comments.text_comment AS comment_text,
                              Comments.status AS comment_status,
                              Users.quadro_ava AS quadro_ava_user_event,
                              Users.name AS user_name_event,
                              Comments.user_id AS id_user_event,
                              Users.sex AS sex_user_event
                     FROM Comments JOIN Users ON Comments.user_id = Users.id
                     WHERE Comments.status='read')) AS t1
                JOIN(
                     SELECT Images.id AS id,
                           Images.full_path AS img_photo,
                           Users.id AS user_id_add,
                           Users.name AS name_user_add,
                           Users.quadro_ava AS quadro_ava_add,
                           Images.views_count AS views_count,
                           Images.likes_count AS likes_count,
                           Images.favs_count AS favs_count
                     FROM Users JOIN Images ON Users.id=Images.author_id) AS t2
                ON t1.img_id=t2.id
                ORDER BY date_event;");

         $news_tpl = array();
         $newss = array();
         $last_el = (object)['date_rus_event' => 'may'];
         array_push($images, $last_el);

         for ($i = 0; $i < count($images)-1; $i++ ){
             if ($images[$i]->date_rus_event != $images[$i+1]->date_rus_event) {
                 for ( $j = 0; $j < count($images); $j++){
                     if (($images[$i]->date_rus_event == $images[$j]->date_rus_event)) {
                         array_push($news_tpl, $images[$j]);
                     }
                 }
                 array_push($newss, $news_tpl);
                 $news_tpl = array();
             }
         }
         $images = array_slice($newss, $lastUpdate, $lastUpdate+4);
         return $images;
     }

     public function yourPhotoUpload ()
     {
         if(Auth::check()){
             $id = Auth::id();
             $user = User::find($id);
             $userImages = Post::where('author_id', '=', $id)->get();
             $links = UserSocial::where('user', '=', $id)->get();

             return View('profile.index_photo', [ 'id' => $id,
                                                  'user' => $user,
                                                  'links' => $links,
                                                  'userImages' => $userImages]);
         }else {
             return redirect('/login');
         }
     }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function indexAdd()
     {
         if(Auth::check()){

             $user = User::find(Auth::id());
             $styles = Style::all();
             $rooms = Placement::all();
             $colors = Color::all();

             return View('profile.add', ['user' => $user,
                                         'styles' => $styles,
                                         'rooms' => $rooms,
                                         'colors' => $colors ]);
         }
         else{
             return redirect('/login');
         }
     }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
     public function login()
     {

         $email = $_POST['email'];
         $password = $_POST['password'];

         if (Auth::attempt(['email' => $email, 'password' => $password],true))
         {
            return redirect()->intended();
         }else {
            return redirect('/');
         }
     }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
     public function registration()
     {
       $findUser = User::where('email', '=', $_POST['email'])->first();

       if (empty($findUser)) {
         $user = new User();
         $user->name = $_POST["name"];
         $user->email = $_POST["email"];
         $user->phone = $_POST["phone"];
         $user->password = Hash::make($_POST["password"]);

         if (!empty($_POST['status'])) {
             $user->status = $_POST["status"];
         }
         $user->save();

         DB::table('users_roles')->insert(
            array('user_id' => $user->id,
                  'role_id' => 3)
         );
         Auth::attempt(['email' => $email, 'password' => $password]);
         Mail::send('emails.welcome', array('name' => $_POST['name'],
                                            'e_mail' => $_POST['email'],
                                            'password' => $_POST['password']),
         function($message)
         {
             $message->to($_POST["email"], $_POST['name'])
             ->subject('Вы зарегистрировались на сайте www.doms.design');
         });

         return redirect()->back();
       } else {
         return redirect('/')->with('bad_reg', 'true');
       }
     }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
     public function logout()
     {
         Auth::logout();
         return redirect('/');
     }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
     public function recoveryAccess()
     {
         $user = User::where('e_mail', '=', $_POST['e_mail'])
                      ->first();

         if (!empty($user)) {
             $new_password  = str_random(12);
             $user->password = Hash::make( $new_password );

             Mail::send('emails.recovery', array('new_password' => $new_password), function($message)
             {
                $message->to($_POST['e_mail'], User::where('e_mail', '=', $_POST['e_mail'])
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
      public function editUser ()
      {
          if (Auth::check()){
              $user = User::find(Auth::id());
              $links = UserSocial::where('user', '=', $user->id)->get();
              return view('profile.edit', ['user' => $user,
                                            'links' => $links]);
          }
      }

       /**
        * Login Form
        *
        * @return Response
        */
       public function changeYourself()
       {
           $user = User::find(Auth::id());

           $user->name = $_POST["name"];
           $user->sex = $_POST["sex"];
           $user->phone = $_POST["phone"];
           $user->skype = $_POST["skype"];
           $user->about = $_POST["about"];

           if(!empty($_FILES['avatar']['tmp_name'])){
               $user->avatar = $_FILES["avatar"];
               $user->path_min = $user->avatar->url('small');
               $user->path_full = $user->avatar->url('max');

               $quadroAva = Image::make($_FILES['avatar']['tmp_name']);
               $quadroAva->encode('jpg');
               $quadroAva->fit(180);
               $quadroAva->save(public_path('/img/quadro-ava/'.Auth::id().'jpg'));

               $user->quadro_ava = '/img/quadro-ava/'.Auth::id().'jpg';
           }

           $user->save();
           return redirect()->back();
       }

}
