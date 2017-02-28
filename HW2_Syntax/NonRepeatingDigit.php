<?php

$C = 1234;



$index = 1;
$array = array();
do {
    if ($C < 100){
    echo "no";
        break;
    }
    $array[] = $index;
    $index++;
}while($index <= $C);



$result = array_filter($array, function ($number) {

    $containsUniqueNumbers = true;

    foreach (count_chars(strval($number), 1) as $count) {

        // If any of the characters in the string occurs more than once:
        if ($count > 1) {
            $containsUniqueNumbers = false;
            break;
        }
    }

    return $containsUniqueNumbers;

});

print_r($result);
foreach ($result as $key => $val) {
    if ($val < 1000 && $val > 100){
    $val = (int)substr((string)$val, 0, 3);
    echo $val . ", ";
    }
}



?>


