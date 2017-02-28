<?php
$teams = ['FC Barcelona', 'Milan', 'Manchester United', 'Real Madrid', 'Loko Plovdiv'];
for ($i = 0; $i < count($teams); $i++) {
    echo $teams[$i];
}

echo "<br/>";
$names = array('Jack', 'Melony', 'Helen', 'David');
array_splice($names, 2, 0, 'Don');
for ($i = 0; $i < count($teams); $i++) {
    echo $names[$i];
}

$arr = [20, 30, 40];
$array_num = count($array);
echo $arr[0] + $arr[$array_num - 1];

echo "<br/>";

$rows = 5;
$cols = 4;
$count = 1;
$matrix = [];
for ($r = 0; $r < $rows; $r++) {
    $matrix[$r] = [];
    for ($c = 0; $c < $cols; $c++) {
        $matrix[$r][$c] = $count++;
    }
}
print_r($matrix);


