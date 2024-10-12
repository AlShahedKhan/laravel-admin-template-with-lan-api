<?php

return [
    'default' => env('BROADCAST_DRIVER', 'null'),

    'connections' => [
        'log' => [
            'driver' => 'log',
        ],
        'pusher' => [
            'driver' => 'pusher',
            'key' => env('PUSHER_APP_KEY'),
            'secret' => env('PUSHER_APP_SECRET'),
            'app_id' => env('PUSHER_APP_ID'),
            'options' => [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'encrypted' => true,
                'useTLS' => true,
            ],
        ],
    ],    

    'channels' => [
        'public-channel' => [
            'driver' => 'pusher',
            'name' => 'public-channel',
            'options' => [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'encrypted' => true,
                'useTLS' => true,
            ],
        ],
    ],
];


