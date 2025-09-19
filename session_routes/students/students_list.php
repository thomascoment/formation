<?php   
session_start();

require_once dirname(__DIR__) . '/flash.php'; 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if(isset($_SESSION['flash'])): ?>
        <?= displayFlash() ?>
        <?php endif ?>
    <a href="student_add.php">Ajouter un apprenant</a>
    <ul>
        <li>Benjamin Vodye <a href="student_delete.php?id=1">Supprimer</a></li>
        <li>Meganne Bats</li>
        <li>Khalil Echchine</li>
    </ul>
</body>
</html>