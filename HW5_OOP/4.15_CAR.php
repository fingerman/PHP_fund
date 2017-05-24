<?php
/**
Create a class Car. Every car has a speed (km/h), fuel (liters) and fuel economy (L/100km) (given in the same order on the first line). They should be stored in the class. Your task is to create a program which executes one of the commands:
•	Travel <distance> – makes the car travel the specified <distance>
If you are given a distance which you don't have enough fuel to travel, just go as far as you can.
•	Refuel <liters> – refuels the car with the specified <fuel>
•	Distance – gets the total travel distance
•	Time – get the total travel time
•	Fuel – gets the remaining fuel
•	END – stops the program
Output
Print the total distance traveled, total travel time and fuel left at the end of the trip as in the Example below.
Note
Round values up to one decimal digit after the decimal point, applies for kilometers and liters.
Show only minutes, discarding the seconds. For Example 2 minutes 40 seconds and 2 minutes 20 seconds all become 2 minutes.

 *
 * Input
100 20 20
Travel 100
Distance
Time
Fuel
END

 *
 * Total Distance: 100.0 kilometers
Total Time: 1 hours and 0 minutes
Fuel left: 0.0 liters

 *
 */


class Car
{
    private $speed;
    private $fuel;
    private $fuelEconomy;
    private $distanceTraveled = 0.;
    private $timeTraveled = 0.;
    private $minutesPerKm = 0.;
    private $fuelPerKm = 0.;
    public function __construct(int $speed, float $fuel, float $fuelEconomy)
    {
        $this->speed = $speed;
        $this->fuel = $fuel;
        $this->fuelEconomy = $fuelEconomy;
        $this->initialize();
    }
    public function getFuel(): float
    {
        return $this->fuel;
    }
    public function getDistance(): float
    {
        return $this->distanceTraveled;
    }
    public function getTimeTraveled(): array
    {
        return [
            "hours" => floor($this->timeTraveled / 60),
            "minutes" => floor($this->timeTraveled % 60)
        ];
    }
    public function travel(float $distance)
    {
        $requiredFuel = $this->fuelPerKm * $distance;
        if ($requiredFuel <= $this->fuel) {
            $this->fuel -= $requiredFuel;
            $this->distanceTraveled += $distance;
            $this->timeTraveled += $distance * $this->minutesPerKm;
        } else {
            $possibleDistance = $this->fuel / $this->fuelPerKm;
            $this->distanceTraveled += $possibleDistance;
            $this->fuel = 0;
            $this->timeTraveled += $possibleDistance* $this->minutesPerKm;
        }
    }
    public function reFuel(float $fuel)
    {
        $this->fuel += $fuel;
    }
    private function initialize()
    {
        $this->minutesPerKm = 60 / $this->speed;
        $this->fuelPerKm = $this->fuelEconomy / 100;
    }
}

class App
{
    const END_OF_INPUT = "END";
    const DELIMITER = " ";
    /**
     * @var Car
     */
    private $car;
    public function start()
    {
        $this->processInput();
    }
    private function processInput()
    {
        $carTokens = explode(self::DELIMITER, $this->readLine());
        $this->car = new Car($carTokens[0], floatval($carTokens[1]), floatval($carTokens[2]));
        while (true) {
            $commandTokens = explode(self::DELIMITER, $this->readLine());
            if ($commandTokens[0] === self::END_OF_INPUT) {
                break;
            }
            $command = array_shift($commandTokens);
            switch ($command) {
                case "Travel":
                    $this->car->travel(floatval($commandTokens[0]));
                    break;
                case "Refuel":
                    $this->car->reFuel(floatval($commandTokens[0]));
                    break;
                case "Distance":
                    $this->printDistance();
                    break;
                case "Time":
                    $this->printTime();
                    break;
                case "Fuel":
                    $this->printFuel();
                    break;
                default:
                    throw new \Exception("Invalid operation supplied!");
            }
        }
    }
    private function printDistance()
    {
        $distance = $this->formatFloat($this->car->getDistance());
        $this->writeLine("Total Distance: {$distance}");
    }
    private function printTime()
    {
        $time = $this->car->getTimeTraveled();
        $this->writeLine("Total Time: {$time['hours']} hours and {$time['minutes']} minutes");
    }
    private function printFuel()
    {
        $fuel = $this->formatFloat($this->car->getFuel());
        $this->writeLine("Fuel left: {$fuel} liters");
    }
    private function formatFloat(float $float): string
    {
        return number_format(round($float, 1), 1);
    }
    private function readLine(): string
    {
        return trim(fgets(STDIN));
    }
    /**
     * @param $content mixed
     */
    private function writeLine($content)
    {
        echo $content . PHP_EOL;
    }
}

spl_autoload_register(function ($className) {
    require_once "{$className}.php";
});
$app = new App();
$app->start();