<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\SocialAccountService;
use Laravel\Socialite\Facades\Socialite;
use Hash;
use Auth;
use Input;

use App\Models\UserSocial;
use App\Models\User;
class SocialController extends Controller
{
    /**
     * @param $provider
     * @return mixed
     */
    public function login ($provider)
    {
        return Socialite::with($provider)->redirect();
    }

    /**
     * @param $provider
     * @return mixed
     */
    public function loginVK ( $provider )
    {
        return \Socialize::driver( $provider )->redirect();
    }

    /**
     * @param \App\Http\Controllers\SocialAccountService $service
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function callback (SocialAccountService $service, $provider)
    {

        $driver   = Socialite::driver($provider);
        $user = $service->createOrGetUser($driver, $provider);
        \Auth::login($user, true);
        return redirect()->intended('/');

    }

    /**
     * @param $provider
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function callbackVK($provider) {
        $newUser = new User();
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

    /**
     * @param Request $request
     * @return mixed
     */
    public function add (Request $request)
    {
        $userSocial = new UserSocial();

        $userSocial->link = Input::get('link');
        $userSocial->user_id = Auth::user()->id;

        $userSocial->save();

        return $userSocial->id;
    }

    /**
     * @return string
     */
    public function delete () {

        $link = Input::get('link');
        UserSocial::where('link', '=', $link)
                  ->where('user_id', '=', Auth::user()->id)
                  ->delete();

        return 'true';
    }

    /**
     * @param Request $request
     * @return string
     */
    public function edit (Request $request)
    {
        $userSocial = UserSocial::where('user_id', '=', Auth::user()->id)
                                ->where('link', '=', Input::get('old_link'))
                                ->get()[0];

        $userSocial->link = Input::get('link');
        $userSocial->update();

        return 'true';
    }

}
