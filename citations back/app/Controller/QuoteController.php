<?php

declare(strict_types=1);

namespace App\Controller;

use App\Database\PDOSingleton;
use App\Model\Repository\AuthorRepository;
use App\Model\Repository\QuoteRepository;

class QuoteController extends AbstractController
{
    public function index()
    {

        $quoteRepo = new QuoteRepository(PDOSingleton::getInstance());
        $quotes = $quoteRepo->findAll();
        $this->render('/quote/list', $quotes);

        require ROOT_PATH . "/view/quote/list.php";
    }



    public function add()
    {
        if (isset($_POST["quote"], $_POST["explanation"])) {
            if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){
                unset($_SESSION['csrf_token']);
                $this->addFlash('Fuck off', AbstractController::DANGER);
                $this->redirect('/quotes/add');
            }

            $authorRepo = new AuthorRepository(PDOSingleton::getInstance());
            $quoteRepo = new QuoteRepository(PDOSingleton::getInstance());

            $rawAuthorId = $_POST["author_id"] ?? null;
            $authorId = ($rawAuthorId === '' || $rawAuthorId === '0') ? null : (int) $rawAuthorId;
            $quote = [
                'quote' => $_POST['quote'],
                'explanation' => $_POST['explanation'],
                'author_id' => $authorId,
            ];


            $quoteEntity = $quoteRepo->create($quote);
            if ($quoteEntity) {
                $this->addFlash('La citation a bien été ajouté');
                $this->redirect('/quotes');
            }
        }
        $csrfToken = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $csrfToken;
        $authorRepo = new AuthorRepository(PDOSingleton::getInstance());
        $authors = $authorRepo->findAll();
        $this->render("quote/add", ['authors' => $authors]);
    }

    /**
     * Permet de supprimer un auteur
     * @param int $id l'id de l'auteur
     * @return void
     */
    public function delete(int $id)
    {
        $quoteRepo = new QuoteRepository(PDOSingleton::getInstance());

        if ($quoteRepo->delete($id)) {
            $this->addFlash("La citation a bien été supprimé", AbstractController::SUCCESS);
            $this->redirect('/quotes');
        }
    }
}
