<?php

/**
 * Register application modules
 */
$application->registerModules(array(
//    'frontend' => array(
//        'className' => 'Hemacms\Frontend\Module',
//        'path' => __DIR__ . '/../apps/frontend/Module.php'
//    ),
    'home' => array(
        'className' => 'Hemacms\Home\Module',
        'path' => __DIR__ . '/../apps/home/Module.php'
    ),
    'admin' => array(
        'className' => 'Hemacms\Admin\Module',
        'path' => __DIR__ . '/../apps/admin/Module.php'
    ),
));
