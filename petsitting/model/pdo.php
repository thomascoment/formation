<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=petsitting', 'petsitting', '1234');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) .
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    http_response_code(500);
    die('Problème avec la base de donnée');
}