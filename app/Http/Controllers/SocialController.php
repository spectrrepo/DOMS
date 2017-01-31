<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\SocialAccountService;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    public function login($provider)
    {
        return Socialite::with($provider)->redirect();
    }

    public function callback(SocialAccountService $service, $provider)
    {

        $driver   = Socialite::driver($provider);
        $user = $service->createOrGetUser($driver, $provider);
        \Auth::login($user, true);
        return redirect()->intended('/');

    }

}
