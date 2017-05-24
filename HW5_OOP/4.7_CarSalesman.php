<?php


/*
 * Car class has a model, engine, weight and color - weight and color are optional
 * Engine has model, power, displacement and efficiency - displacements and efficiency are optional
 * ********
 * read a number N which will specify how many lines of engines you will receive
 *  on each of the next N lines you will receive information about an Engine in the
 *  following format “<Model> <Power> <Displacement> <Efficiency>”
 * next M lines information about a Car :  “<Model> <Engine> <Weight> <Color>”
 * engine in the format will be the model of an existing Engine.
 * - When creating the object for a Car, you should keep a reference to the real engine
 * - optional properties might be missing from the formats.
 * ********************++
 * print each car (in the order you received them) and its information in the format defined bellow,
 * if any of the optional fields has not been given print “n/a” in its place instead:
 * Example Input:
2
V8-101 220 50
V4-33 140 28 B
3
FordFocus V4-33 1300 Silver
FordMustang V8-101
VolkswagenGolf V4-33 Orange
 * Example Output:
FordFocus:
  V4-33:
    Power: 140
    Displacement: 28
    Efficiency: B
  Weight: 1300
  Color: Silver
FordMustang:
  V8-101:
    Power: 220
    Displacement: 50
    Efficiency: n/a
  Weight: n/a
  Color: n/a
VolkswagenGolf:
  V4-33:
    Power: 140
    Displacement: 28
    Efficiency: B
  Weight: n/a
  Color: Orange
 *
 */

class Engine
{
    private $model;
    private $power;
    private $displacement;
    private $efficiency;

    public function __construct(string $model, int $power, int $displacement = null, string $efficiency = null)
    {
        $this->model = $model;
        $this->power = $power;
        $this->displacement = $displacement;
        $this->efficiency = $efficiency;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function __toString(): string
    {
        $output = "  {$this->getModel()}:" . PHP_EOL;
        $output .= "    Power: {$this->power}" . PHP_EOL;

        $displacement = $this->displacement == null ? "n/a" : $this->displacement;
        $output .= "    Displacement: {$displacement}" . PHP_EOL;

        $efficiency = $this->efficiency == null ? "n/a" : $this->efficiency;
        $output .= "    Efficiency: {$efficiency}" . PHP_EOL;

        return $output;
    }
}


class Car
{
    private $model;
    private $engine;
    private $weight;
    private $color;

    public function __construct(string $model, Engine $engine, int $weight = null, string $color = null)
    {
        $this->model = $model;
        $this->engine = $engine;
        $this->weight = $weight;
        $this->color = $color;
    }

    public function __toString(): string
    {
        $output = "{$this->model}:" . PHP_EOL;
        $output .= $this->engine;

        $weight = $this->weight == null ? "n/a" : $this->weight;
        $output .= "  Weight: {$weight}" . PHP_EOL;

        $color = $this->color == null ? "n/a" : $this->color;
        $output .= "  Color: {$color}";

        return $output;
    }
}







class App
{
    /**
     * @var Engine[]
     */
    private $engines = [];

    /**
     * @var Car[]
     */
    private $cars = [];

    public function start()
    {
        $this->processInput();
    }

    private function processInput()
    {
        $enginesCount = intval($this->readLine());
        for ($i = 0; $i < $enginesCount; $i++) {
            $engineData = explode(" ", $this->readLine());
            $engineModel = $engineData[0];
            $enginePower = intval($engineData[1]);
            $engineDisplacement = null;
            $engineEfficiency = null;
            if (count($engineData) > 2) {
                if (is_numeric($engineData[2])) {
                    $engineDisplacement = intval($engineData[2]);
                } else {
                    $engineEfficiency = $engineData[2];
                }
            }

            if (count($engineData) > 3) {
                $engineEfficiency = $engineData[3];
            }

            $selectedEngine = new Engine($engineModel, $enginePower, $engineDisplacement, $engineEfficiency);
            $this->addEngine($selectedEngine);
        }

        $carsCount = intval($this->readLine());
        for ($i = 0; $i < $carsCount; $i++) {
            $carData = explode(" ", $this->readLine());
            $carModel = $carData[0];
            $carEngine = $carData[1];
            $carWeight = null;
            $carColor = null;
            if (count($carData) > 2) {
                if (is_numeric($carData[2])) {
                    $carWeight = intval($carData[2]);
                } else {
                    $carColor = $carData[2];
                }
            }

            if (count($carData) > 3) {
                $carColor = $carData[3];
            }

            $selectedEngine = $this->getEngineByName($carEngine);
            $car = new Car($carModel, $selectedEngine, $carWeight, $carColor);
            $this->addCar($car);
        }

        $this->printCars();
    }

    private function addEngine(Engine $engine)
    {
        $this->engines[$engine->getModel()] = $engine;
    }

    private function addCar(Car $car)
    {
        $this->cars[] = $car;
    }

    private function getEngineByName(string $name): Engine
    {
        return $this->engines[$name];
    }

    private function printCars()
    {
        foreach ($this->cars as $car) {
            $this->writeLine($car);
        }
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