<?php
class Human {
    public $age;
    public $haircolor;
    public $name;
    public $date;
}

class Animal {
    //properties and methods
}


$a = new DateTime();

$mike = new Human();
$john = new Human;

$cat = new Animal();
$dog = new Animal;

//var_dump($mike);
//var_dump($dog);
//
//var_dump(new Animal());
//
//var_dump($dog instanceof Human);

$mike->name = 'Mike';
$mike->haircolor = 'black';
$mike->date = new DateTime();
