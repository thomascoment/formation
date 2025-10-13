<?php declare(strict_types=1);

namespace App\Controller;

use App\Model\Repository\AuthorRepository;
class AuthorController extends AbstractController
{
    public function index()
    {
        $authorRepository = new AuthorRepository(\App\Database\PDOSingleton::getInstance());
        $authors = $authorRepository->findAll();

        $this->render("author/list", ["authors"=> $authors]);
    }

    public function add(): void
    {
        $this->render('author/add');
    }
}