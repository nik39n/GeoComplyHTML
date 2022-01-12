<?php
$products = array(
    array('name' => 'Телевизор', 'price' => '400', 'quantity' => 1),
    array('name' => 'Телефон', 'price' => '300', 'quantity' => 3),
    array('name' => 'Кроссовки', 'price' => '150', 'quantity' => 2),
);

function cartShop($array){
    foreach ($array as $item => $value){
        $sum += $value['price'];
        $count += 1;
    }
    $returnArray = [];
    $returnArray ['Сумма'] = $sum;
    $returnArray ['Количество'] = $count;
    return $returnArray;
}

var_dump(cartShop($products));