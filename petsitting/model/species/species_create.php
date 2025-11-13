<?php   

$form = [
    'species' => 'blblb'
];

require_once '../pdo.php';
require_once '../../utils.php';

//INSERT INTO table(champs1, champs) VALUES(valeur1, valeur2);

$sql = 'INSERT INTO species(species.species) VALUE (:espece)';
$q = $pdo->prepare($sql);
$q->bindValue(':espece', $form['species'], PDO::PARAM_STR);
$success = $q->execute();

echo $pdo->lastInsertId() . '<br>';
var_dump($success);