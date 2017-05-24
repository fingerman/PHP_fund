<?php

/*
 *
 *Read a list of real numbers with fgets(STDIN) and print them in ascending order along with their number of occurrences.
 * Input:
 * 8 2.5 2.5
 * 8 2.5
 *
 */
$numbers = explode(" ", trim(fgets(STDIN)));
$result = [];
foreach ($numbers as $number) {
    if (!array_key_exists($number, $result)) {
        $result[$number] = 0;
    }
    $result[$number]++;
}
ksort($result);
foreach ($result as $key => $val) {
    echo "{$key} -> {$val} times\n";
}