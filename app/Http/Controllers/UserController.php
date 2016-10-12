<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Style;

use App\Room;

use App\Color;

use Auth;

use Hash;

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
             $id = Auth::id();
             $user = User::find($id);
             return View('profile.index', [ 'id' => $id,
                                            'user' => $user]);
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

         if (Auth::attempt(['e_mail' => $email, 'password' => $password]))
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
         return redirect('/');
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
}
