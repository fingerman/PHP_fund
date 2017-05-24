<?php
/**
 * Created by PhpStorm.
 * User: computer
Write a class DecimalNumber that has a method that prints all its digits in reversed order.
 */

class DecimalNumber
{
    private $number;
    public function __construct(string $number)
    {
        $this->number = $number;
    }
    public function getNumberReversed(): string
    {
        return strrev($this->number);
    }
}

$decimal = new DecimalNumber(trim(fgets(STDIN)));
echo $decimal->getNumberReversed();

