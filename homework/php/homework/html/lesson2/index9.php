<?php
$firstMassive = array(
    "!"=>"apple",
    "tree",
    "banana",
    "tomato",
    "orange"
);
$secondMassive = array(
    "bmw",
    "toyota",
    "opel",
    "vaz",
    "daewoo"
);
unset($secondMassive[0]);

echo $firstMassive[2];
echo "</br>";
echo $secondMassive[2];

echo "<pre>";
print_r($firstMassive);
echo "</pre>";
echo "<pre>";
print_r($secondMassive);
echo "</pre>";

echo "</br>";
echo count($firstMassive);
echo "</br>";
echo count($secondMassive);
