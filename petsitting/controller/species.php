<?php   

require_once ROOT . '/utils.php';

//model
require_once ROOT . '/model/species.model.php';
$species = findAllSpecies($pdo);

//vue
require_once ROOT . '/view/species/liste.view.php';
