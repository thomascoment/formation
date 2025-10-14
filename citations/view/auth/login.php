<?php

ob_start();

 ?>
    <main id="main">
        <div class="container py-5">
            <div class="mx-auto" style="max-width: 500px">
                <div class="bg-white p-4 p-md-5 rounded shadow">
                    <h1 class="text-center mb-3">Connexion</h1>
                    <form method="post" action="/login">
                        <div class="mb-3">
                            <label for="mail" class="form-label">Adresse email</label>
                            <input type="mail" class="form-control" id="mail" name="mail"
                                placeholder="jeandupont@domaine.com" required>
                        </div>
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" id="password" class="form-control" required name="password"
                            aria-describedby="passwordHelpBlock">
                        <div id="passwordHelpBlock" class="form-text">
                        </div>
                        <div class="form-check mb-3 mt-3">
                            <input class="form-check-input" type="checkbox" id="showPassword">
                            <label class="form-check-label" for="showPassword">
                                Afficher le mot de passe
                            </label>
                        </div>
                        <a href="/forgot-password" class="text-decoration-none">Mot de passe oublié ?</a>
                        <button type="submit" class="btn btn-primary w-100 mt-3">Se connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
<?php 
$content = ob_get_clean();
require_once ROOT_PATH . "/view/template/connection.php";