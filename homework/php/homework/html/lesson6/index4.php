<?php
$digits = array(2,-10,-2, 4, 5, 1, 6, 200, 1.6, 95);

function deleteNegatives(& $digits){
    foreach ($digits as $items => $item){
        if ($item<0){
            unset($digits[$items]);
        }

    }
    return $digits;
}

deleteNegatives( $digits);
print_r($digits);
