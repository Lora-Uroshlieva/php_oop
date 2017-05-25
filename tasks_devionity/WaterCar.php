<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once "Car.php";

class WaterCar extends Car
{
    private $waterSpeed;

    /**
     * WaterCar constructor.
     * @param $waterSpeed
     * @param $brand
     * @param $model
     * @param $year
     * @param User2 $driver
     */
    public function __construct($waterSpeed, $brand,  $model, $year, User2 $driver)
    {
        $this->waterSpeed = $waterSpeed;
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->driver = $driver;
    }


}

