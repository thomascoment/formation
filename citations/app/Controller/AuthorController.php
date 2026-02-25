<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Repository\AuthorRepository;

class AuthorController extends AbstractController
{

    public function __construct()
    {
        $this->accessValidator();
    }
    
    public function index()
    {
        
        $authorRepository = new AuthorRepository(\App\Database\PDOSingleton::getInstance());
        $authors = $authorRepository->findAll();

        $this->render("author/list", ["authors" => $authors]);
    }

    public function show(int $id): void
    {
        
        $author = new AuthorRepository(\App\Database\PDOSingleton::getInstance());
        $authorData = $author->find($id);
        $this->render("author/show", ['author' => $authorData]);
        }


    public function add(): void
    {
        // Traitement du formulaire
        
        if(isset($_POST['author'], $_POST['biography'])){
            if(!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']){
                unset($_SESSION['csrf_token']);
                $this->addFlash('Non', AbstractController::DANGER);
                $this->redirect('/authors/add');
            }
            $authorRepo = new AuthorRepository(\App\Database\PDOSingleton::getInstance());

            $author = [
                'author' => strip_tags($_POST['author']),
                'biography' => $_POST['biography']
            ];
            $authorEntity = $authorRepo->create($author);
            if($authorEntity){

                $this->addFlash('L\'auteur a bien été ajouté');
                $this->redirect('/authors');
            }
        }
        
        $csrfToken = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $csrfToken;
        $this->render('author/add');
    }


    public function delete(int $id): void
    {
        
        $authorRepo = new AuthorRepository(\App\Database\PDOSingleton::getInstance());

        if($authorRepo->delete($id)){
            $this->addFlash('L\'auteur a bien été supprimé', AbstractController::SUCCESS);
            $this->redirect('/authors');
        }
    }

    public function jsonAll(): void
    {
        $authorRepo = new AuthorRepository(\App\Database\PDOSingleton::getInstance());
        $authors = $authorRepo->findAll();
    
        $data = [];
        foreach($authors as $object){
            $newArray = [];

            $newArray['id'] = $object->getId();
            $newArray['author'] = $object->getAuthor();
            $newArray['image'] = $object->getImage();
            $newArray['biography'] = $object->getBiography();
            $newArray['created_at'] = $object->getCreatedAt();
            $newArray['updated_at'] = $object->getUpdatedAt();

            $data[] = $newArray; 
        }
        dd($data); 

        $this->jsonResponse($data);
        
    }


    
}
