<?php

abstract class AA
{
    public $x = 1;
    protected $y = 2;

    abstract public  function sayHello();

    public function getSum()
    {
        return $this->x + $this->y;
    }
}

class BB extends AA
{
    public function sayHello()
    {
        echo "hello world!";
    }
}

$extended = new BB();
echo $extended->getSum(); //цей метод імплементований лише в парент-класі, але ми юзаємо його з екземпляра дочірнього класа.
$extended->sayHello(); // ми імплементували цей абстрактний метод з парента - клас АА




//echo $extended->x;
//echo $extended->y; //y - не можна визвати, бо воно стало прайвет при наслідуванні
