<?php


class FullName
{
    private $firstName;
    private $middleName;
    private $lastName;

    public function __construct($firstName, $middleName, $lastName)
    {
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
    }

    public function getFullName()
    {
        return sprintf(
            'Mr %s %s %s',
            $this->firstName,
            $this->middleName,
            $this->lastName
        );
    }
}

class Human
{
    /**
     * @var FullName
     */
    public $fullName;

    /**
     * Human constructor.
     * @param FullName $fullName
     */
    public function __construct(FullName $fullName)
    {
        $this->fullName = $fullName;
    }

    public function getFullName()
    {
        return $this->fullName->getFullName();
    }

}

$mikeName = new FullName('John', 'Mike', 'Bush');

$mike = new Human($mikeName);
echo $mike->fullName->getFullName();
var_dump($mike);