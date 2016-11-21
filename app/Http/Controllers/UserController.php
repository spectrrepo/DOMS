<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Style;

use App\Room;

use App\Color;
use App\Liked;

use Auth;

use Hash;
use DB;
use App\Image;
use Carbon\Carbon;


// TODO: include library for work with validation
// TODO: change on my DB
// TODO: change on my message

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

    public function index()
     {  if(Auth::check()){
             $images =  Image::join('Likes', 'Images.id', '=', 'Likes.post_id')
                             ->join('Likeds', 'Images.id', '=', 'Likes.post_id')
                             ->join('Users', 'Likes.user_id', '=', 'Users.id')
                             ->get();
             $id = Auth::id();
             $user = User::find($id);
             return View('profile.index', [ 'id' => $id,
                                            'user' => $user,
                                            'images' => $images]);
        }else {
            return redirect('/login');
        }

     }
     public function yourPhotoUpload ()
     {
         if(Auth::check()){
             $id = Auth::id();
             $user = User::find($id);
             $userImages = Image::where('author_id', '=', Auth::id());
             return View('profile.index_photo', [ 'id' => $id,
                                                  'user' => $user,
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
@section('profile-content')
@endsection
sponse
      */
     public function likedAdd()
     {
         $liked = new Liked();

         $liked->post_id = $_POST['post_id'];
         $liked->user_id = $_POST['user_id'];

         $liked->save();
         return "true";

      }

      public function likedDelete()
      {
        $liked = Liked::where('post_id', '=', $_POST['post_id'])
                      ->where('user_id', '=', $_POST['user_id']);
        $liked->delete();
        return "true";
      }
      /**
       * Login Form
       *
       * @return Response
       */
      public function likedIndex()
      {
          if (Auth::check()){
             $images =  Image::join('Likeds','Images.id', '=', 'Likeds.post_id' )->where('Likeds.user_id', '=', '1')->get();
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
               return view('profile.edit', ['user' => $user]);
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
           $user->phone =  $_POST["phone"];
           $user->e_mail = $_POST["e_mail"];
           $user->skype = $_POST["skype"];
           $user->soc_net = $_POST["soc_net"];
           $user->avatar = $_FILES["avatar"];

           $user->save();
           return redirect()->back();
       }

    //    moderator
       public function addNewsPage()
       {
           return view('moderator.add_news');
       }
       public function editRoomsPage()
       {
           return view('moderator.edit_rooms');
       }
       public function editStylesPage()
       {
           return view('moderator.edit_styles');
       }
       public function editTagsPage()
       {
           return view('moderator.edit_tags');
       }
       public function confirmationsPage()
       {
           return view('moderator.wait_confirmation');
       }
       public function confirmationItemPage()
       {
           return view('moderator.wait_confirmation_item');
       }
}
