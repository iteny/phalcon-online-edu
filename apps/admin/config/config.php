<?php

return new \Phalcon\Config(array(
    'database' => array(
        'adapter'  => 'Mysql',
        'host'     => 'localhost',
        'username' => 'root',
        'password' => 'iteny',
        'dbname'   => 'hemacms',
        'charset'  => 'utf8',
    ),
    'application' => array(
        'controllersDir' => __DIR__ . '/../controllers/',
        'modelsDir'      => __DIR__ . '/../models/',
        'migrationsDir'  => __DIR__ . '/../migrations/',
        'viewsDir'       => __DIR__ . '/../views/',
        'baseUri'        => '/',
        'debug' => true,
    ),
    'dblog' => array (
        'enabled' => true,
        'path' => APP_PATH . '/runtime/dblogs/',
        'format' => '[%date%][%type%] %message%',
    ),
    'viewcache' => array(
        'lifetime' => 100,
        'cachepath' => APP_PATH . '/apps/admin/cache/',
    ),
    'modelscache' => array(
        'lifetime' => 100, //模型缓存默认时间周期
    ),
    'safecache' => array(
        'lifetime' => 100, //安全缓存默认时间周期
    ),
    'redis' => array(
        'host' => 'localhost',
        'port' => 6379,
        'auth' => 'iteny',
        'persistent' => false,
    ),
));