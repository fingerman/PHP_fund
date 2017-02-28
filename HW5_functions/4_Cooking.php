<?php
$lines = file("./test.txt");
$number = $lines[0];
$operations = $lines[1];
$operations = explode(', ', $operations);

    function cook($num, $operation)
    {
        switch ($operation) {
            case 'chop':
                return $num / 2;

            case 'dice':
                return sqrt($num);

            case 'spice':
                return ++$num;

            case 'bake':
                return $num * 3;

            case 'fillet':
                return $num - ($num / 5);
        }
        return $num;
    }
        foreach ($operations as $operation){
            $number = cook($number, $operation);
            echo "$number\r\n";
        }



