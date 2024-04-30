<?php

use App\Providers\RouteServiceProvider;
use Laravel\Fortify\Features;

return [
    'guard' => 'web',

    'passwords' => 'users',

    'username' => 'license',

    'email' => 'email',

    'lowercase_usernames' => true,

    'home' => RouteServiceProvider::HOME,

    'prefix' => '',

    'domain' => null,

    'middleware' => ['web'],

    'limiters' => ['login' => 'login', 'two-factor' => 'two-factor'],

    'views' => true,

    'features' => [
        Features::updateProfileInformation(),
        Features::updatePasswords(),
        Features::twoFactorAuthentication([
            'confirm' => true,
            'confirmPassword' => true,
        ]),
    ],
];
