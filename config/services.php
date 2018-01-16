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

    'facebook' => [
        'client_id' => '271818749975282',
        'client_secret' => 'c653c167bcd3914dc8ae780a738370c5',
        'redirect' => 'http://fluxcredit.com/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '587475219374-s4q60v3up4fphmn51sqnrgavmqjgeo2m.apps.googleusercontent.com',
        'client_secret' => 'zSyUlBWSJ58CCVZy3tDonMni',
        'redirect' => 'http://fluxcredit.com/auth/google/callback',
    ],

];
