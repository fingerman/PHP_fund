<?php
/**
 * Created by PhpStorm.
 * User: computer
 * Date: 17.03.2017
 * Time: 15:59
 */

$name = trim(fgets(STDIN));
$person = new Person($name);
$fields = count(get_object_vars($person));
$methods = count(get_class_methods($person));
if ($fields != 1 || $methods != 2) {
    throw new Exception("Too many fields or methods");
}
echo $person->sayHello();


class Person
{
    public $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function sayHello():string
    {
        return $this->name . ' says "Hello"!';
    }
}