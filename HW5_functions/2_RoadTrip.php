<?php
$input = file_get_contents("php://stdin");
$inputArray = explode(PHP_EOL, $input);
$speed = $inputArray[0];
$zone = $inputArray[1];

function getLimit($zone) {
    switch ($zone){
        case 'motorway': $speedLimit = 130;
            break;
        case 'interstate': $speedLimit = 90;
            break;
        case 'city': $speedLimit = 50;
            break;
        case 'residential': $speedLimit = 20;
            break;
        default:
            echo "It is not a valid input";
            $speedLimit = 1000;
            break;
    }
    return $speedLimit;
}


function getInfraction($speed, $speedLimit) {
    $overSpeed = $speed - $speedLimit;
    if ($overSpeed < 0){
        $result = false;
    }
    else if ($overSpeed >=0 && $overSpeed<=20){
            $result = 'speeding';
        }
        else if ($overSpeed>20 && $overSpeed<=40){
            $result = 'excessive speeding';
        }
        else if ($overSpeed>40){
            $result =  'reckless driving';
        }

    return $result;
}

$limit = getLimit($zone);
$infraction = getInfraction($speed, $limit);
$overSpeed = $speed - $limit;
if ($infraction) {
    echo $infraction;
}

?>