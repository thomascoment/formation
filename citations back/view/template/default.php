<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | Admin Citations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Citations admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" <?= $module === 'quotes' ? 'active' : '' ?> href="/quotes">Les citations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $module === 'authors' ? 'active' : '' ?>" href="/authors">Les auteurs</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-0 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" <?= $module === 'users' ? 'active' : '' ?> href="/users">Les utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" <?= $module === 'profile' ? 'active' : '' ?> href="/users/profile">Mon profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../html.html" target="_blank" title="le site"><i
                                class="bi bi-eye"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout" title="Se déconnecter"><i
                                class="bi bi-box-arrow-right"></i></a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <?php if(isset($_SESSION['flash'])) : ?>
     <div class="container-fluid bg-<?= $_SESSION['flash']['code'] ?> text-white text-center py-2">
        <?= $_SESSION['flash']['texte'] ?>
    </div>
    <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>

    <div class="container my-5">
        <h1 class="title mb-4">
            <?= $pageTitle ?>
        </h1>

            <?= $content ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </div>
</body>

</html>