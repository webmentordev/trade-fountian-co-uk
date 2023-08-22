<?php

use PharIo\Manifest\Url;
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Trade Fountain", // set false to total remove
            'titleBefore'  => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description'  => 'Discover high-quality kitchen accessories at Trade Fountain and Trade Fountain Amazon! Elevate your dining experience with our exquisite cloth napkins and towels. Explore a wide range of designs and colors to add a touch of elegance to your table setting. Shop now to enhance your kitchen aesthetics with Trade Fountain', // set false to total remove
            'separator'    => ' — ',
            'keywords'     => ['cloth napkins', 'trade fountain', 'trade fountain amazon'],
            'canonical'    => null, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots'       => 'all', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
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
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Over 9000 Thousand!', // set false to total remove
            'description' => 'Discover high-quality kitchen accessories at Trade Fountain! Elevate your dining experience with our exquisite cloth napkins and towels. Explore a wide range of designs and colors to add a touch of elegance to your table setting. Shop now to enhance your kitchen aesthetics with Trade Fountain', // set false to total remove
            'url'         => null, // Set null for using Url::current(), set false to total remove
            'type'        => false,
            'site_name'   => "Trade Fountain",
            'images'      => [
                config('app.url').'/assets/trade-fountain-preview.png'
            ],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card'        => 'large_summary',
            'site'        => '@tradefountainuk',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title'       => 'Over 9000 Thousand!', // set false to total remove
            'description' => 'Discover high-quality kitchen accessories at Trade Fountain! Elevate your dining experience with our exquisite cloth napkins and towels. Explore a wide range of designs and colors to add a touch of elegance to your table setting. Shop now to enhance your kitchen aesthetics with Trade Fountain', // set false to total remove
            'url'         => null, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type'        => 'WebPage',
            'images'      => [
                config('app.url').'/assets/trade-fountain-preview.png'
            ],
        ],
    ],
];
