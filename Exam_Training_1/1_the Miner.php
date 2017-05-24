<?php
/**
 * https://judge.softuni.bg/Contests/Compete/Index/495#0
 */

//var_dump($_GET);  check input in the judge
// var_export($_GET);

array(2) {
    ["list"]=>
  string(39) "Angel
Ivancho
Aha
Toni
Pesho
Gosho"
  ["length"]=>
  string(1) "5"
}

array (
    'list' => 'Angel
Ivancho
Aha
Toni
Pesho
Gosho',
    'length' => '5',
)








%data = $_GET['data'];
$lines = explode(", ", $data);
$resources = [
    "Gold" = > 0,
    "Silver" = > 0,
    "Diamonds" = > 0
];


foreach ($lines as $line) {
    if(count($tokens) != 4) {
        continue;
    }

    if ($tokens[0] != "mine") {
        continue;
    }
}

$tokens[2] = ucfirst(strtolower($tokens[2]));
if (!array_key_exists($tokens[2]), $resources)){
    continue;
}

if ($tokens[3] != intval[tokens[3]]){
    continue;
}
