<?php

return [
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'custom_users', // Aquí cambias 'users' por 'custom_users'
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'custom_users', // Aquí cambias 'users' por 'custom_users'
        ],
    ],

    'providers' => [
        'custom_users' => [ // Cambia 'users' por 'custom_users'
            'driver' => 'eloquent',
            'model' => App\Models\CustomUser::class, // Asegúrate de que esté utilizando tu modelo CustomUser
        ],
    ],

    'passwords' => [
        'custom_users' => [
            'provider' => 'custom_users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,
];
