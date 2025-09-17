<?php   

$form = [
    'name' => 'Bichon',
    'is_vaccinated' => '1',
    'birthday' => '2023-05-16',
    'species_id' => '2',
];

require_once '../pdo.php';
require_once '../../utils.php';

//INSERT INTO table(champs1, champs) VALUES(valeur1, valeur2);

$sql = 'INSERT INTO animal(name, is_vaccinated, birthday, species_id) 
VALUE (:name, :is_vaccinated, :birthday, :species_id)';
$q = $pdo->prepare($sql);
$q->bindValue(':name', $form['name'], PDO::PARAM_STR);
$q->bindValue(':is_vaccinated', $form['is_vaccinated'], PDO::PARAM_BOOL);
$q->bindValue(':birthday', $form['birthday'], PDO::PARAM_STR);
$q->bindValue(':species_id', $form['species_id'], PDO::PARAM_STR);
$success = $q->execute();

echo $pdo->lastInsertId() . '<br>';
var_dump($success);