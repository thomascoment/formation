<?php
require_once 'connect.php';

$sql = $db->prepare('INSERT INTO client VALUES (NULL, :name, :firstname, :email)');
$sql->bindValue('name', $_POST['name'], PDO::PARAM_STR);
$sql->bindValue('firstname', $_POST['firstname'], PDO::PARAM_STR);
$sql->bindValue('email', $_POST['email'], PDO::PARAM_STR);
$sql->execute();
if($sql->execute()){
    $message = 'Ok';
}else{
    $message = 'pas ok';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire test</title>
</head>
<body>
    <p>
        <?= $message ?>
    </p>
    <form action="index.php" method="POST">
        <label for="Prénom" name="firstname">Prénom
            <input type="text" name="firstname"><br>
        </label>
        <label for="Nom" name="name">Nom 
            <input type="text" name="name"><br>
        </label>
        <label for="Email" name="email">Email
            <input type="email" name="email"><br>
        </label>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>