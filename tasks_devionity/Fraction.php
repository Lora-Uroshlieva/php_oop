<?php


class Fraction
{
    const DELIMITER = '/';
    protected $numerator;
    protected $denominator;
    protected $fraction;

    /**
     * Fraction constructor.
     * @param $numerator
     * @param $denominator
     */
    public function __construct($numerator, $denominator)
    {
        $this->numerator = $numerator;
        $this->denominator = $denominator;
        $this->fraction = $numerator.self::DELIMITER.$denominator;
    }

    public function reduceFraction(int $number)
    {
        if ($this->numerator%$number || $this->denominator%$number) {
            echo "Can not reduce the fraction to this number (not divided without the rest). <br>";
            return false;
        } else {
            $this->fraction = ($this->numerator/$number).self::DELIMITER.($this->denominator/$number);
        }
        return $this->fraction;
    }

    public function convertToDecimal()
    {
        $this->fraction = $this->numerator/$this->denominator;
        return $this->numerator/$this->denominator;
    }

    public static function add($f1, $f2)
    {
        return $f1 + $f2;
    }
}

$fr = new Fraction(15, 45);
var_dump($fr);
$fr->reduceFraction(5);
var_dump($fr);
$fr->convertToDecimal();
var_dump($fr);

echo Fraction::add(0.5, 0.3);
//Создать класс Fraction, который моделирует простую дробь
//с числителем и знаменателем. Определить методы конструктор,
//кувгсешщт и представления дроби в десятичном виде.
//Определить статические методы для арифметических операций с двумя дробями.