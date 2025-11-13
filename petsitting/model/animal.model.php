<?php

/**
 * Composants d'accès aux données de la table "animal"
 */

require_once __DIR__ . '/pdo.php';


/**
 * Renvoie la liste de tous les animaux
 * @param PDO $pdo
 * @return array
 */
function findAllAnimals(PDO $pdo): array {
    $sql = 'SELECT animal.id, animal.name, animal.is_vaccinated, 
DATE_FORMAT(animal.birthday, \'%d/%m/%Y\') AS birthday, species.id AS species_id, species.species FROM animal
LEFT JOIN species ON species.id = animal.species_id';

    $q = $pdo->query($sql);
    return $q->fetchAll();
}