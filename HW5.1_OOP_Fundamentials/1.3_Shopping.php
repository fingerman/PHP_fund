<?php
/**
 * Created by PhpStorm.
 * User: computer
 * Date: 17.03.2017
 * Time: 17:39
 */







class Validator
{
    private function __construct()
    {
        // Simulate static class by preventing instantiation
    }
    /**
     * @param float $num
     * @param string $valName
     * @throws Exception
     */
    public static function validatePositiveNumber(float $num, string $valName)
    {
        if ($num < 0)
            throw new Exception("{$valName} cannot be negative");
    }
    /**
     * @param string $str
     * @param string $valName
     * @throws Exception
     */
    public static function validateNonEmptyString(string $str, string $valName)
    {
        if (strlen($str) == 0)
            throw new Exception("{$valName} cannot be empty");
    }
}

class Person
{
    private $name;
    private $money;
    /**
     * @var Product[] $products
     */
    private $products = [];
    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setMoney($money);
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name)
    {
        Validator::validateNonEmptyString($name, "Name");
        $this->name = $name;
    }
    public function setMoney(float $money)
    {
        Validator::validatePositiveNumber($money, "Money");
        $this->money = $money;
    }
    public function buyProduct(Product $product): bool
    {
        if ($this->money < $product->getPrice()) {
            return false;
        }
        $this->money -= $product->getPrice();
        $this->products[] = $product;
        return true;
    }
    public function __toString(): string
    {
        $output = "{$this->name} - ";
        if (count($this->products) === 0) {
            return $output . "Nothing bought";
        }
        return $output . implode(",",
            array_map(
                function (Product $product) {
                    return $product->getName();
                },
                $this->products));
    }
}

class Product
{
    private $name;
    private $price;
    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setPrice($money);
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getPrice(): float
    {
        return $this->price;
    }
    public function setName(string $name)
    {
        Validator::validateNonEmptyString($name, "Name");
        $this->name = $name;
    }
    public function setPrice(float $price)
    {
        Validator::validatePositiveNumber($price, "Price");
        $this->price = $price;
    }
}

class Shop
{
    /**
     * @var Person[] $customers
     */
    private $customers = [];
    /**
     * @var Product[] $products
     */
    private $products = [];
    public function sellProduct(Product $product, Person $customer): bool
    {
        return $customer->buyProduct($product);
    }
    public function addCustomer(Person $customer)
    {
        $this->customers[$customer->getName()] = $customer;
    }
    public function addProduct(Product $product)
    {
        $this->products[$product->getName()] = $product;
    }
    public function getCustomer(string $name): Person
    {
        return $this->customers[$name];
    }
    public function getProduct(string $name): Product
    {
        return $this->products[$name];
    }
    /**
     * @return Person[]
     */
    public function getCustomers(): array
    {
        return $this->customers;
    }
}

class App
{
    private $shop;
    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->shop = new Shop();
    }
    public function start()
    {
        $this->processInput();
        $this->printOutput();
    }
    private function processInput()
    {
        $customers = array_filter(explode(";", $this->readLine()));
        $products = array_filter(explode(";", $this->readLine()));
        try {
            foreach ($customers as $customerData) {
                if (strstr($customerData, "=") === false) {
                    throw new \Exception("Name cannot be empty");
                }
                $customerData = explode("=", $customerData);
                $customer = new Person($customerData[0], floatval($customerData[1]));
                $this->shop->addCustomer($customer);
            }
            foreach ($products as $productData) {
                if (strstr($productData, "=") === false) {
                    throw new \Exception("Name cannot be empty");
                }
                $productData = explode("=", $productData);
                $product = new Product($productData[0], floatval($productData[1]));
                $this->shop->addProduct($product);
            }
            while (true) {
                $tradeDetails = explode(" ", $this->readLine());
                if ($tradeDetails[0] === "END") {
                    break;
                }
                $customer = $this->shop->getCustomer($tradeDetails[0]);
                $product = $this->shop->getProduct($tradeDetails[1]);
                if ($this->shop->sellProduct($product, $customer)) {
                    $this->writeLine("{$customer->getName()} bought {$product->getName()}");
                } else {
                    $this->writeLine("{$customer->getName()} can't afford {$product->getName()}");
                }
            }
        } catch (\Exception $e) {
            $this->writeLine($e->getMessage());
            exit();
        }
    }
    private function printOutput()
    {
        $customers = $this->shop->getCustomers();
        foreach ($customers as $customer) {
            $this->writeLine($customer);
        }
    }
    private function readLine(): string
    {
        return trim(fgets(STDIN));
    }
    /**
     * @param $content mixed
     * @return void
     */
    private function writeLine($content)
    {
        echo $content . PHP_EOL;
    }
}