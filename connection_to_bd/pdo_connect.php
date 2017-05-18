<?php
class User
{
    public $host;
    public $user;

}



$pdo = new \PDO('mysql:host=localhost;dbname=mysql', 'root', '***');

$query = $pdo->query('show databases');
$query = $pdo->query('SELECT User as user, Host as host FROM user');

$rows = $query->fetchAll(PDO::FETCH_CLASS, User::class); ///FETCH_ASSOC

var_dump($rows);

