<?php

return [
    'name' => 'Jaydey',
    'manifest' => [
        'name' => env('APP_NAME', 'Jaydey'),
        'short_name' => 'JDY',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'green',
        'icons' => [
            '72x72' => [
                'path' => '/images/icons/Jaydey-72X72.png',
                'purpose' => 'any maskable',
            ],
            '96x96' => [
                'path' => '/images/icons/Jaydey-96X96.png',
                'purpose' => 'any maskable',
            ],
            '128x128' => [
                'path' => '/images/icons/Jaydey-128X128.png',
                'purpose' => 'any maskable',
            ],
            '144x144' => [
                'path' => '/images/icons/Jaydey144X144.png',
                'purpose' => 'any maskable',
            ],
            '152x152' => [
                'path' => '/images/icons/Jaydey-152X152.png',
                'purpose' => 'any maskable',
            ],
            '192x192' => [
                'path' => '/images/icons/Jaydey-192X192.png',
                'purpose' => 'any maskable',
            ],
            '384x384' => [
                'path' => '/images/icons/Jaydey-384X384.png',
                'purpose' => 'any maskable',
            ],
            '512x512' => [
                'path' => '/images/icons/Jaydey-512X512.png',
                'purpose' => 'any maskable',
            ],
        ],
        'splash' => [
            '640x1136' => '/images/icons/splash-640x1136.png',
            '750x1334' => '/images/icons/splash-750x1334.png',
            '828x1792' => '/images/icons/splash-828x1792.png',
            '1125x2436' => '/images/icons/splash-1125x2436.png',
            '1242x2208' => '/images/icons/splash-1242x2208.png',
            '1242x2688' => '/images/icons/splash-1242x2688.png',
            '1536x2048' => '/images/icons/splash-1536x2048.png',
            '1668x2224' => '/images/icons/splash-1668x2224.png',
            '1668x2388' => '/images/icons/splash-1668x2388.png',
            '2048x2732' => '/images/icons/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Libros',
                'description' => 'Biblioteca',
                'url' => '/books',
                'icons' => [
                    "src" => "/images/icons/Jaydey-72X72.png",
                    'sizes' => '72x72',
                    'purpose' => 'any maskable'
                ]
            ],
        ],
       'custom' => [
    'offline_page' => '/offline',
    'cache_version' => 'v1',
    'enabled' => true,
    'files' => [
        'css' => [
            '/css/login.css',
            '/css/home.css'
        ],
        'images' => [
            '/images/icons/*'
        ]
    ]
]
    ]
];