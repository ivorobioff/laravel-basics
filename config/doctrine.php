<?php
/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */

return [
    'db' => 'default',

    'connections' => [
        'default' => [
            'driver' => 'pdo_mysql',
            'user' => $this->parameter('database.username'),
            'password' => $this->parameter('database.password'),
            'dbname' => $this->parameter('database.name'),
            'charset' => 'utf8',
            'host' => $this->parameter('database.host')
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