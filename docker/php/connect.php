<?php

const DBHOST = 'db';
const DBUSER = 'test';
const DBPASS = 'pass';
const DBNAME = 'demo';

$dsn = 'mysql:host=' . DBHOST . ';dbname=' . DBNAME;
try{
    $db = new PDO($dsn, DBUSER, DBPASS);
    echo 'Connecté <br>';
}catch(PDOException $e){
    echo 'Problème avec la base de donnée : ' . $e->getMessage();
}