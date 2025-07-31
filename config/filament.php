<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    |
    | Here you may define the authentication settings for the Filament panel.
    |
    */

    'auth' => [
        'guard' => 'admin', // Gunakan guard admin untuk Filament
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Panel
    |--------------------------------------------------------------------------
    |
    | This is the default panel that will be used when accessing the Filament
    | admin area.
    |
    */

    'default' => 'admin',

    /*
    |--------------------------------------------------------------------------
    | Path
    |--------------------------------------------------------------------------
    |
    | This is the base path for the Filament admin panel.
    |
    */

    'path' => 'admin',

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    |
    | You may define the middleware that should be applied to the Filament
    | panel routes.
    |
    */

    'middleware' => [
        'base' => [
            'web',
        ],
        'auth' => [
            'auth:admin', // Gunakan middleware auth dengan guard admin
        ],
    ],

    // Konfigurasi lainnya seperti tema, branding, dll.
    'brand' => 'My Application Admin Panel',

];