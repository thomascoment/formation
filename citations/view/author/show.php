<?php
$title = "Ajouter un auteur";
$pageTitle = "Ajouter un auteur";
$module = "authors";
ob_start();

?>

<div class="g-4 my-4">

    <h2><?= htmlspecialchars($params['authors']->getAuthor()) ?> </h2>
    <p><?= htmlspecialchars($params['biography']->getBiography()) ?></p>


</div>


<?php
$content = ob_get_clean();
require_once ROOT_PATH . "/view/template/default.php";