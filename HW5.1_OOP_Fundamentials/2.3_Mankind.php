<?php
/*
 *
 *
 * Your task is to model an application. It is very simple. The mandatory models of our application are 3:  Human, Worker and Student.
The parent class – Human should have first name and last name. Every student has a faculty number. Every worker has a week salary and work hours per day. It should be able to calculate the money he earns by hour. You can see the constraints below.
Input
On the first input line you will be given info about a single student - first name, last name and faculty number.
On the second input line you will be given info about a single worker - first name, last name, salary and working hours.
Output
You should first print the info about the student following a single blank line and the info about the worker in the given formats:
•	Print the student info in the following format:
	First Name: {student's first name}
	Last Name: {student's last name}
	Faculty number: {student's faculty number}

•	Print the worker info in the following format:
	First Name: {worker's first name}
Last Name: {worker's second name}
Week Salary: {worker's salary}
Hours per day: {worker's working hours}
Salary per hour: {worker's salary per hour}
Print exactly two digits after every double value's decimal separator (e.g. 10.00)

 *
 *
 *
 */





abstract class Human
{
    private $firstName;
    private $lastName;

    public function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }

    protected function setFirstName(string $firstName)
    {
        if ($firstName[0] !== strtoupper($firstName[0])) {
            throw new \Exception("Expected upper case letter!Argument: firstName");
        }

        if (!preg_match("/.{4,}/", $firstName)) {
            throw new \Exception("Expected length at least 4 symbols!Argument: firstName");
        }

        $this->firstName = $firstName;
    }

    protected function setLastName(string $lastName)
    {
        if ($lastName[0] !== strtoupper($lastName[0])) {
            throw new \Exception("Expected upper case letter!Argument: lastName");
        }

        if (!preg_match("/.{3,}/", $lastName)) {
            throw new \Exception("Expected length at least 3 symbols!Argument: lastName");
        }

        $this->lastName = $lastName;
    }

    public function __toString(): string
    {
        $output = "First Name: {$this->firstName}" . PHP_EOL;
        $output .= "Last Name: {$this->lastName}" . PHP_EOL;

        return $output;
    }
}



class Student extends Human
{
    private $facultyNumber;

    public function __construct(string $firstName, string $lastName, string $facultyNumber)
    {
        parent::__construct($firstName, $lastName);

        $this->setFacultyNumber($facultyNumber);
    }

    public function setFacultyNumber($facultyNumber)
    {
        if (strlen($facultyNumber) < 5 || strlen($facultyNumber) > 10) {
            throw new \Exception("Invalid faculty number!");
        }

        $this->facultyNumber = $facultyNumber;
    }

    public function __toString(): string
    {
        $output = parent::__toString();
        $output .= "Faculty number: {$this->facultyNumber}" . PHP_EOL;

        return $output . PHP_EOL;
    }
}

class Worker extends Human
{
    private $salary;
    private $workHoursPerDay;
    public function __construct(string $firstName, string $lastName, float $salary, float $workHoursPerDay)
    {
        parent::__construct($firstName, $lastName);
        $this->setSalary($salary);
        $this->setWorkHoursPerDay($workHoursPerDay);
    }
    protected function setLastName(string $lastName)
    {
        if (strlen($lastName) < 3) {
            throw new \Exception("Expected length more than 3 symbols!Argument: lastName");
        }
        parent::setLastName($lastName);
    }
    protected function setSalary(float $salary)
    {
        if ($salary <= 10) {
            throw new \Exception("Expected value mismatch!Argument: weekSalary");
        }
        $this->salary = $salary;
    }
    protected function setWorkHoursPerDay(float $workHoursPerDay)
    {
        if ($workHoursPerDay < 1 || $workHoursPerDay > 12) {
            throw new \Exception("Expected value mismatch!Argument: workHoursPerDay");
        }
        $this->workHoursPerDay = $workHoursPerDay;
    }
    public function __toString(): string
    {
        $output = parent::__toString();
        $output .= "Week Salary: " . number_format($this->salary, 2, '.', ''). PHP_EOL;
        $output .= "Hours per day: " . number_format($this->workHoursPerDay, 2, '.', ''). PHP_EOL;
        $output .= "Salary per hour: " . number_format($this->calculateSalaryPerHour(), 2, '.', ''). PHP_EOL;
        return $output;
    }
    private function calculateSalaryPerHour(): float
    {
        return $this->salary / 7 / $this->workHoursPerDay;
    }
}


declare(strict_types = 1);

spl_autoload_register(function ($className) {
    require_once "{$className}.php";
});
function readLine(): string
{
    return trim(fgets(STDIN));
}
$studentData = explode(" ", readLine());
$workerData = explode(" ", readLine());
/**
 * @var $humans Citizen[]
 */
$humans = [];
try {
    $humans[] = new Student(...$studentData);
    $humans[] = new Worker($workerData[0], $workerData[1], floatval($workerData[2]), floatval($workerData[3]));
    foreach ($humans as $human) {
        echo $human;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
