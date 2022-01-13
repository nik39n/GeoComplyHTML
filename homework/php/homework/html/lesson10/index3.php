<?php
session_start();
$first = $_GET['first'];
$_SESSION['test4'] = $first;
?>
<form action="index4.php">
    <p>2+5=</p>
    <input type="radio" name="first" value="2">2
    <input type="radio" name="first" value="7">7
    <input type="submit" value="Далее">
</form>
