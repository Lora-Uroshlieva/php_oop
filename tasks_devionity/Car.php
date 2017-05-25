<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


include_once "User.php";

class Car
{
    public $brand;
    public $model;
    public $year;
    public $driver;
    private $price;

    public function __construct($brand, $model, $year,User2 $driver)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->driver = $driver;
        echo 'Car created.';
    }

    public function showBrand()
    {
        echo $this->brand;
    }

    public function showModel()
    {
        echo $this->model;
    }

    /**
     * @return mixed
     */
    public function getPrice($format=false)
    {
        $price = $format ? number_format($this->price) : $this->price;
        return $price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = round($price, 2);
    }
}

$bob = new User2('bob1', '1111', 'bob@test.ua', 2);
$john = new User2('john2017', '2222', 'john@test.ua');

$toyota = new Car('Toyota', 'Corolla', 2000, $bob);
$mazda = new Car('Mazda', '6', 2015, $john);
$ford = new Car('Ford', 'Taurus', 1995, $bob);

var_dump($toyota);
print_r($mazda);
print_r($ford);

$mazda->showBrand();
echo '<br>';
$ford->showModel();
echo '<br>';

$mazda->setPrice(1.2244445);
echo 'the price is: ', $mazda->getPrice();