<?php

use PharIo\Manifest\Url;
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        'defaults'       => [
            'title'        => "Buy 100% Pure Cotton Napkins, Tea Towels In UK",
            'titleBefore'  => false,
            'description'  => 'Buy high-quality kitchen accessories made with 100% Pure Cotton Fabric, cotton napkins in multiple colours, tea towels and dish towels at Trade Fountain in UK',
            'separator'    => ' — ',
            'keywords'     => ['cotton napkins', 'trade fountain', 'trade fountain amazon', 'tea towel'],
            'canonical'    => null,
            'robots'       => 'all', 
        ],
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
            'norton'    => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        'defaults' => [
            'title'       => 'Buy 100% Pure Cotton Napkins, Tea Towels In UK',
            'description' => 'Buy high-quality kitchen accessories made with 100% Pure Cotton Fabric, cotton napkins in multiple colours, tea towels and dish towels at Trade Fountain in UK',
            'url'         => null,
            'type'        => false,
            'site_name'   => "Trade Fountain",
            'images'      => [
                config('app.url').'/assets/trade-fountain-preview.png'
            ],
        ],
    ],
    'twitter' => [
        'defaults' => [
            'card'        => 'large_summary',
            'site'        => '@tradefountainuk',
        ],
    ],
    'json-ld' => [
        'defaults' => [
            'title'       => 'Buy 100% Pure Cotton Napkins, Tea Towels In UK',
            'description' => 'Buy high-quality kitchen accessories made with 100% Pure Cotton Fabric, cotton napkins in multiple colours, tea towels and dish towels at Trade Fountain in UK',
            'url'         => null,
            'type'        => 'WebPage',
            'images'      => [
                config('app.url').'/assets/trade-fountain-preview.png'
            ],
        ],
    ],
];