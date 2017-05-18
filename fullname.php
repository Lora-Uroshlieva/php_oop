<?php
class FullName
{
    private $firstName;
    private $middleName;
    private $lastName;

    /**
     * FullName constructor.
     * @param $firstname
     * @param $middleName
     * @param $lastName
     */
    public function __construct($firstName, $lastName, $middleName=null)
    {
        $this->firstName = $firstName;
        $this->middleName = $middleName;
        $this->lastName = $lastName;
    }

    public function getFullName()
    {
        return sprintf(
            '%s %s %s',
            $this->firstName,
            $this->middleName,
            $this->lastName
        );
    }
}



class Sex
{
    const SEX_MAN = 'man';
    const SEX_WOMAN = 'woman';
    const SEX_UNDEFINED = 'undefined';

    static protected $allowed_sexes = [
        self::SEX_MAN,
        self::SEX_WOMAN,
        self::SEX_UNDEFINED,
    ];
    private $sex;

    /**
     * Sex constructor.
     * @param $sex
     */
    public function __construct($sex)
    {
        if (!in_array($sex, $this->allowed_sexes)) {
            throw new \InvalidArgumentException('It is not allowed sex!');
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
        return static::$allowed_sexes;
    }


}


class SexEnhanced extends Sex
{
    const SEX_TRANSGENDER = 'trans-gender';

    protected static $allowed_sexes = [
        self::SEX_MAN,
        self::SEX_WOMAN,
        self::SEX_UNDEFINED,
        self::SEX_TRANSGENDER,
    ];
}




class Human
{
    private $fullName;

    private $sex;

    /**
     * Human constructor.
     * @param $fullName
     */
    function __construct(FullName $fullName, Sex $sex)
    {
        $this->fullName = $fullName;
        $this->sex = $sex;
    }

    /**
     * @return FullName
     */
    public function getFullName(): FullName
    {
        return $this->fullName->getFullName();
    }

    public function getSex() {
        return $this->sex->getSex();
    }

    public function changeSex(Sex $sex) {
        $this->sex = $sex;
    }
}


$mike = new Human(
    new FullName('Mike', 'Davidson', 'John'),
    new Sex(Sex::SEX_MAN)
);

echo $mike->getFullName();


//mike changed sex to undefined.
$mike->changeSex(new Sex(Sex::SEX_UNDEFINED));
$undefined = new Sex(Sex::SEX_UNDEFINED);

Sex::getAllowedSexes();