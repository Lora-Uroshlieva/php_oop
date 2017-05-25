<?php


class StaticClass
{
    public static $entitiesQuantity = 0;
    const MY_CONST = 45;

    function __construct()
    {
        self::$entitiesQuantity +=1;
    }

    public static function test1()
    {
        echo 'Hello, this is static function';
    }
}

new StaticClass();
new StaticClass();
new StaticClass();

echo StaticClass::$entitiesQuantity;
echo '<br>', StaticClass::MY_CONST;
StaticClass::test1();