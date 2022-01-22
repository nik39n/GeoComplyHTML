<?php

namespace Psr\Cache;
use Illuminate\Filesystem\Cache;
use PDO;
require __DIR__ . "/../vendor/autoload.php";
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__. "/..");
$dotenv->load();

$object_cookie = StaticFactory::factory('ItemCookie');
$object_cookie->doSave(new CacheItem("test103", "testValueItem"));
print_r($object_cookie->doGetItem("test103"));

echo "<br>";

//$object_session = StaticFactory::factory('ItemSession');
//$object_session->doSave(new CacheItem("test101", "testValueItem"));
//print_r($object_session->doGetItem("test101"));

echo "<br>";

$object_db = StaticFactory::factory('ItemDB');
$object_db->doSave(new CacheItem("test100", "testValueItem"));
print_r($object_db->doGetItem("test100"));



