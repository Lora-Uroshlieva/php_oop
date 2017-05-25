<?php
class Human
{
    public $name;
    public $sex;
    public $dateOfBirth;
    public $hairColor;
}

$mike = new Human();
var_dump($mike);
var_dump($mike instanceof Human);

$mike->name = 'Ivan';
echo $mike->name;