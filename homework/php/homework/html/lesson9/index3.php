<?php
setcookie('count',1,time()+36000);
$i = ++$_COOKIE['count'];
if ($_COOKIE['count']>1){
    setcookie("count", $i,time()+36000);
    echo "Вы были " . $_COOKIE['count']. "раз";
} elseif($_COOKIE['count']==1) {
    echo "вы не были здесь";
}

