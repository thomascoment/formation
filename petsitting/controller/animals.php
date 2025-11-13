<?php
require_once ROOT . '/utils.php';

//il va chercher les données
require_once ROOT . '/model/animal.model.php';
$animals = findAllAnimals($pdo);


//il affiche la vue
require_once ROOT . '/view/animals/list.view.php'
?>