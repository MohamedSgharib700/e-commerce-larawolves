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
        'client_id' => '1224941184267835',
        'client_secret' => 'b4e3affe81322c4f6e70933dfdaf378a',
        'redirect' => 'http://e-commerce.dev/auth/facebook/callback',
    ],

    'twitter' => [
        'client_id' => 'tNdgALSlcRn8V4HObm4Ijyq67',
        'client_secret' => 'GcOvOhZGmIkSfPfMs0vumjYWjmiTPYb8QVkPK1t10YRlHgZTqg',
        'redirect' => 'http://e-commerce.dev/auth/twitter/callback',
    ],

];
