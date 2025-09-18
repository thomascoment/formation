<?php   

require_once dirname(__DIR__) . '/header.php'

?>
        <h1>Liste des animaux</h1>
        <div class="animaux">
            <?php foreach ($animals as $animal) : ?>
                <div class="animal">
                    <h2><?= htmlspecialchars($animal['name'])?></h2>
                    <p>Espèce :<?=htmlspecialchars($animal['species'])?></p>
                    <p>Date de naissance :<?= htmlspecialchars($animal['birthday'])?></p>
                    <p>Vacciné : <?= $animal['is_vaccinated'] ? 'Oui' : 'Non' ?></p>
                </div>
                <?php endforeach;?>
            </div>

<?php require_once dirname(__DIR__) . '/footer.php'?>