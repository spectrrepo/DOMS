<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'vkontakte' => [
        'client_id' => env('5785005'),
        'client_secret' => env('WT3hEaeDKvxaVpbtJ8Sa'),
        'redirect' => env('http://188.225.72.64/social_login/callback/vkontakte'),
    ],

    'facebook' => [
	    'client_id' => '1830580383883779',
	    'client_secret' => 'dbe26b0b88321996997c5c5487c1ac4a',
	    'redirect' => 'http://188.225.72.64/socialite/facebook/callback',
    ],

];
