<?php
class Human
{
 //
}

class Animal
{
    //
}

$mike = new Human();
$john = new Human;

var_dump($mike==$john); // 1
var_dump($mike===$john); //0

$cat = new Animal();
$dog = new Animal();

var_dump($mike);
var_dump($cat);
var_dump(new Animal());

var_dump($dog instanceof Human);