<?php

//Composant d'accès pour les animaux
require_once __DIR__ . '/pdo.php';


/**
 * 
 * Renvoie la liste de toutes les especes
 * @param PDO $pdo
 * @return array
 */
function findAllSpecies(PDO $pdo): array
{
    $sql = 'SELECT * FROM species';

    $q = $pdo->query($sql);
    return $q->fetchAll();
}
/**
 * 
 * Ajouter une espece
 * @param PDO $pdo
 * @param string $species espsece à ajouter
 * @return bool
 */
function addSpecies(PDO $pdo, string $species): bool {
    $sql = 'INSERT INTO species (species) VALUES (:species)';
    $q = $pdo->prepare($sql);
    $q->bindValue(':species', $species, PDO::PARAM_STR);
    return $q->execute();
}