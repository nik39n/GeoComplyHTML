<form action="index2.php">
    <input type="text" name="name">
    <input name="male" type="radio" value="Male"> Male
    <input name="male" type="radio" value="Female"> Female
    <input type="submit">

</form>

<?php

if ($_GET['male']=="Male"){
    echo "Добро пожаловать, мистер ".$_GET["name"];
} elseif ($_GET['male']=="Female"){
    echo "Добро пожаловать, мииссис ".$_GET["name"];

}