<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'usuarios', // Cambiado de 'users' a 'usuarios'
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    */
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'usuarios', // Cambiado de 'users' a 'usuarios'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    */
    'providers' => [
        'usuarios' => [ // Cambiado de 'users' a 'usuarios'
            'driver' => 'database', // Cambiado de 'eloquent' a 'database'
            'table' => 'usuarios', // Especificamos la tabla
        ],

        // Comentamos o eliminamos el provider original de users
        // 'users' => [
        //     'driver' => 'eloquent',
        //     'model' => App\Models\User::class,
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */
    'passwords' => [
        'usuarios' => [ // Cambiado de 'users' a 'usuarios'
            'provider' => 'usuarios', // Cambiado de 'users' a 'usuarios'
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */
    'password_timeout' => 10800,
];