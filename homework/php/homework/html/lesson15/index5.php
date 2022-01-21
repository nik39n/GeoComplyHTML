<?php

namespace Psr\Cache;


use Illuminate\Filesystem\Cache;
use PDO;


require __DIR__ . "/../vendor/autoload.php";
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__. "/..");
$dotenv->load();

$items = StaticFactory::factory('ItemDB');

$obj_example = new CacheItem("test1", "testValueItem");
$items->save($obj_example);
//$items->save(new CacheItem("testItem", "testValueItem"));
//echo '<pre>';
//print_r($items->getItem('testItem'));
//echo '</pre>';
//print_r($items->deleteItem('testItem'));
//print_r($items->getItems(['test1', 'testItem']));
//print_r($items->clear());
////print_r($items->deleteItems(['testItem','test1']));
//print_r($items->saveDeferred(new CacheItem("testItem3", "testValueItem3")));
//echo "<br>";
//print_r($items->commit());
//print_r($items->hasItem('testItem3'));

$csv = new ExportCsv();
$csv->write();