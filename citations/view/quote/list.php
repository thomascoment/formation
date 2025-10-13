<?php

// dump($quotes);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="/">Les citations</a></li>
                <li><a href="/authors">Les auteurs</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Liste des citations</h1>
        <ul class="citations">
            <?php foreach ($quotes as $quote) : ?>
                <li>
                    <?= htmlspecialchars($quote->getQuote()) ?>
                <cite><?= htmlspecialchars($quote->getAuthor_id()) ?> </cite>
                </li>
            <?php endforeach ?>
        </ul>
    </main>

</body>

</html> 