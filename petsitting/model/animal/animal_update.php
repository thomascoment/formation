<?php

$animal = [
    "id" => "3",
    "name" => "Bichon",
    'is_vaccinated' => '1',
    'birthday' => '2020-09-29',
    'species_id' => '2',
];

require_once '../pdo.php';
require_once '../../utils.php';

$sql = 'UPDATE animal SET 
name = :name,
is_vaccinated = :is_vaccinated,
birthday = :birthday,
species_id = :species_id
 WHERE id = :id';
$q = $pdo->prepare($sql);
$q->bindValue(':name', $animal['name']);
$q->bindValue(':is_vaccinated', $animal['is_vaccinated']);
$q->bindValue(':birthday', $animal['birthday']);
$q->bindValue(':species_id', $animal['species_id']);
$q->bindValue(':id', $animal['id']);
$success = $q->execute();

var_dump($success);