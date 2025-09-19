<?php   
session_start();

require_once dirname(__DIR__) . '/flash.php';

    if(isset($_POST['apprenant'])){
        if(!empty($_POST['apprenant'])){
            $apprenant = strip_tags(trim($_POST['apprenant']));
            // on envoie au model
            
            setFlash("Truc a bien été ajouté");
            header('Location: students_list.php');
            exit();
        }else{
            //
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php if (isset($flashMessage)): ?>
    <div class="msg">
        <?= $flashMessage ?>
    </div>
<?php endif ?>
    <form action="student_add.php" method="post">
        <div class="field">
            <label for="apprenant">Nom :</label><br>
            <input type="text" name="apprenant" id="apprenant">
        </div>
        <button type="submit">Ajouter</button>
        <a href="students_list.php">Annuler</a>
    </form>
</body>
</html>