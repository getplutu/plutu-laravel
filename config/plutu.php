<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | This key is used to authenticate with the Plutu API requests.
    |
    */
   
    'api_key' => env('PLUTU_API_KEY', ''),

    /*
    |--------------------------------------------------------------------------
    | Access token
    |--------------------------------------------------------------------------
    |
    | This token is used to authenticate with Plutu API requests.
    |
    */
    'access_token' => env('PLUTU_ACCESS_TOKEN', ''),

    /*
    |--------------------------------------------------------------------------
    | Secret Key
    |--------------------------------------------------------------------------
    |
    | The secret key used for verification and handling HMAC from Plutu.
    | It is used to verify that incoming requests are from Plutu and have
    | not been tampered with.
    |
    */
    'secret_key' => env('PLUTU_SECRET_KEY', ''),
    
];
