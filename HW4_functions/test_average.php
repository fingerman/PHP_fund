<?php
/**
 * Created by PhpStorm.
 * User: computer
 * Date: 13.02.2017
 * Time: 16:40
 */


$number = 555;

function getAverage($num){
    $average = 0;
    for ($i=0; $i <= strlen($num); $i++){
        $average += $num[$i];
    }
    //$average /= strlen($num);

    return $average;
}

$input = getAverage($number);



/*
while ($average < 5){
    $number .= '9';
    $number = getAverage($number);
}

echo "$number";
*/