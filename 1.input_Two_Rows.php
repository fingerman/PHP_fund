<?php
/** Input two lines, no comma separation */
/*
Pesho
20
 */


$lines = file("./test_names.txt");
$name = $lines[0];
$age = $lines[1];


echo "$name" . "<br/>";
echo "$age" . "<br/>";

