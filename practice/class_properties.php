<?php
error_reporting(E_ALL);
ini_set('error_reporting', 1);


class FullName
{
    protected $firstName;
    private $middleName;
    public $lastName;

    /**
     * FullName constructor.
     * @param $firstName
     * @param $middleName
     * @param $lastName
     */
    public function __construct($firstName, $middleName, $lastName)
    {
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
    }

    public function getFullName()
    {
        return sprintf(
            "Mister %s %s %s \n",
            $this->firstName,
            $this->middleName,
            $this->lastName
        );
    }
}


class Human
{
    public $name;
    public $haircolor = 'black';
    public $age;
    public $date;
    private $fullName;

    /**
     * Human constructor.
     * @param $fullName
     */
    public function __construct(FullName $fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return FullName
     */
    public function getFullName()
    {
        return $this->fullName->getFullName();
    }


}

$mikeName = new FullName('Mike', 'John', 'Davidson');
//$mikeName->firstName = 'Ivan'; - cannot change private property in that way. error!!!
$mikeName->lastName = 'Ivanov';
//var_dump($mikeName);


$mike = new Human($mikeName);
//$john = new Human(); // fatal error

$mike->name = 'Mike';
$mike->date = new \DateTime('1999-01-01');



//var_dump($mike);
echo $mike->getFullName();


