<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Repository\QuoteRepository;

class QuoteController extends AbstractController
{
    public function index()
    {
        //on va chercher les citations en base de données
        $quoteRepository = new QuoteRepository(\App\Database\PDOSingleton::getInstance());
        $quotes = $quoteRepository->findAll();

        dd($quotes);
        // on rends à la vue

        require ROOT_PATH . "/view/quote/list.php";
    }

    public function show($id)
    {
        echo "Montre la citation avec l'id : " . htmlspecialchars($id);

    }

    public function create()
    {
        echo 'Créer une nouvelle citation';
    }

    public function edit($id)
    {
        echo "Editer la citation avec l'id : " . htmlspecialchars($id);
    }

    public function delete($id)
    {
        echo "Supprime la citation avec l'id: " . htmlspecialchars($id);
    }
}
