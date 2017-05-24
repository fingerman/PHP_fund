<?php


/*
 *
 * Input
The input will be read from an HTTP GET request. The data will be received from a textarea field with name 'data'. It will contain several strings, separated by ‘,’. Each valid string will be in the format:
“mine {mineName} {typeOfOre} {quantity}”.
Output
The output should consist of 3 <p></p> tags, each holding the type of ore and quantity mined. The format should be as follows: “*{typeOfOre}: {quantity}”.
The order should always be: Gold, Silver, Diamonds.
Constraints
•	The typeOfOre will be case insensitive string;
•	The quantity will always be 32-bit integer number;
•	Allowed working time: 0.2 seconds. Allowed memory: 16 MB.
Examples:
**************
Input
mine bobovDol gold 10, mine medenRudnik silver 22, mine chernoMore shrimps 24, gold 50
Output
<p>*Gold: 10</p>
<p>*Silver: 22</p>
<p>*Diamonds: 0</p>
************************
 Input
mine bobovdol gold 10, mine tomn diamonds 5, mine colas Gold 10, mine myMine silver 14, mine silver14 siLver 14
Output
<p>*Gold: 20</p>
<p>*Silver: 28</p>
<p>*Diamonds: 5</p>


 *
 *
 *
 */




$data = $_GET['data'];
$lines = explode(", ", $data);
$resources = [
    "Gold" => 0,
    "Silver" => 0,
    "Diamonds" => 0
];

foreach ($lines as $line) {
    //mine bobovDol gold 10
    $tokens = explode(" ", $line);
    if (count($tokens) != 4) {
        continue;
    }
    if ($tokens[0] != "mine") {
        continue;
    }

    $tokens[2] = ucfirst(strtolower($tokens[2]));
    if (!array_key_exists($tokens[2], $resources)) {
        continue;
    }

    if ($tokens[3] != intval($tokens[3])) {
        continue;
    }

    $resources[$tokens[2]] += $tokens[3];
}

foreach ($resources as $type => $quantity) {
    echo "<p>*$type: $quantity</p>";
}