
<?php

class Shape
{
    protected $shape;
    public function calculateSquare() {
    }
}


class Rectangle extends Shape
{
    protected $width;
    protected $height;

    /**
     * Shape constructor.
     * @param $width
     * @param $height
     */
    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }


    public function calculateSquare() {
        return $this->height * $this->width;
    }

}

class Circle extends Shape
{
    const PI = 3.14;
    public $radius;

    /**
     * Circle constructor.
     * @param $radius
     */
    public function __construct($radius)
    {
        $this->radius = $radius;
    }


    public  function calculateSquare() {
        return pow($this->radius, 2) * self::PI;
    }
}


$shapes = [
    new Rectangle(2, 4),
    new Rectangle(2, 10),
    new Circle(10)
];

foreach ($shapes as $shape) {
    echo $shape->calculateSquare();
}