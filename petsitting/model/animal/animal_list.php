<?php

require_once __DIR__ . '/pdo.php';
require_once __DIR__ . '/utils.php';

$sql = 'SELECT animal.id, animal.name, animal.is_vaccinated, 
DATE_FORMAT(animal.birthday, \'%d/%m/%Y\') AS birthday, species.id AS species_id, species.species FROM animal
LEFT JOIN species ON species.id = animal.species_id';

$q = $pdo->query($sql);
$animal = $q->fetchAll();

pre_print_r($animal);