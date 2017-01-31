<?php

namespace App\Services;

use App\Models\UserSocialAccount;
use App\Models\User;

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
