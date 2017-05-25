<?php

/**
 * Created by PhpStorm.
 * User: lora
 * Date: 23.05.17
 * Time: 22:04
 */
class User2
{
    protected $login;
    protected $password;
    protected $email;
    protected $rating;
    protected $isLogged = false;

    /**
     * User constructor.
     * @param $login
     * @param $password
     * @param $email
     * @param $rating
     */
    public function __construct($login, $password, $email, $rating=0)
    {
        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
        $this->rating = $rating;
    }

    public function login()
    {
        $this->isLogged = true;
        echo 'You are logged in.<br>';
    }

    public function logout()
    {
        $this->isLogged = false;
        echo 'You are logged out of system.<br>';
    }
}

$mike = new User2('mike12', '1111', 'mike@test.ua', 3);
$mike->login();

$mike->logout();


$a = 15;
var_dump((object) $a);
$b = ['aaa', 'bbb', 'ccc'];
var_dump((object) $b);

$message = ['name'=> 'Ivan', 'email'=> 'iii@test.net', 'message'=> 'Hello world'];
var_dump((object) $message);


class Manager extends User2 {}
class Admin extends User2 {}

$boss = new Manager('your_boss', '1111', 'boss@ukr.net', 4);
$admin = new Admin('Valera', '23232', 'ivanov@ukr.ner');

var_dump($boss);
var_dump($admin);
$boss->login();

$b = $boss;
var_dump($b===$boss);

$a = clone $admin;
$a->__construct('second_admin', '000000', 'test@mail.ua', 2);
var_dump($a);
var_dump($admin===$a);