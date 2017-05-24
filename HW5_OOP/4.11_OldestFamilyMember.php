<?php
/**
Create class Person with fields name and age. Create a class Family. The class should have list of people,
 * method for adding members (void addMember(Person member)) and a method returning the oldest family member
 * (Person getOldestMember()). Write a program that reads name and age for N people and adds them to the family.
 * Then print the name and age of the oldest member. * Created by PhpStorm.
 *
 * Input
3
Pesho 3
Gosho 4
Annie 5

  Output
Annie 5

 */

class Family
{
    /**
     * @var Person[]
     */
    private $members = [];

    /**
     * @var Person
     */
    private $oldestMember = null;

    public function addMember(Person $member)
    {
        $this->members[] = $member;
        if ($this->oldestMember == null ||
            $member->getAge() > $this->oldestMember->getAge()) {
            $this->oldestMember = $member;
        }
    }

    public function getOldestMember(): Person
    {
        return $this->oldestMember;
    }
}

class Person
{
    private $name;
    private $age;
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    public function getAge(): int
    {
        return $this->age;
    }
    public function __toString()
    {
        return "{$this->name} {$this->age}";
    }
}

$family = new Family();
$numOfLines = intval(trim(fgets(STDIN)));
for ($i = 0; $i < $numOfLines; $i++) {
    $memberDetails = explode(" ", trim(fgets(STDIN)));
    $member = new Person($memberDetails[0], intval($memberDetails[1]));
    $family->addMember($member);
}
echo $family->getOldestMember();




