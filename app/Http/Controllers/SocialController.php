<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\SocialAccountService;
use Laravel\Socialite\Facades\Socialite;

use App\Social;
use App\User;
use Hash;

class SocialController extends Controller
{

    public function login($provider)
    {
        return Socialite::with($provider)->redirect();
    }
    public function loginVK( $provider ) {
        return \Socialize::driver( $provider )->redirect();
    }
    public function callback(SocialAccountService $service, $provider)
    {

        $driver   = Socialite::driver($provider);
        $user = $service->createOrGetUser($driver, $provider);
        \Auth::login($user, true);
        return redirect()->intended('/');

    }
    public function callbackVK($provider) {
        $newUser = new App\User();
        $user = \Socialize::driver($provider)->user();
        $newUser->name = $user->name;
        $email = 'demo@mail.com';
        $newUser->email = $email;
        $password = Hash::make('demo');
        $newUser->password = $password;
        $newUser->status = 'user';
        $newUser->phone = '0';

        Auth::attempt(['email' => 'demo@mail.com', 'password' => 'demo']);

        $newUser->save();
        Mail::send('emails.welcome', array('name' => $user->name,
                                            'e_mail' => $email,
                                            'password' => $password),
         function($message)
         {
           $message->to('skiffy166@gmail.com', 'Георгий')
           ->subject('Вы зарегистрировались на сайте www.doms.design');
         });

        return redirect('/');
    }

    public function add (){

        $link = $_POST['link'];
        $user_id = $_POST['user_id'];

        $newLink = new Social();
        $newLink->link = $link;
        $newLink->user = $user_id;
        $newLink->save();

        $linkId = $newLink->id;

        return $linkId;

    }

    public function delete () {

        $link = $_POST['link'];
        $user_id = $_POST['user_id'];
        Social::where('link', '=', $link)
               ->where('user', '=', $user_id)
               ->delete();

        return 'true';
    }

    public function edit () {

        $link = $_POST['link'];
        $user_id = $_POST['user_id'];
        $old_link = $_POST['old_link'];

        Social::where('link', '=', $old_link)
               ->where('user', '=', $user_id)
               ->update(array('link' => $link));

        return 'true';
    }

}
