<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Patient
{
    protected $id;
    protected $firstName;
    protected $lastName;
    protected $sex;
    protected $dateOfBirth;
    protected $login;
    protected $password;
    protected $illness_list = [];
    protected $drugs_appointed = [];

    public static $patient_quantity = 0;

    /**
     * Patient constructor.
     * @param $id
     * @param $firstName
     * @param $lastName
     * @param $sex
     * @param $dateOfBirth
     * @param $login
     * @param $password
     */
    public function __construct($id, $firstName, $lastName, $sex, $dateOfBirth, $login, $password)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->sex = $sex;
        $this->dateOfBirth = $dateOfBirth;
        $this->login = $login;
        $this->password = $password;
        self::$patient_quantity +=1;
    }

    public function getFullName()
    {
        return sprintf(
            'mr %s %s',
            $this->firstName,
            $this->lastName
        );
    }

    public function addIllness($illness)
    {
        array_push($this->illness_list, $illness);
        return $this->illness_list;
    }

    public function appoint_drugs($drug)
    {
        array_push($this->drugs_appointed, $drug);
        return $this->drugs_appointed;
    }
}