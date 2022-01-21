<?php

namespace Psr\Cache;

use Illuminate\Filesystem\Cache;

require __DIR__ . "/../vendor/autoload.php";

$items = StaticFactory::factory('ItemCookie');
$obj_example = new CacheItem("testItem", "testValueItem");
$items->save($obj_example);
echo "<br>";
print_r($items->getItem('testItem'));
echo "<br>";
print_r($items->hasItem('testItem'));
echo "<br>";
//print_r($items->save(new CacheItem("testItem2", "testValueItem2")));
echo "<br>";
print_r($items->getItems(['testItem', 'testItem2']));
echo "<br>";
//print_r($item->deleteItems(['testItem','testItem2']));
//echo "<br>";
//print_r($item->deleteItem('testItem'));
//echo "<br>";
//print_r($items->clear());

//echo "<br>";
//print_r($items->saveDeferred(new CacheItem("testItem3", "testValueItem3")));
echo "<br>";
print_r($items->commit());
echo "<br>";
print_r($_COOKIE);
