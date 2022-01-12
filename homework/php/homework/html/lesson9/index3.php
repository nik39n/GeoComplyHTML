<?php
$i=1;
setcookie('count',$i,time()+36000);
if (isset($_COOKIE['count'])){
    echo "Вы были " . $_COOKIE['count'];
    $i = ++$_COOKIE['count'];
    setcookie("count", $i,time()+36000);
} else {
    echo "вы не были здесь";
}
