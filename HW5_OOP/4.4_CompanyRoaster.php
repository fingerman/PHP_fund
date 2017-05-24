<?php
/**
 * class Employee: name, salary, position, department, email and age. The name, salary, position and department  mandatory,
 * the rest are optional.
 to do>
 takes N lines of employees from the console and
 calculates the department with the highest average salary and
 * prints for each employee in that department his name, salary, email and age
 * sorted by salary in descending order.
 * If an employee doesn’t have an email : in place of that field you should print “n/a” instead,
 * if he doesn’t have an age – print “-1” instead.
 * The salary should be printed to two decimal places after the seperator.


 */


class Employee
{

    private $name;
    private $salary;
    private $position;
    private $department;
    private $email;
    private $age;


    public function __construct(string $name,
                                float $salary,
                                string $position,
                                Department $department,
                                string $email = null,
                                int $age = null)

    {
        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->department = $department;
        $this->email = $email;
        $this->age = $age;
    }

    public function getSalary(): float
    {
        return $this->salary;
    }

    public function __toString(): string
    {
        $salary = number_format($this->salary, 2);
        $email = $this->email == null ? "n/a" : $this->email;
        $age = $this->age == null ? -1 : $this->age;

        return "{$this->name} {$salary} {$email} {$age}";
    }
}

class Company
{
    private $departments = [];
    public function addDepartment(Department $department)
    {
        $this->departments[$department->getName()] = $department;
    }
    public function hasDepartment(string $name): bool
    {
        return array_key_exists($name, $this->departments);
    }
    public function getDepartment(string $name): Department
    {
        if (!array_key_exists($name, $this->departments)) {
            throw new \Exception("Department not found!");
        }
        return $this->departments[$name];
    }
    public function getBestPaidDepartment(): Department
    {
        usort($this->departments, function(Department $departmentA, Department $departmentB) {
            return $departmentA->getAverageSalary() <=> $departmentB->getAverageSalary();
        });
        return $this->departments[count($this->departments) - 1];
    }
}

class Department
{

    private $employees = [];
    private $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function hireEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }
    public function getAverageSalary(): float
    {
        return array_sum(array_map(function (Employee $employee) {
            return $employee->getSalary();
        }, $this->employees)) / count($this->employees);
    }
    private function sortEmployeesBySalary(bool $desc = false)
    {
        usort($this->employees, function (Employee $employeeA, Employee $employeeB) {
            return $employeeA->getSalary() <=> $employeeB->getSalary();
        });
        if ($desc) {
            $this->employees = array_reverse($this->employees);
        }
    }
    public function __toString(): string
    {
        $this->sortEmployeesBySalary(true);
        $output = "";
        foreach ($this->employees as $employee) {
            $output .= $employee . PHP_EOL;
        }
        return $output;
    }
}

/// Test ///


$company = new Company();
$count = intval(trim(fgets(STDIN)));
for ($i = 0; $i < $count; $i++) {
    $input = explode(" ", trim(fgets(STDIN)));
    $name = $input[0];
    $salary = floatval($input[1]);
    $position = $input[2];
    $departmentName = $input[3];
    $email = null;
    $age = null;
    if (isset($input[4])) {
        if (is_numeric($input[4])) {
            $age = intval($input[4]);
        } else {
            $email = $input[4];
        }
    }
    if (isset($input[5])) {
        if (is_numeric($input[5])) {
            $age = intval($input[5]);
        }
    }
    if (!$company->hasDepartment($departmentName)) {
        $department = new Department($departmentName);
        $company->addDepartment($department);
    }
    $department = $company->getDepartment($departmentName);
    $employee = new Employee($name, $salary, $position, $department, $email, $age);
    $department->hireEmployee($employee);
}
$bestPaidDepartment = $company->getBestPaidDepartment();
echo "Highest Average Salary: {$bestPaidDepartment->getName()}" . PHP_EOL;
echo $bestPaidDepartment;