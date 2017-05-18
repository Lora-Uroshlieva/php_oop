<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Customer
{
    public $id;
    public $firstName;
    public $lastName;
    public $sex;
    public $dateOfBirth;
    public $address;
    protected $balance;
    protected $login;
    protected $password;

    /**
     * Customer constructor.
     * @param $id
     * @param $firstName
     * @param $lastName
     * @param $sex
     * @param $dateOfBirth
     * @param $address
     * @param $balance
     * @param $login
     * @param $password
     */
    public function __construct($id, $firstName, $lastName,
       Sex $sex, DateTime $dateOfBirth, $address, $balance, $login, $password)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->sex = $sex;
        $this->dateOfBirth = $dateOfBirth;
        $this->address = $address;
        $this->balance = $balance;
        $this->login = $login;
        $this->password = $password;
    }

    public function getFullName()
    {
        return sprintf(
                '%s %s',
                $this->firstName,
                $this->lastName
        );
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return mixed
     */
    public function getBalance()
    {
        return $this->balance;
    }

    public function changeBalance($sum)
    {

        return $this->balance += $sum;
    }

    public function changeLastname($newName)
    {
        $this->lastName = $newName;
    }

    public function getAge()
    {
        $now = new DateTime();
        $age = $now->diff($this->dateOfBirth);
        echo "The age is: ".$age->format('%Y');
        return $age;

    }
}


class Sex
{
    const SEX_MAN = 'man';
    const SEX_WOMAN = 'woman';
    const SEX_UNDEFINED = 'undefined';

    static protected $allowedSexes = [
        self::SEX_MAN,
        self::SEX_WOMAN,
        self::SEX_UNDEFINED
    ];

    private $sex;

    /**
     * Sex constructor.
     * @param $sex
     */
    public function __construct($sex)
    {
        if (!in_array($sex, self::$allowedSexes)) {
            throw new InvalidArgumentException('This sex is not allowed');
        }
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @return array
     */
    public static function getAllowedSexes(): array
    {
        return self::$allowedSexes;
    }


}


$ivanov = new Customer(1, 'Ivan', 'Ivanov', new Sex('man'),
    new DateTime('1980-01-01'), 'Kiev', 3000, 'ivanov2017', 'jhjgfjsgfsgs');

var_dump($ivanov);
echo $ivanov->getAddress(), '<br>';
echo $ivanov->getFullName(), '<br>';
echo $ivanov->getBalance(), '<br>';
$ivanov->changeBalance(-500);
echo $ivanov->getBalance(), '<br>';
$ivanov->getAge();

