<?php

require_once 'vendor/autoload.php';

use App\Model\Entity\Author;
use App\Model\Entity\Quote;
use App\Model\Repository\AbstractRepository;

use App\Model\Entity\AbstractEntity;
use App\Model\Repository\AuthorRepository;
use App\Model\Repository\QuoteRepository;


try{
            $pdo = new PDO('mysql:host=localhost;dbname=ecf2', 'root', '' );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            http_response_code(500);
            die('Problème de connexion à la BDD');
        }

        /*
        $author = new Author();
        $author->hydrate(['id' => '4', 'author' => 'Michel', 'biography' => "Le gars s'appelle juste Michel", 'image' => "Une image"]);
        dd($author);
    
        $quote= new Quote();
        $quote->hydrate(['id' => '4', 'quote' => "On est mieux là qu'à se prendre des coups de pieds dans les noix", 'explanation' => 'Tout est dit']);
        dd($quote);
        */

        
        $authorManager = new AuthorRepository($pdo);
        $quoteManager = new QuoteRepository($pdo);

        dump($authorManager->findAll());
        dump($authorManager->findOne(1));
        dump($authors = $authorManager->delete(4));
        dump($authors = $authorManager->delete(3));


        $quotes = $quoteManager->delete(3);
        dd($authors);