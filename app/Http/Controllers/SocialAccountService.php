<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;


use App\UserSocialAccount;
use App\User;

class SocialAccountService
{
    public function createOrGetUser($providerObj, $providerName)
    {

        $providerUser = $providerObj->user();

        $account = UserSocialAccount::whereProvider($providerName)
                        ->whereProviderUserId($providerUser->getId())
                            ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new UserSocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName]);

            $user = User::whereEmail($providerUser->getEmail())->first();

            if (!$user) {
                $user = User::createBySocialProvider($providerUser);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;

        }

    }
}
