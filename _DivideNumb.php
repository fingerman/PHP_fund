<?php
function divideNumb($a, $b){
    if ($a < 0 && $b <0){
        throw new Exception('operand is negative.');
    }

    if ($b== 0){
        throw new Exception('dividor is negative.');
    }
    return $a / $b;

}

divideNumb(8, 4);