<?php

$a = 1;
$b = 2;
$c = $a;
$d = &$b;

echo $c;
echo "</br>";
echo $d;
echo "</br>";
echo "</br>";

$a = 3;
$b = 4;

echo $a;
echo "</br>";
echo $b;
echo "</br>";
echo $c;
echo "</br>";
echo $d;
echo "</br>";