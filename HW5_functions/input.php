<?php
/*
    $input = trim(file_get_contents("./test_speed.txt"));
    $inputArray = explode(PHP_EOL, $input);
    $input1 = $inputArray[0];
    $input2 = $inputArray[1];
    echo "$input1" . " " . "$input2";

// works with CMD for input with new lines:
   $input = file_get_contents("php://stdin");
   $inputArray = explode(PHP_EOL, $input);
   $speed = $inputArray[0];
   $zone = $inputArray[1];
*/



/*
//$file = fopen("test.txt", "r");
$lines = file("./test.txt");
echo "$lines[0]" . "<br/>";
echo "$lines[1]" . "<br/>";
$operations = explode(', ', $lines[1]);
var_dump($operations);

*/
/*
$number = trim(fgets($file));
$operations = trim(fgets($file));
$operations = explode(', ', $operations);
echo "$number";
echo "$operations";
*/


//input: 4, 2, 1.5, 6.5, 1, 3
$file = fopen("test_treasure.txt", "r");
$input = trim(fgets($file));
$coordinates = explode(' ', $input);



