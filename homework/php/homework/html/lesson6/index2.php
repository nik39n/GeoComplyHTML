<?php

function equtuin ($a,$b,$c){
    $d = ($b**2)-(4*$a*$c);
    if ($d>0){
        $xFirst=($b*-1+sqrt($d))/(2*$a);
        $xSecond=($b*-1-sqrt($d))/(2*$a);
        $resArray = ['first' =>$xFirst,
            'second' =>$xSecond
        ];
        return $resArray;
    } elseif ($d===0){
        $xOne=($b*(-1)+sqrt($d))/(2*$a);
        return $xOne;
    } else {
        return false;
    }
}


var_dump(equtuin(-2,45,-5));