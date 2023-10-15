<?php

return [
    'name' => 'Imperio',
    'manifest' => [
        'name' => 'Imperio',
        'short_name' => 'IMP',
        'start_url' => '/inicio',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'status_bar'=> 'white',
        'icons' => [
            '72x72' => [
                'path' => 'img/iconos/hdpi.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => 'img/iconos/xhdpi.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => 'img/iconos/128x128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => 'img/iconos/xxhdpi.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => 'img/iconos/152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => 'img/iconos/xxxhdpi.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => 'img/iconos/1024x1024.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => 'img/favicon/android-chrome-512x512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/img/product-5.png',
            '750x1334' => '/img/product-5.png',
            '828x1792' => '/img/product-5.png',
            '1125x2436' => '/img/product-5.png',
            '1242x2208' => '/img/product-5.png',
            '1242x2688' => '/img/product-5.png',
            '1536x2048' => '/img/product-5.png',
            '1668x2224' => '/img/product-5.png',
            '1668x2388' => '/img/product-5.png',
            '2048x2732' => '/img/product-5.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/img/favicon/android-chrome-512x512.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
];
