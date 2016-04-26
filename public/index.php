<?php

use Phalcon\Mvc\Application;

error_reporting(E_ALL);
$debug = new \Phalcon\Debug();
$debug->listen();
define('APP_PATH', realpath('..'));
//echo APP_PATH;
//define('APP_STATIC',APP_PATH . '/public/');

try {
    $loader = new \Phalcon\Loader();
    /**
     * We're a registering a set of directories taken from the configuration file
     */
    $loader->registerNamespaces( array(
        'mylib' 	=> APP_PATH . '/libraries/',
//        'vos'		=> APP_PATH . 'vos/',
//        'enums'		=> APP_PATH . 'enums/',
//        'listeners'	=> APP_PATH . 'listeners/',
        'vendor' => APP_PATH . '/vendor/'
    ));
    $loader->register();
    /**
     * Read the configuration
     */
    $config = include APP_PATH . "/apps/admin/config/config.php";

    /**
     * Include services
     */
    require __DIR__ . '/../config/services.php';

    /**
     * Handle the request
     */
    $application = new Application($di);

    /**
     * Include modules
     */
    require __DIR__ . '/../config/modules.php';

    /**
     * Include routes
     */
    require __DIR__ . '/../config/routes.php';

    echo $application->handle()->getContent();

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}
