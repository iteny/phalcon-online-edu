<?php
/**
 * Services are globally registered in this file
 *
 * @var \Phalcon\Config $config
 */

use Phalcon\Mvc\Router;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Di\FactoryDefault;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Flash\Direct as Flash;
use Phalcon\Mvc\Dispatcher as MvcDispatcher;
use Phalcon\Events\Manager as EventsManager;

use Phalcon\Logger;
use Phalcon\Logger\Adapter\File as FileAdapter;
use Phalcon\Db\Profiler as ProfilerDb;
use Phalcon\Db\Adapter\Pdo\Mysql as Connection;
use Phalcon\Assets\Manager as ResourceManager;
use Phalcon\Cache\Frontend\Output as ViewCacheOut;
use Phalcon\Cache\Backend\File as ViewCacheFile;
use Phalcon\Http\Request as ParamsRequest;
use Phalcon\Http\Response as ReturnResponse;
use Phalcon\Http\Response\Cookies;
use Phalcon\Crypt;
use Phalcon\Session\Adapter\Files as Session;
use Phalcon\Security;
/**
 * The FactoryDefault Dependency Injector automatically registers the right services to provide a full stack framework
 */
$di = new FactoryDefault();

/**
 * Registering a router
 */
$di->setShared('router', function () {
    $router = new Router();

    $router->setDefaultModule('home');
    $router->setDefaultController('index');
    $router->setDefaultAction('index');
    $router->setDefaultNamespace('Hemacms\Home\Controllers');

    return $router;
});
$di->setShared('assets',function(){
    $assets = new ResourceManager();
    return $assets;
});
/**
 * The URL component is used to generate all kinds of URLs in the application
 */
$di->setShared('url', function () use ($config) {
    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);

    return $url;
});

/**
 * Setting up the view component
 */
$di->setShared('view', function () use ($config) {

    $view = new View();

    $view->setViewsDir($config->application->viewsDir);

    $view->registerEngines(array(
        '.volt' => function ($view, $di) use ($config) {

            $volt = new VoltEngine($view, $di);

            $volt->setOptions(array(
                'compiledPath' => $config->application->cacheDir,
                'compiledSeparator' => '_'
            ));

            return $volt;
        },
        '.phtml' => 'Phalcon\Mvc\View\Engine\Php'
    ));

    return $view;
});
//记录日志
$di->set('logger', function () use ($config){
    $logger = new \Phalcon\Logger\Adapter\File($config->logger->path .date('Y-m-d').'.log');
    $formatter = new Phalcon\Logger\Formatter\Line($config->logger->format);
    $logger->setFormatter($formatter);
    return $logger;
}, true);
$di->set('profiler', function () {
    return new ProfilerDb();
}, true);
/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->setShared('db', function () use ($config) {
    $dbConfig = $config->database->toArray();
    $adapter = $dbConfig['adapter'];
    unset($dbConfig['adapter']);
    $class = 'Phalcon\Db\Adapter\Pdo\\' . $adapter;

    $connection = new $class($dbConfig);

    return $connection;
});

/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Starts the session the first time some component requests the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    return new Flash(array(
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ));
});
//Set the views cache service
$di->set('viewCache', function() use($config){
    //Cache data for one day by default
    $frontCache = new ViewCacheOut(array(
        "lifetime" => 100
    ));
    //File backend settings
//    $rou = new Router();
//    $md = $rou->getModuleName();
    $cache = new ViewCacheFile($frontCache, array(
        "cacheDir" => __DIR__."/../runtime/viewcache/",
        "prefix" => "php"
    ));
    return $cache;
});
//数据缓存
//$di->set('modelsCache', function() use ($config) {
//    //Cache data for one day by default
//    $frontCache = new \Phalcon\Cache\Frontend\Data($config->cache->modelCache->frontend->options->toArray());
//    //Memcached connection settings
//    return new \Phalcon\Cache\Backend\File($frontCache,$config->cache->modelCache->backend->options->toArray());
//});
// 设置模型缓存服务
$di->set('modelsCache', function () use($config) {

});
//设置安全缓存
$di->set('safeCache', function () use($config) {

});
/**
* Set the default namespace for dispatcher
*/
$di->setShared('dispatcher', function() use ($di) {
    $dispatcher = new Phalcon\Mvc\Dispatcher();
    $dispatcher->setDefaultNamespace('Hemacms\Admin\Controllers');
//    return $dispatcher;
    // 创建一个事件管理
//    $eventsManager = new EventsManager();
//    // 附上一个侦听者
//    $eventsManager->attach("dispatch:beforeException", function ($event, $dispatcher, $exception) {
//
//        // 处理404异常
//        if ($exception instanceof DispatchException) {
//            $dispatcher->forward(
//                array(
//                    'controller' => 'index',
//                    'action'     => 'show'
//                )
//            );
//
//            return false;
//        }
//        // 代替控制器或者动作不存在时的路径
//        switch ($exception->getCode()) {
//            case Dispatcher::EXCEPTION_HANDLER_NOT_FOUND:
//            case Dispatcher::EXCEPTION_ACTION_NOT_FOUND:
//                $dispatcher->forward(
//                    array(
//                        'controller' => 'index',
//                        'action'     => 'show404'
//                    )
//                );
//
//                return false;
//        }
//    });
    // 将EventsManager绑定到调度器
//    $dispatcher->setEventsManager($eventsManager);
    return $dispatcher;
});
$di->setShared('response',function(){
    return new ReturnResponse();
});
$di->setShared('request',function(){
    return new ParamsRequest();
});
$di->setShared('cookies', function () {
    $cookies = new Cookies();
    $cookies->useEncryption(true);
    return $cookies;
});
$di->setShared('crypt', function () {
    $crypt = new Crypt();
    $crypt->setKey('#1dj8$=dp?.ak//j1V$'); // 使用你自己的key！
    return $crypt;
});
$di->setShared('session', function () {
    $session = new Session();
    $session->start();
    return $session;
});
$di->setShared('security', function () {
    $security = new Security();
    // Set the password hashing factor to 12 rounds
    $security->setWorkFactor(12);
    return $security;
});
$di->setShared('config', function () use($config){
    return $config;
});

