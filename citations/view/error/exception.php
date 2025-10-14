<?php
$title = "Erreur Serveur";
$pageTitle = "Erreur Serveur";
$module = "error";
ob_start();
?>

<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 my-4">
    Erreur 500 <br>
    <?= $params['msg'] ?>
</div>

<?php
$content = ob_get_clean();

require_once ROOT_PATH . '/view/template/default.php';
