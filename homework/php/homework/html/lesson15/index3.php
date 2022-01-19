<?php
namespace Psr\Cache;
use Illuminate\Filesystem\Cache;

require __DIR__."/../vendor/autoload.php";

$item = new CacheItemPoolSession();
$obj_example = new CacheItem("testItem","testValueItem");
$item->save($obj_example);
echo "<br>";
print_r($item->getItem('testItem'));
echo "<br>";
print_r($item->hasItem('testItem'));
echo "<br>";
print_r($item->save(new CacheItem("testItem2","testValueItem2")));
echo "<br>";
print_r($item->getItems(['testItem','testItem2']));
echo "<br>";
//print_r($item->deleteItems(['testItem','testItem2']));
//echo "<br>";
//print_r($item->deleteItem('testItem'));
//echo "<br>";
print_r($item->clear());

//echo "<br>";
print_r($item->saveDeferred(new CacheItem("testItem3","testValueItem3")));
echo "<br>";
print_r($item->commit());
echo "<br>";
print_r($_SESSION);