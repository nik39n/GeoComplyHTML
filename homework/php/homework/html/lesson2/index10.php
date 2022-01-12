<?php
const MAX = 50;
const MIN = 10;
$x = 50;


if ($x > MIN && $x < MAX){
    echo "+";
}elseif ($x == MIN || $x == MAX){
    echo "+-";
}else{
    echo "-";
}