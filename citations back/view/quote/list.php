<?php

$title = "Citations";
$pageTitle = "Liste des citations";
$module ="quotes";
ob_start();
?>
    
    
    <div class="container my-5">
        <div class="ajouter mb-3">
            <a href="/quotes/add" class="btn btn-primary">Ajouter une citation</a>
        </div>
        <table class="table table-striped  mb-3">
            <thead>
                <tr>
                    <th style="width: 5%;">Id</th>
                    <th>Citation</th>
                    <th style="width: 20%; text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($params as $quote) : ?>
                <tr>
                    <td><?= htmlspecialchars($quote->getId()) ?></td>
                    <td><?= htmlspecialchars($quote->getQuote()) ?></td>
                    <td class="text-end">
                        <a href="/quotes/edit/<?= $quote->getId() ?>" class="text-decoration-none me-2"><i class="bi bi-pencil"></i>
                            Modifier</a>
                        <a href="/quotes/delete/<?= $quote->getId() ?>" class="text-decoration-none text-danger"><i class="bi bi-trash"></i>
                            Supprimer</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>

        </table>
    </div>

    <?php

    $content = ob_get_clean();
    require_once ROOT_PATH . '/view/template/default.php';

