<?php
namespace Psr\Cache;
require __DIR__."/../vendor/autoload.php";

$item = new CacheItemPoolSession();
$item->save(new CacheItem("testItem","testValueItem"));
print_r($item->getItem('testItem'));
