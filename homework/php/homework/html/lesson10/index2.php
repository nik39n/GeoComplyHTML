<?php
session_start();
$first = $_GET['first'];
$_SESSION['test3'] = $first;
?>
<form action="index3.php">
    <p>2+4=</p>
    <input type="radio" name="first" value="2">2
    <input type="radio" name="first" value="6">6
    <input type="submit" value="Далее">
</form>
