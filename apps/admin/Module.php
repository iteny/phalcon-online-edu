<?php

namespace Hemacms\Admin;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\ModuleDefinitionInterface;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\File as FileAdapter;
use Phalcon\Events\Manager as EventsManager;
use Phalcon\Cache\Frontend\Output as ViewCacheOut;
use Phalcon\Cache\Backend\File as ViewCacheFile;
use Phalcon\Cache\Frontend\Data as FrontendData;
use Phalcon\Cache\Backend\Redis as BackendRedis;

use Hemalib\Functions;


class Module implements ModuleDefinitionInterface
{
    /**
     * Registers an autoloader related to the module
     *
     * @param DiInterface $di
     */
    public function registerAutoloaders(DiInterface $di = null)
    {

        $loader = new Loader();

        $loader->registerNamespaces(array(
            'Hemacms\Admin\Controllers' => __DIR__ . '/controllers/',
            'Hemacms\Admin\Models' => __DIR__ . '/models/',
        ));

        $loader->register();
    }

    /**
     * Registers services related to the module
     *
     * @param DiInterface $di
     */
    public function registerServices(DiInterface $di)
    {
        /**
         * Read configuration
         */
        $config = include APP_PATH . "/apps/admin/config/config.php";


        /**
         * Setting up the view component
         */
        $di['view'] = function () {
            $view = new View();
            $view->setViewsDir(__DIR__ . '/views/');
            $view->registerEngines(array(
                ".volt" => 'Phalcon\Mvc\View\Engine\Volt'
            ));

            return $view;
        };


        /**
         * Database connection is created based in the parameters defined in the configuration file
         */
        $di['db'] = function () use ($config) {
            $dbconfig = $config->database->toArray();
            $dbAdapter = '\Phalcon\Db\Adapter\Pdo\\' . $dbconfig['adapter'];
            unset($config['adapter']);
            $connection = new $dbAdapter($dbconfig);
            ////新建一个事件管理器
            if($config->application->debug){
                $eventsManager = new EventsManager();;
                $logger = new FileAdapter($config->dblog->path .date('Y-m-d').'db.log');
                //监听数据库日志
                $eventsManager->attach('db', function ($event, $connection) use ($logger) {
                    if ($event->getType() == 'beforeQuery') {
                        $logger->log($connection->getSQLStatement(), Logger::INFO);
                    }
                });
                //将事件管理器绑定到db实例中
                $connection->setEventsManager($eventsManager);
            }
            return $connection;
        };
        /**
         * 视图缓存
         */
        $di['viewCache'] = function () use ($config) {
            //Cache data for one day by default
            $frontCache = new ViewCacheOut(array(
                'lifetime' => $config->viewcache->lifetime
            ));
            //File backend settings
            if($config->application->debug) {
                $cache = new ViewCacheFile($frontCache, array(
                    'cacheDir' => $config->viewcache->cachepath,
                    'prefix' => 'view'
                ));
            }else{
                // Redis连接配置 这里使用的是Redis适配器
                $cache = new BackendRedis(
                    $frontCache,
                    array(
                        'host' => $config->redis->host,
                        'port' => $config->redis->port,
                        'auth' => $config->redis->auth,
                        'persistent' => $config->redis->persistent
                    )
                );
            }
            return $cache;
        };
        /**
         * 模型数据缓存
         */
        $di['modelsCache'] = function () use ($config) {
            // 默认缓存时间为一天
            $frontCache = new FrontendData(
                array(
                    "lifetime" => $config->modelscache->lifetime
                )
            );
            // Redis连接配置 这里使用的是Redis适配器
            $cache = new BackendRedis(
                $frontCache,
                array(
                    'host' => $config->redis->host,
                    'port' => $config->redis->port,
                    'auth' => $config->redis->auth,
                    'persistent' => $config->redis->persistent
                )
            );
            return $cache;
        };
        /**
         * 安全缓存
         */
        $di['safeCache'] = function () use ($config) {
            // 默认缓存时间为一天
            $frontCache = new FrontendData(
                array(
                    "lifetime" => $config->safecache->lifetime
                )
            );
            // Redis连接配置 这里使用的是Redis适配器
            $cache = new BackendRedis(
                $frontCache,
                array(
                    'host' => $config->redis->host,
                    'port' => $config->redis->port,
                    'auth' => $config->redis->auth,
                    'persistent' => $config->redis->persistent
                )
            );
            return $cache;
        };
        $di['function'] = function () {
            return new Functions();
        };
        /**
         * dispather调度器
         */
//        $di['dispatcher'] = function () use ($di) {
//
//        };

    }
}