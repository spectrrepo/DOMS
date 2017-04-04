<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\SocialAccountService;
use Laravel\Socialite\Facades\Socialite;

use App\Social;

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
        $deleteLink = Social::where('link', '=', $link)
                            ->where('user', '=', $user_id)
                            ->delete();

        return 'true';
    }

    public function edit () {

        $link = $_POST['link'];
        $user_id = $_POST['user_id'];
        $old_link = $_POST['old_link'];
        $editLink = Social::where('link', '=', $old_link)
                           ->where('user', '=', $user_id)
                           ->update(array('link' => $link));

        return 'true';
    }

}
