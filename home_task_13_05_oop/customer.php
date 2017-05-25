<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Customer
{
    protected $id;
    protected $firstName;
    protected $lastName;
    protected $sex;
    protected $dateOfBirth;
    protected $address;
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
                'Mr %s %s',
                $this->firstName,
                $this->lastName
        );
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
        return "The age is: ".$age->format('%Y');

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
    public static function getAllowedSexes()
    {
        return self::$allowedSexes;
    }


}


//$ivanov = new Customer(1, 'Ivan', 'Ivanov', new Sex('man'),
//    new DateTime('1980-01-01'), 'Kiev', 3000, 'ivanov2017', 'jhjgfjsgfsgs');


//testing:
//var_dump($ivanov);
//echo $ivanov->getAddress(), '<br>';
//echo $ivanov->getFullName(), '<br>';
//echo $ivanov->getBalance(), '<br>';
//$ivanov->changeBalance(-500);
//echo $ivanov->getBalance(), '<br>';
//echo $ivanov->getAge();


//using database:
$pdo = new \PDO('mysql:host=localhost;dbname=customers', 'root', '111');

$pdo->query("INSERT INTO customer 
    (firstName, lastName, sex, dateOfBirth, address, balance, login, password) 
    VALUES 
    ('Petrov', 'Petr', 'man', '1990-01-02', 'Kiev, Kreshatik 24', 1000, 'petya-1990', '000'),
    ('Pupkin', 'Vasia', 'man', '1984-01-05', 'Kiev, Teligi 2', 5000, 'vasp_222', '222'),
    ('Poroshenko', 'Petro', 'man', '1965-03-07', 'Kiev, Bankova 3', 5000000, 'vash_prez', '007')
    ");

$query = $pdo->query("SELECT * FROM customer"); //get all users from table
$rows = $query->fetchAll(PDO::FETCH_NUM); //fetch into index array
$users = [];


//transform all users from query into objects Customer and push them into array $users
foreach ($rows as $row) {
    list($id, $firstName, $lastName, $sex, $dateOfBirth, $address, $balance, $login, $password) = $row;
    $sex = new Sex($sex);
    $dateOfBirth = new DateTime($dateOfBirth);

    $usr = new Customer($id, $firstName, $lastName,
        $sex, $dateOfBirth, $address, $balance,
        $login, $password
        );
    array_push($users, $usr);
}

//working with some user from set.
$test_usr = $users[2];

if ($test_usr instanceof Customer) {
    $test_usr->changeBalance(-5000);
}

$new_bal =  $test_usr->getBalance();

$id = $test_usr->getId();
$query = $pdo->query(
    "UPDATE customer 
    SET balance=$new_bal
    WHERE id=$id
    ");
//var_dump($query);