<?php

namespace App\Database;


/**
 * Singleton pour la connexion PDO
 */
class PDOSingleton
{
    /**
     *  Une instance de la connexion PDO
     * @var 
     */
    static ?\PDO $instance = null;

    /**
     * Retourne l'instance unique de PDO
     * @return \PDO|null
     */
    public static function getInstance(): \PDO
    {
        if(self::$instance === null) {
            self::$instance = new \PDO('mysql:host=localhost;dbname=ecf2', 'thomas', 'toto2499');
            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return self::$instance;
    }
}