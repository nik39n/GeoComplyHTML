<?php
session_start();
$first = $_GET['first'];
$_SESSION['test2'] = $first;
?>
<form action="index2.php">
    <p>2+3=</p>
    <input type="radio" name="first" value="2">2
    <input type="radio" name="first" value="5">5
    <input type="submit" value="Далее">
</form>
