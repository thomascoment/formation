<?php
require_once ROOT . '/utils.php';

if(isset($_POST['species']) && !empty($_POST['species'])){
    $speciesName = trim($_POST['species']);

    require_once ROOT . '/model/species.model.php';
    $success = addSpecies($pdo, $speciesName);
    if($success){
        $flashMessage = "L'espèce à bien été ajouté";
    }else{
        $flashMessage = "Une erreur est survenue lors de l'ajout de l'espece";
    }
}


require_once ROOT . '/view/species/add.view.php';