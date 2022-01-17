<?php
namespace Psr\Cache;
require __DIR__."/../vendor/autoload.php";
$test = new CacheItemPoolCookieClass();
print_r($test->save('test','Value test'));
print_r($test->save('test2','Value test'));
echo "<br>";
print_r($test->hasItem('test'));
echo "<br>";
print_r($test->getItem('test'));
echo "<br>";
print_r($test->getItem('test2'));
echo "<br>";
print_r($test->getItems(['test','test2']));
echo "<br>";
print_r($test->getItem('test2'));
echo "<br>";
print_r($test->deleteItems(['test','test2']));
echo "<br>";
print_r($test->deleteItem('test2'));
echo "<br>";
print_r($test->clear());
echo "<br>";
print_r($test->saveDeferred('test3',"value3"));
echo "<br>";
print_r($test->commit());
echo "<br>";

echo ($test->getClassName());
echo "<br>";





$test->info();




