<?php
$firstVar = "Доброе утро";
$secondVar = "дамы";
$thirdVar = "и господа";
echo $firstVar;
echo "</br>";
echo $secondVar;
echo "</br>";
echo $thirdVar;
echo "</br>";

$result = null;
$result .= $firstVar . " ";
$result .= $secondVar . " ";
$result .= $thirdVar . " ";

echo $result;
echo "</br>";
echo "{$firstVar} {$secondVar} {$thirdVar}";