<?php
namespace Psr\Cache;
require __DIR__."/../vendor/autoload.php";

$test2 = new CacheItemPoolSessionClass();
print_r($test2->save('test','Value test'));
print_r($test2->save('test2','Value test'));
echo "<br>";
print_r($test2->hasItem('test'));
echo "<br>";
print_r($test2->getItem('test'));
echo "<br>";
print_r($test2->getItem('test2'));
echo "<br>";
print_r($test2->getItems(['test','test2']));
echo "<br>";
print_r($test2->getItem('test2'));
echo "<br>";
print_r($test2->save('sesTest1','sesValue'));
echo "<br>";
print_r($test2->deleteItems(['test','test2']));
echo "<br>";
print_r($test2->deleteItem('test2'));
echo "<br>";
print_r($test2->clear());
print_r($_SESSION);
echo "<br>";
print_r($test2->saveDeferred('test3',"value3"));
echo "<br>";
print_r($test2->commit());
echo "<br>";
print_r($_SESSION);

echo ($test2->getClassName());

$test2->info();