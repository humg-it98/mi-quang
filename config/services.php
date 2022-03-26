<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id' => env('CLIENT_ID_FB'),
        'client_secret' => env('CLIENT_SECRET_FB'),
        'redirect' => env('REDIRECT_FB'),
    ],

    'github' => [
        'client_id' => env('CLIENT_ID_GH'),
        'client_secret' => env('CLIENT_SECRET_GH'),
        'redirect' => env('REDIRECT_GH'),
    ],

    'google' => [
        'client_id' => env('CLIENT_ID_GG'),
        'client_secret' => env('CLIENT_SECRET_GG'),
        'redirect' => env('REDIRECT_GG'),
    ],

    'google-user' => [
        'client_id' => env('CLIENT_ID_GG_USER'),
        'client_secret' => env('CLIENT_SECRET_GG_USER'),
        'redirect' => env('REDIRECT_GG_USER'),
    ],

];
