<?php

$input = trim(fgets(STDIN));
$input = explode(', ', $input);

/*
 Input	                 Output
8, 20, 22	            outside

13.1, 50, 31.5, 50, 80, 50, -5, 18, 43

inside
inside
outside


 *
 *
 */


function isVolume($x, $y, $z) {
    $x1 = 10;
    $x2 = 50;
    $y1 = 20;
    $y2 = 80;
    $z1 = 15;
    $z2 = 50;

    if ($x>=$x1 && $x<=$x2){
        if ($y>=$y1 && $y<=$y2){
            if ($z>=$z1 && $z<=$z2){
                return true;
            }

        }

    }
    return false;
}

$inputNum = count($input);
    for ($i = 0; $i < $inputNum; $i += 3){
        $x = $input[$i];
        $y = $input[$i+1];
        $z = $input[$i+2];

        if (isVolume($x, $y, $z)){
            echo "inside\r\n";
        } else {
            echo "outside\r\n";

        }
    }

