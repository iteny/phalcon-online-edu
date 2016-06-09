<?php
$settings=array (
  'database' => 
  array (
    'adapter' => 'Mysql',
    'host' => 'localhost',
    'username' => 'root',
    'password' => 'iteny',
    'dbname' => 'hemacms',
    'charset' => 'utf8',
    'prefix' => 'hm_',
  ),
  'application' => 
  array (
    'controllersDir' => '/mnt/hgfs/demo/hemacms/apps/admin/config/../controllers/',
    'modelsDir' => '/mnt/hgfs/demo/hemacms/apps/admin/config/../models/',
    'migrationsDir' => '/mnt/hgfs/demo/hemacms/apps/admin/config/../migrations/',
    'viewsDir' => '/mnt/hgfs/demo/hemacms/apps/admin/config/../views/',
    'baseUri' => '/',
    'debug' => 'true',
  ),
  'log' => 
  array (
    'loginlogtime' => true,
    'operatelogtime' => true,
  ),
  'dblog' => 
  array (
    'enabled' => true,
    'path' => '/mnt/hgfs/demo/hemacms/runtime/dblogs/',
    'format' => '[%date%][%type%] %message%',
  ),
  'viewcache' => 
  array (
    'lifetime' => 100,
    'cachepath' => '/mnt/hgfs/demo/hemacms/apps/admin/cache/',
  ),
  'modelscache' => 
  array (
    'lifetime' => 100,
  ),
  'safecache' => 
  array (
    'lifetime' => '200',
  ),
  'redis' => 
  array (
    'host' => 'localhost',
    'port' => 6379,
    'auth' => 'iteny',
    'persistent' => false,
  ),
  'admincache' => 
  array (
    'adminmenu' => '300',
    'adminlog' => '100',
  ),
);
?>