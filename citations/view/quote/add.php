<?php
$authors = $params['authors'];
$title = "Citations";
$pageTitle = "Liste des citations";
$module = "quotes";
ob_start();

?>

<form action="/quotes/add" method="post">
    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token']?>">
    <div class="mb-3">
        <label for="quote" class="form-label">La citation</label>
        <input type="text" class="form-control" name="quote" id="quote" required>
    </div>
    <div class="mb-3">
        <label for="explanation" class="form-label">Explication</label>
        <textarea name="explanation" id="explanation" class="form-control"></textarea>
    </div>
    
    <div class="mb-3"></div>
    <label for="author_id" class="form-label">Auteurs</label>
    <select name="author_id" id="author_id" class="form-control">
        <option value="0">Anonyme</option>
        <?php foreach ($authors as $author) : ?>
            <option value="<?= $author->getId()?>"><?= $author->getAuthor()?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </div>


</form>


<?php
$content = ob_get_clean();
require_once ROOT_PATH . '/view/template/default.php';
