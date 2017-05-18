<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

try {
    $man = new Sex('jgjhg');
} catch (\Exception $e) {
    var_dump($e->getTrace());
}
