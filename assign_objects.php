<?php
class Human
{
    private $name;

    /**
     * Human constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function changeName($name) {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        echo $this->name;
        return $this->name;
    }



}

class Registrator
{
    public static function changeHumanNameTo(Human $human, $newName)
    {
        $human->changeName($newName);
    }
}

$mike = new Human('Mike');
$mike->getName();

Registrator::changeHumanNameTo($mike, 'John');
$mike->getName();