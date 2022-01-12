<?php
if(isset($_COOKIE['date'])){
   $date = $_COOKIE['date'];
} else{
    $date =  "не заходили";
}
setcookie('date', date('Y-m-d H:i:s'), time()+36000);
?>
<html>
<body>
    <h1>
    Последний раз <?php echo $date; ?>
    </h1>
</body>