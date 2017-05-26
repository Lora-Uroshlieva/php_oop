<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function __autoload($className) {
    $path = __DIR__.DIRECTORY_SEPARATOR.$className.'.php';
    if (!file_exists($path)) {
        throw new Exception('File does not exist');
    } else {
        require $path;
    }
}

new StaticClass();