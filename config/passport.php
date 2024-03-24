<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Passport Guard
    |--------------------------------------------------------------------------
    |
    | Here you may specify which authentication guard Passport will use when
    | authenticating users. This value should correspond with one of your
    | guards that is already present in your "auth" configuration file.
    |
    */

    'guard' => 'api',

    /*
    |--------------------------------------------------------------------------
    | Encryption Keys
    |--------------------------------------------------------------------------
    |
    | Passport uses encryption keys while generating secure access tokens for
    | your application. By default, the keys are stored as local files but
    | can be set via environment variables when that is more convenient.
    |
    */

    'private_key' => env('PASSPORT_PRIVATE_KEY'),

    'public_key' => env('PASSPORT_PUBLIC_KEY'),

    /*
    |--------------------------------------------------------------------------
    | Client UUIDs
    |--------------------------------------------------------------------------
    |
    | By default, Passport uses auto-incrementing primary keys when assigning
    | IDs to clients. However, if Passport is installed using the provided
    | --uuids switch, this will be set to "true" and UUIDs will be used.
    |
    */

    'client_uuids' => false,

    /*
    |--------------------------------------------------------------------------
    | Personal Access Client
    |--------------------------------------------------------------------------
    |
    | If you enable client hashing, you should set the personal access client
    | ID and unhashed secret within your environment file. The values will
    | get used while issuing fresh personal access tokens to your users.
    |
    */

    'personal_access_client' => [
        'id' => 1,  // Utiliza el Client ID generado (1)
        'secret' => 'VkgJhqY9FTzuKkMUCS93B33ufC4g5eK3M4FyqoDA',  // Utiliza el Client secret generado
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Grant Client
    |--------------------------------------------------------------------------
    |
    | If you enable the password grant client, you should set the client
    | ID and secret in your environment file. The "provider" field
    | determines which Eloquent model is used to retrieve users for
    | the password grant. This defaults to the "users" table.
    |
    */

    'password_grant_client' => [
        'id' => 2,  // Utiliza el Client ID generado (2)
        'secret' => 'ixVSK9iPYSnyB9gttrvY4yN14Gv44AMnb2juOE2p',  // Utiliza el Client secret generado
        'provider' => 'users',
    ],

];
