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
        'pluginsDir'     => __DIR__ . '/../plugins/',
        'libraryDir'     => __DIR__ . '/../libraries/',
        'cacheDir'       => __DIR__ . '/../cache/',
        'enumsDir'		 => __DIR__ . '/../enums/',
        'logs' 			 => __DIR__ . '/../logs/',
        'listenersDir'	 => __DIR__ . '/../listeners/',
        'baseUri'        => '/hemacms/'
    )
));