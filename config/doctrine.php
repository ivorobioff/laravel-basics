<?php
/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */

return [
    'db' => 'default',

    'connections' => [
        'default' => [
            'driver' => 'pdo_mysql',
            'user' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'dbname' => env('DB_DATABASE'),
            'charset' => 'utf8',
            'host' => 'localhost'
        ]
    ],

    'cache' => Doctrine\Common\Cache\ArrayCache::class,
    'proxy' => [
        'auto' => Doctrine\Common\Proxy\AbstractProxyFactory::AUTOGENERATE_ALWAYS,
        'dir' => storage_path('proxies'),
        'namespace' => 'ImmediateSolutions\Temp\Proxies'
    ],
    'migrations' => [
        'dir' => database_path('migrations'),
        'namespace' => 'ImmediateSolutions\Migrations',
        'table' => 'migrations'
    ],
    'entities' => [
        //
    ],

    'types' => [
        //
    ]
];