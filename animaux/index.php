<?php

require_once 'vendor/autoload.php';

use App\Model\Entity\Animal;


$entity = new Animal();
$entity->hydrate(
    [
    'id' => 1, 
    'nom' => 'patrick',
    'espece_id' => 1
]);

dd($entity);