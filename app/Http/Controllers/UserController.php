<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use App\Style;

use App\Room;

use App\Color;

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
     {
         $user = User::find($id);
         return View('profile.index', ['user' => $user]);
     }
     public function indexAdd($id)
     {
         $user = User::find($id);

         $styles = Style::all();
         $rooms = Room::all();
         $colors = Color::all();

         return View('profile.add', ['user' => $user,
                                     'styles' => $styles,
                                     'rooms' => $rooms,
                                     'colors' => $colors ]);
     }
    /**
     * Registration form
     *
     * @return Response
     */
    public function register()
    {
        return View::make('login.register');
    }

    /**
     * Registring new user and storing him to DB.
     *
     * @return Response
     */
    public function store()
    {
        // TODO: include library for work with validation
        $rules = array(
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|alpha_num|between:4,50',
            'username' => 'required|alpha_num|between:2,20|unique:users,username'
        );

        $validator = Validator::make(Input::all(), $rules);

        if($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator);
        }
        // TODO: change on my DB
        $user = new User;
        $user->email = Input::get('email');
        $user->username = Input::get('username');
        $user->password = Hash::make(Input::get('password'));
        $user->save();

        Auth::loginUsingId($user->id);

        // TODO: change on my message
        return Redirect::home()->with('message', 'Thank you for registration, now you can comment on offers!');
    }

    /**
     * Log in to site
     *
     * @return Response
     */
    public function login()
    {
        if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')), true) ||
            Auth::attempt(array('username' => Input::get('email'), 'password' => Input::get('password')), true)) {
                return Redirect::intended('dashboard');
        }

        return Redirect::back()->withInput(Input::except('password'))->with('message', 'Wrong creadentials!');
    }

    /**
     * Log out from site.
     *
     * @return Response
     */
    public function logout()
    {
        Auth::logout();

        return Redirect::home()->with('message', 'See you again!');
    }

/**
	 * Show reminder form.
	 *
	 * @return Response
	 */
	public function showReminderForm()
	{
		return View::make('auth.remind');
	}


	/**
	 * Send reminder email.
	 *
	 * @return Response
	 */
	public function sendReminder()
	{
		$credentials = array('email' => Input::get('email'));

		return Password::remind($credentials, function($message, $user)
		{
		    $message->subject('Password Reminder on Habra Offers');
		});
	}


	/**
	 * Show reset password form.
	 *
	 * @return Response
	 */
	public function showResetForm($token)
	{
		return View::make('auth.reset')->with('token', $token);
	}


	/**
	 * Reset password.
	 *
	 * @return Response
	 */
	public function resetPassword($token)
	{
		$credentials = array('email' => Input::get('email'));

		return Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();

			Auth::loginUsingId($user->id);

			return Redirect::home()->with('message', 'Your password has been successfully reseted.');
	    });
	}
}
