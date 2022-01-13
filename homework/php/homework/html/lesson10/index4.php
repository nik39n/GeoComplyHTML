<?php
session_start();
$first = $_GET['first'];
$_SESSION['test5'] = $first;
if($_SESSION['test5']==7&&$_SESSION['test4']==6&&$_SESSION['test3']==5&&$_SESSION['test2']==4){
    echo "Вы успешно сдали тест!!!!";
} else {
    echo "Вы не сдали тест!!!";
}
session_destroy();
?>

