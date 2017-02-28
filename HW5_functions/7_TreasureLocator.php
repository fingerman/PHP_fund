<?php

    $file = fopen("test_treasure.txt", "r");
    $input = trim(fgets($file));
    $coordinates = explode(' ', $input);


    //$input = trim(fgets(STDIN));
    //$coordinates = explode(', ', $input);

    function locator($x, $y) {

        $tuvaluX1 = 1;
        $tuvaluX2 = 3;

        $tuvaluY1 = 1;
        $tuvaluY2 = 2;

        $tongaX1 = 0;
        $tongaX2 = 2;

        $tongaY1 = 6;
        $tongaY2 = 8;

        $samoaX1 = 5;
        $samoaX2 = 7;

        $samoaY1 = 3;
        $samoaY2 = 6;

        $cookX1 = 4;
        $cookX2 = 9;

        $cookY1 = 7;
        $cookY2 = 8;

        $tokelauX1 = 8;
        $tokelauX2 = 9;

        $tokelauY1 = 0;
        $tokelauY2 = 1;


        if ($x >= $tuvaluX1 && $x <= $tuvaluX2 && $y > $tuvaluY1 && $y < $tuvaluY2){
            return 'Tuvalu';
        }


        elseif ($x >= $tongaX1 && $x <= $tongaX2 && $y > $tongaY1 && $y < $tongaY2){
            return 'Tonga';
        }


        elseif ($x >= $samoaX1 && $x <= $samoaX2 && $y > $samoaY1 && $y < $samoaY2){
            return 'Tonga';
        }


        elseif ($x >= $cookX1 && $x <= $cookX2 && $y > $cookY1 && $y < $cookY2){
            return 'Tonga';
        }


        elseif ($x >= $tokelauX1 && $x <= $tokelauX2 && $y > $tokelauY1 && $y < $tokelauY2){
            return 'Tonga';
        }
        return 'On the bottom of the ocean';
    }

        for ($i=0; $i <count($coordinates); $i+=2) {
            $coordinates1 = $i++;
            //$coordinates2 = $i + 1;
            echo locator($coordinates1, $coordinates1) . "<br/>";
        }
