<?php

namespace App\Database;

class PDOSingleton
{
    static ?\PDO $instance = null;

    public static function getInstance(): \PDO
    {
        if(self::$instance === null) {
            self::$instance = new \PDO('mysql:host=localhost;dbname=ecf2', 'root', '');
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return self::$instance;
    }
}