<?php 
$title = "Les auteurs";
$pageTitle = "Liste des auteurs";
$module = "authors";
ob_start(); 

?>
        
        <div class="ajouter mb-3">
            <a href="/authors/add" class="btn btn-primary">Ajouter un auteur</a>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 my-4">
            <?php foreach ($params['authors'] as $author): ?>
                <!-- Auteur 1 -->
                <div class="col">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><?= strip_tags($author->getAuthor()) ?></h5>
                            <p class="card-text"><?= substr(strip_tags($author->getBiography()), 0, 99) ?> ...etc</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="/authors/edit/<?= $author->getId() ?>" class="btn btn-primary btn-sm"><i class="bi bi-pencil"></i>
                                Modifier</a>
                            <a href="/authors/delete/<?= $author->getId() ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i>
                                Supprimer</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

<?php $content = ob_get_clean(); ?>

<?php require_once ROOT_PATH . '/view/template/default.php'; ?>