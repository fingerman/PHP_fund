<?php
/**
 * read from the console N
 * lines of personal information and then prints all people whose age is more
 * than 30 years, sorted in alphabetical order.
 *
Input:
3
Pesho 12
Stamat 31
Ivan 48

 */



$num = intval(trim(fgets(STDIN)));

class Person
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function getAge(): int
    {
        return $this->age;
    }


   public function __toString()
   {
       return $this->name . " - " . $this->age;
   }

}

$persons = [];
for ($i = 0; $i < $num; $i++) {
    $input = explode(" ", trim(fgets(STDIN)));
    $name = $input[0];
    $age = intval($input[1]);
    $persons[] = new Person($name, $age);
}
$filteredPersons = array_filter($persons, function (Person $person) {
    return $person->getAge() > 30;
});
usort($filteredPersons, function (Person $personA, Person $personB) {
    return $personA->getName() <=> $personB->getName();
});
foreach ($filteredPersons as $person) {
    echo $person . PHP_EOL;
}
