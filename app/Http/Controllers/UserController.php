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
             $results = DB::select('(select * from Likes) union (select * from Likeds)');
             $images =  Picture::join('Users', 'Images.author_id', '=', 'Users.id')
                             ->join('Likes', 'Images.id', '=', 'Likes.post_id')
                             ->join('Likeds', 'Images.id', '=', 'Likeds.post_id')
                             ->take(1)
                             ->get();
             $user = User::find($id);
             $links = Social::where('user', '=', $id)->get();
             return View('profile.index', [ 'id' => $id,
                                            'user' => $user,
                                            'images' => $images,
                                            'links' => $links]);
        }else {
            return redirect('/login');
        }

     }
     public function ajaxDownloadUpdate () {
         $lastUpdate = $_POST['lastId'];
         $images =  Picture::join('Users', 'Images.author_id', '=', 'Users.id')
                           ->join('Likes', 'Images.id', '=', 'Likes.post_id')
                           ->join('Likeds', 'Images.id', '=', 'Likeds.post_id')
                           ->skip($lastUpdate)
                           ->take(1)
                           ->get();
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

         if (Auth::attempt(['e_mail' => $email, 'password' => $password],true))
         {
            return redirect()->intended();
         }else {
            return redirect('/login');
         }
     }

     /**
      * Login Form
      *
      * @return Response
      */
     public function registration()
     {
         $user = new User();

         $email = $_POST['email'];
         $password = $_POST['password'];

         $user->name = $_POST["name"];
         $user->e_mail = $_POST["email"];
         $user->phone = $_POST["phone"];
         $user->password = Hash::make($_POST["password"]);
         $user->status = $_POST["status"];

         $user->save();

         Auth::attempt(['e_mail' => $email, 'password' => $password]);
         return redirect()->back();
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
         $liked->save();
         return 'true';

      }

      public function likedDelete()
      {
        $liked = Liked::where('post_id', '=', $_POST['post_id'])
                      ->where('user_id', '=', $_POST['user_id']);
        $image->favs_count -= 1;
        $image->save();
        $liked->delete();
        return 'true';
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
      public function pretenseAdd()
      {
          if (Auth::check()) {
              
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

           if (!File::isFile(Input::get('avatar'))) {

               $user->avatar = $_FILES["avatar"];
               $user->path_min = $user->avatar->url('small');
               $user->path_full = $user->avatar->url('max');

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
               $uri = 'admin';
               $views = View::where('post_id', '=', $id)->get();
               $image = Picture::find($id);

               return view('moderator.wait_confirmation_item', ['user' => $user,
                                                                'styles' => $styles,
                                                                'tags' => $tags,
                                                                'views' => $views,
                                                                'rooms' => $rooms,
                                                                'tagAll' => $tagAll,
                                                                'colors' => $colors,
                                                                'uri' => $uri,
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
            $uri= $_POST['uri'];
           if ( $uri == 'admin') {
               return redirect('/profile/admin/verification');
           }else {
               return redirect('/profile/'.Autrh::user()->id);
           }
       }

       public function addSocLink (){
           $link = $_POST['link'];
           $user_id = $_POST['user_id'];

           $newLink = new Social();
           $newLink->link = $link;
           $newLink->user = $user_id;
           $newLink->save();

           return "true";

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
