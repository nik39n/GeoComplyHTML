<?php
setcookie('visit',1,time()+36000);
if (isset($_COOKIE['visit'])){
    echo "Добро пожаловать, дружише";
} else{
    echo "Добро пожаловать новичек";
}
