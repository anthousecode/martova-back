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

    'google' => [
        'name' => 'martova',
        'key' => 'AIzaSyBGXOW5Ko1SLQ2UELr0CEElWgvQ3BwkyQ0',
        'client_id' => '1084938803888-kh942qstrbka2chdpj57612n2pjldphu.apps.googleusercontent.com',
        'client_secret' => 'OteA_LFxYEd8BT6k7qnwAW2E',
        'redirect' => 'https://api.martovariverside.com/api/oauth/google/callback',
        'refresh_token' => '1//04nIMtgdj4dfCCgYIARAAGAQSNwF-L9IrNz7yGjcsVBOivLJ_ib41TOulEScWwup3lKDCv-fw9vdJlLLpu1hIEWPOfVzCcT8zUt4',
        'folder_id' => '1fBdTt0SVghIUzD3Qcc3nh1uYZjxv4dwd',
    ],

    'youtube' => [
        'client_id' => '1084938803888-kh942qstrbka2chdpj57612n2pjldphu.apps.googleusercontent.com',
        'client_secret' => 'OteA_LFxYEd8BT6k7qnwAW2E',
        'redirect' => 'https://api.martovariverside.com/api/oauth/youtube/callback',
    ],

    'facebook' => [
        'client_id' => '467278400623639',
        'client_secret' => '2da0c5dd230f7deaf173dabbe6c62f30',
        'redirect' => 'https://api.martovariverside.com/api/oauth/facebook/callback'
    ],

    'instagram' => [
        'client_id' => '142856870067904',
        'client_secret' => 'b31021d9d2055eb6afbaf8469c9fb252',
        'redirect' => 'https://api.martovariverside.com/api/oauth/instagram/callback',
    ],

    'foursquare' => [
        'client_id' => 'VXM1ZJLU3GJMMNJGM5W01KL53V1S3UIG5WR1NAH2AOKU2BK5',
        'client_secret' => 'IMNFPKIM1ZCK0HMRNRKSMHEG235KAAUDT4FN5YNOKU3D32MB',
	'redirect' => 'https://api.martovariverside.com/api/oauth/foursquare/redirect',
	'default_venue_id' => '51c44818498edaa210de36bf',
    ],

];
