<?php
class Human
{
    private $name;
    private $dateOfBirth;

    /**
     * Human constructor.
     * @param $name
     * @param $dateOfBirth
     */
    public function __construct($name, $dateOfBirth)
    {
        $this->name = $name;
        $this->dateOfBirth = $dateOfBirth;
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


$mike = new Human('Mike', new \DateTime());
