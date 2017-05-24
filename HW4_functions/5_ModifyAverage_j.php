<?php
    $number = trim(fgets(STDIN));

    function getAverage($num){
        $average = 0;
        for ($i=0; $i <= strlen($num); $i++){
            $average += $num[$i];
        }
        $average /= strlen($num);

        return $average;
    }

    $average = getAverage($number);

    while ($average < 5){
        $number .= '9';
        $average = getAverage($number);
    }

    echo "$number";


