<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Carbon\Carbon;
use App\Picture;
use Input;
use File;
use Auth;
use Hash;
use DB;
use Image;
use Mail;

use App\User;
use App\Style;
use App\Room;
use App\View;
use App\Tag;
use App\Color;
use App\Liked;
use App\News;
use App\Like;
use App\Social;



// TODO: include library for work with validation

/**
 * The ResultMessage class holds a message that can be returned
 * as a result of a process. The message has a severity and
 * message.
 *
 * @author nagood
 *
 */

class UserController extends Controller
{

    /**
     * Login Form
     *
     * @return Response
     */

    public function index($id)
     {  if(Auth::check()){
             $images = DB::select(
             "SELECT * FROM (
                        (SELECT 'favorite' AS type,
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
                         SELECT Images.id AS img_id,
                               Images.full_path AS img_photo,
                               Users.id AS user_id_add,
                               Users.name AS name_user_add,
                               Users.quadro_ava AS quadro_ava_add,
                               Images.views_count AS views_count,
                               Images.likes_count AS likes_count,
                               Images.favs_count AS favs_count
                         FROM Users JOIN Images ON Users.id=Images.author_id) AS t2
                    ON t1.img_id=t2.img_id
                    ORDER BY date_event ;");

             $commentsImage = DB::select(
                    "SELECT Comments.user_id AS comment_user_id,
                             Comments.post_id AS img_id,
                             Comments.text_comment AS comment_text,
                             Comments.rus_date AS comment_date,
                             Comments.status AS comment_status,
                             Users.name AS comment_user_name,
                             Users.quadro_ava AS comment_quadro_ava
                      FROM Comments JOIN Users ON Comments.user_id = Users.id
                      JOIN Images ON Comments.post_id = Images.id
                      WHERE Comments.status='read'
                      ORDER BY Comments.rus_date;");
             $news_tpl = array();
             $news = array();
             $last_el = ['date_rus_event' => 'may'];
             array_push($images, (object)$last_el);
             for ($i = 1; $i < count($images); $i++ ){
                 if ($images[$i]->date_rus_event != $images[$i-1]->date_rus_event) {
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
             $links = Social::where('user', '=', $id)->get();
             return View('profile.index', [ 'id' => $id,
                                            'user' => $user,
                                            'images' => $images,
                                            'commentsImage' => $commentsImage,
                                            'links' => $links]);
        }else {
            return redirect('/login');
        }

     }
     public function ajaxDownloadUpdate () {
         $lastUpdate = $_POST['lastId'];
         $images =  $images = DB::select(
           "SELECT * FROM (
               (SELECT 'favorite' AS type,
                      Likeds.post_id AS img_id,
                      Likeds.date AS date_event,
                      Users.quadro_ava AS quadro_ava_user_event,
                      Users.name AS user_name_event,
                      Users.id AS id_user_event,
                      Users.sex AS sex_user_event
                FROM Likeds JOIN Users ON Likeds.user_id = Users.id)

                UNION

               (SELECT 'like' AS type,
                      Likes.post_id AS img_id,
                      Likes.date AS date_event,
                      Users.quadro_ava AS quadro_ava_user_event,
                      Users.name AS user_name_event,
                      Users.id AS id_user_event,
                      Users.sex AS sex_user_event
                FROM Likes JOIN Users ON Likes.user_id = Users.id)) AS t1
           JOIN(
                SELECT Images.id AS img_id,
                      Images.full_path AS img_photo,
                      Users.id AS user_id_add,
                      Users.name AS name_user_add,
                      Users.quadro_ava AS quadro_ava_add,
                      Images.views_count AS views_count,
                      Images.likes_count AS likes_count,
                      Images.favs_count AS favs_count
                FROM Users JOIN Images ON Users.id=Images.author_id) AS t2
           ON t1.img_id=t2.img_id
           ORDER BY date_event LIMIT 10 OFFSET ".$lastUpdate.";");
         return $images;
     }
     public function yourPhotoUpload ()
     {
         if(Auth::check()){
             $id = Auth::id();
             $user = User::find($id);
             $userImages = Picture::where('author_id', '=', $id)
                                   ->get();
             $links = Social::where('user', '=', $id)->get();

             return View('profile.index_photo', [ 'id' => $id,
                                                  'user' => $user,
                                                  'links' => $links,
                                                  'userImages' => $userImages]);
         }else {
             return redirect('/login');
         }
     }

    /**
     * Login Form
     *
     * @return Response
     */

    public function indexAdd()
     {
         if(Auth::check()){

             $user = User::find(Auth::id());
             $styles = Style::all();
             $rooms = Room::all();
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
      * Login Form
      *
      * @return Response
      */
     public function login()
     {
         $email = $_POST['email'];
         $password = $_POST['password'];

         if (Auth::attempt(['email' => $email, 'password' => $password],true))
         {
            return redirect()->intended();
         }else {
            // with message
            return redirect('/');
         }
     }

     /**
      * Login Form
      *
      * @return Response
      */
     public function registration()
     {
       $findUser = User::where('email', '=', $_POST['email'])->first();
       if (empty($findUser)) {
         $user = new User();

         $email = $_POST['email'];
         $password = $_POST['password'];

         $user->name = $_POST["name"];
         $user->email = $_POST["email"];
         $user->phone = $_POST["phone"];
         $user->password = Hash::make($_POST["password"]);
         if (!empty($_POST['status'])) {
             $user->status = $_POST["status"];
         }
         $user->save();
         $lastIdUser = User::orderBy('id', 'desc')->first()->id;
         DB::table('users_roles')->insert(
            array('user_id' => $lastIdUser, 'role_id' => 3)
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
      * Login Form
      *
      * @return Response
      */
     public function logout()
     {
         Auth::logout();
         return redirect('/');
     }

     /**
      * Login Form
      *
      * @return Response
      */
     public function recoveryAccess()
     {
         $user = User::where('e_mail', '=', $_POST['e_mail'])->first();
         if (!empty($user)) {
             $new_password  = str_random(12);
             $user->password = Hash::make( $new_password );
             Mail::send('emails.recovery', array('new_password' => $new_password),
                                                 function($message)
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
      * Login Form
      *
      * @return Re@extends('layouts.profile')
      */
     public function likedAdd()
     {
         $liked = new Liked();

         $liked->post_id = $_POST['post_id'];
         $liked->user_id = $_POST['user_id'];
         $image = Picture::find($_POST['post_id']);
         $image->favs_count += 1;
         $image->save();
         $liked->date = \Carbon\Carbon::parse();
         setlocale(LC_TIME, 'ru_RU.utf8');
         $liked->date_rus = \Carbon\Carbon::parse()->formatLocalized('%d %b %Y');
         $liked->save();
         return 'delete_liked';

      }

      public function likedDelete()
      {
        $liked = Liked::where('post_id', '=', $_POST['post_id'])
                      ->where('user_id', '=', $_POST['user_id']);
        $image = Picture::find($_POST['post_id']);
        $image->favs_count -= 1;
        $image->save();
        $liked->delete();
        return 'liked';
      }
      /**
       * Login Form
       *
       * @return Response
       */
      public function likedIndex()
      {
          if (Auth::check()){
             $images =  Picture::join('Likeds','Images.id', '=', 'Likeds.post_id' )
                             ->where('Likeds.user_id', '=', Auth::id())
                             ->get();
                            //  dd($images);
             return view('profile.liked', ['images' => $images]);
          }
      }
      /**
       * Login Form
       *
       * @return Response
       */
       public function editUser ()
       {
           if (Auth::check()){
               $user = User::find(Auth::id());
               $links = Social::where('user', '=', $user->id)->get();
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

    //    moderator
       public function addNewsPage()
       {
           $news = News::all();
           return view('moderator.add_news', ['news' => $news]);
       }
       public function editRoomsPage()
       {
           $rooms = Room::paginate(10);
           return view('moderator.edit_rooms', ['rooms' => $rooms]);
       }
       public function editStylesPage()
       {
           $styles = Style::paginate(10);
           return view('moderator.edit_styles', ['styles' => $styles]);
       }
       public function editTagsPage()
       {
           $tags = Tag::paginate(10);
           return view('moderator.edit_tags', ['tags' => $tags]);
       }
       public function confirmationsPage()
       {
           $images = Picture::where('verified', '=', false)->paginate(10);
           return view('moderator.wait_confirmation', ['images' => $images]);
       }
       public function confirmationItemPage($id)
       {
           $imageId = Picture::find($id);
           $needUser = User::find($imageId->author_id);
           if ((Auth::user()->status === 'moderator' ) || (Auth::user()->id === $needUser->id)) {
               $user = User::find( Auth::id() );
               $styles = Style::all();
               $rooms = Room::all();
               $colors = Color::all();
               $tags = Tag::where('post_id', '=', $id)->get();
               $tagAll = '';
               foreach ($tags as $tag) {
                    $tagAll .= $tag->title.';';
               }
               $views = View::where('post_id', '=', $id)->get();
               $image = Picture::find($id);

               return view('moderator.wait_confirmation_item', ['user' => $user,
                                                                'styles' => $styles,
                                                                'tags' => $tags,
                                                                'views' => $views,
                                                                'rooms' => $rooms,
                                                                'tagAll' => $tagAll,
                                                                'colors' => $colors,
                                                                'image' => $image]);

           }else {
               return redirect('/profile/'.Auth::user()->id);
           }
       }
       public function addNewsItem()
       {
           return view('moderator.news');
       }
       public function addStyleItem()
       {
           return view('moderator.style');
       }
       public function deleteVerificationImage($id)
       {
           $image = Picture::find($id)->delete();
           if ( Auth::user()->status == 'moderator') {
               return redirect('/profile/admin/verification');
           }else {
               return redirect('/profile/'.Auth::user()->id)->with('check', 'delete');
           }
       }

       public function addSocLink (){
           $link = $_POST['link'];
           $user_id = $_POST['user_id'];

           $newLink = new Social();
           $newLink->link = $link;
           $newLink->user = $user_id;
           $newLink->save();
           $linkId = Social::where('user', '=', $user_id)
                            ->orderBy('id', 'desc')
                            ->first();
           return $linkId;

       }

       public function deleteSocLink () {
           $link = $_POST['link'];
           $user_id = $_POST['user_id'];

           $deleteLink = Social::where('link', '=', $link)
                               ->where('user', '=', $user_id)
                               ->delete();
           return 'true';
       }

       public function editSocLink () {
           $link = $_POST['link'];
           $user_id = $_POST['user_id'];
           $old_link = $_POST['old_link'];

           $editLink = Social::where('link', '=', $old_link)
                              ->where('user', '=', $user_id)
                              ->update(array('link' => $link));

           return 'true';
       }
}
