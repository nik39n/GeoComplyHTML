<form action="index.php" method="GET">
    <input type="text" name="first">
    <input type="text" name="second">
    <input type="text" name="third">
    <input type="text" name="fourth">
    <input type="text" name="fifth">
    <input type="text" name="sixth">
    <input type="text" name="seventh">
    <input type="submit" name="but_submit">
</form>
<?php
$arr = array();
foreach ($_GET as $items =>$item){
    if ($items!='but_submit' && $item!=NULL){
        $x = intval($_GET[$items]);
        $arr[$items] = $x;
    }
}


echo "<pre>";
print_r($arr);
echo "</pre>";

echo "MAX: ". max($arr);
echo "<br>";
echo "MIN: " . min($arr);
echo "<br>";
echo "AVERAGE: ". array_sum($arr)/count($arr);