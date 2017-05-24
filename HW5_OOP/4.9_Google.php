<?php
/**
 * From the console you will receive an unkown amount of lines until the command “End” is read, on each of those lines there will be information about a person in one of the following formats:
•	“<Name> company <companyName> <department> <salary>”
•	“<Name> pokemon <pokemonName> <pokemonType>”
•	“<Name> parents <parentName> <parentBirthday>”
•	“<Name> children <childName> <childBirthday>”
•	“<Name> car <carModel> <carSpeed>”
You should structure all information about a person in a class with nested subclasses. People’s names are unique - there won’t be 2 people with the same name, a person can also have only 1 company and car, but can have multiple parents, chidlren and pokemon. After the command “End” is received on the next line you will receive a single name, you should print all information about that person. Note that information can change during the input, for instance if we receive multiple lines which specify a person’s company, only the last one should be the one remembered. The salary must be formated to two decimal places after the seperator.
Examples
Input
PeshoPeshev company PeshInc Management 1000.00
TonchoTonchev car Trabant 30
PeshoPeshev pokemon Pikachu Electricity
PeshoPeshev parents PoshoPeshev 22/02/1920
TonchoTonchev pokemon Electrode Electricity
End
TonchoTonchev


JelioJelev pokemon Onyx Rock
JelioJelev parents JeleJelev 13/03/1933
GoshoGoshev pokemon Moltres Fire
JelioJelev company JeleInc Jelior 777.77
JelioJelev children PudingJelev 01/01/2001
StamatStamatov pokemon Blastoise Water
JelioJelev car AudiA4 180
JelioJelev pokemon Charizard Fire
End
JelioJelev

 *
 *
 *
 *



 */



class Car
{
    private $model;
    private $speed;
    public function __construct(string $model, int $speed)
    {
        $this->model = $model;
        $this->speed = $speed;
    }
    public function __toString(): string
    {
        return "{$this->model} {$this->speed}";
    }
}

class Company
{
    private $name;
    private $department;
    private $salary;
    public function __construct(string $name, string $department, float $salary)
    {
        $this->name = $name;
        $this->department = $department;
        $this->salary = $salary;
    }
    public function __toString(): string
    {
        $salary = number_format($this->salary, 2);
        return "{$this->name} {$this->department} {$salary}";
    }
}

class Person
{
    private $name;
    /**
     * @var Company
     */
    private $company = null;
    /**
     * @var Car
     */
    private $car = null;
    /**
     * @var Pokemon[]
     */
    private $pokemons = [];
    /**
     * @var Relative[]
     */
    private $parents = [];
    /**
     * @var Relative[]
     */
    private $children = [];
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setCompany(Company $company)
    {
        $this->company = $company;
    }
    public function setCar(Car $car)
    {
        $this->car = $car;
    }
    public function addPokemon(Pokemon $pokemon)
    {
        $this->pokemons[] = $pokemon;
    }
    public function addParent(Relative $parent)
    {
        $this->parents[] = $parent;
    }
    public function addChild(Relative $child)
    {
        $this->children[] = $child;
    }
    public function __toString(): string
    {
        $output = "{$this->name}" . PHP_EOL;
        $output .= "Company:" . PHP_EOL;
        $output .= $this->company != null ? $this->company . PHP_EOL : "";
        $output .= "Car:" . PHP_EOL;
        $output .= $this->car != null ? $this->car . PHP_EOL : "";
        $output .= "Pokemon:" . PHP_EOL;
        foreach ($this->pokemons as $pokemon) {
            $output .= $pokemon . PHP_EOL;
        }
        $output .= "Parents:" . PHP_EOL;
        foreach ($this->parents as $parent) {
            $output .= $parent . PHP_EOL;
        }
        $output .= "Children:" . PHP_EOL;
        foreach ($this->children as $child) {
            $output .= $child . PHP_EOL;
        }
        return $output;
    }
}

class Pokemon
{
    private $name;
    private $type;
    public function __construct(string $name, string $type)
    {
        $this->name = $name;
        $this->type = $type;
    }
    public function __toString(): string
    {
        return "{$this->name} {$this->type}";
    }
}

class Relative
{
    private $name;
    private $birthDate;
    public function __construct(string $name, string $birthDate)
    {
        $this->name = $name;
        $this->birthDate = $birthDate;
    }
    public function __toString(): string
    {
        return "{$this->name} {$this->birthDate}";
    }
}

class App
{
    const END_OF_INPUT = "End";
    /**
     * @var Person[]
     */
    private $persons = [];
    public function start()
    {
        $this->processInput();
    }
    private function processInput()
    {
        while (true) {
            $line = $this->readLine();
            if ($line === self::END_OF_INPUT) {
                break;
            }
            $tokens = explode(" ", $line);
            $personName = array_shift($tokens);
            $person = null;
            if ($this->personExists($personName)) {
                $person = $this->getPersonByName($personName);
            } else {
                $person = new Person($personName);
                $this->addPerson($person);
            }
            $this->addPersonDetail($person, $tokens);
        }
        $personToLookFor = $this->readLine();
        echo $this->getPersonByName($personToLookFor);
    }
    private function addPersonDetail(Person $person, array $data)
    {
        $type = array_shift($data);
        switch ($type) {
            case "company":
                $person->setCompany(new Company($data[0], $data[1], floatval($data[2])));
                break;
            case "car":
                $person->setCar(new Car($data[0], intval($data[1])));
                break;
            case "pokemon":
                $person->addPokemon(new Pokemon(...$data));
                break;
            case "parents":
                $person->addParent(new Relative(...$data));
                break;
            case "children":
                $person->addChild(new Relative(...$data));
                break;
            default:
                throw new \Exception("Invalid Command!");
                break;
        }
    }
    private function addPerson(Person $person)
    {
        $this->persons[$person->getName()] = $person;
    }
    private function personExists(string $name): bool
    {
        return array_key_exists($name, $this->persons);
    }
    private function getPersonByName(string $name): Person
    {
        return $this->persons[$name];
    }
    private function readLine(): string
    {
        return trim(fgets(STDIN));
    }
}


spl_autoload_register(function ($className) {
    require_once "{$className}.php";
});
$app = new App();
$app->start();