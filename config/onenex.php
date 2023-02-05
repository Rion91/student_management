<?php

return [
    'version' => '1.0.0',

    'basic_auth' => [
        'username' => env('WEB_BASIC_AUTH_USERNAME', 'root'),
        'password' => env('WEB_BASIC_AUTH_PASSWORD', 'toor'),
    ],

    'admin_email' => env('ADMIN_EMAIL'),
    'admin_password' => env('ADMIN_PASSWORD'),
];
