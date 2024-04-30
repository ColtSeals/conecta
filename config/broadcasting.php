<?php

return [
    'default' => env('BROADCAST_DRIVER', 'soketi'),

    'soketi' => [
        'driver' => 'pusher',
        'key' => env('SOKETI_APP_KEY', 'app-key'),
        'secret' => env('SOKETI_APP_SECRET', 'app-secret'),
        'app_id' => env('SOKETI_APP_ID', 'app-id'),
        'options' => [
            'host' => env('SOKETI_HOST', '127.0.0.1'),
            'port' => env('SOKETI_PORT', 6001),
            'scheme' => 'http',
        ],

    'ably' => [
            'driver' => 'ably',
            'key' => env('ABLY_KEY'),
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
        ],

        'log' => [
            'driver' => 'log',
        ],

        'null' => [
            'driver' => 'null',
        ],
    ],
];
