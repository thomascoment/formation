<?php

namespace App\Controller;

/**
 * Gestion de l'authentification
 */
class AuthController extends AbstractController
{
    public function login()
    {
        // si le formulaire est soumis
        if (isset($_POST['mail'], $_POST['password'])) {

            //on verifie que les champs ne sont pas vides
            if (empty($_POST['mail']) || empty($_POST['password'])) {
                $this->addFlash('Veuillez remplir tous les champs', AbstractController::DANGER);
                return $this->redirect('/login');
            }

            //on verifie que le mail soit bien un mail
            if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                $this->addFlash('Le format de l\'adresse mais est invalide', AbstractController::DANGER);
                return $this->redirect('login');
            }

            $userRepo = new \App\Model\Repository\UserRepository(\App\Database\PDOSingleton::getInstance());
            $hashed = (string) $userRepo->getHashedPassword($_POST['mail']);

            if (password_verify($_POST['password'], $hashed)) {

                //on met en place la session
                $user = $userRepo->getUserByMail($_POST['mail']);

                $_SESSION['user'] = [
                    "id" => $user['id'],
                    "mail" => $user['mail'],
                    "is_admin" => (bool)$user['is_admin']
                ];

                //on redirige vers la page d'accueil
                $this->redirect("/accueil");
            } else {
                $this->addFlash('Identifiants invalide', AbstractController::DANGER);
                $this->redirect('/login');
            }
        }

        //Affichage du formulaire
        $this->render('auth/login');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        $this->addFlash('Vous êtes déconnecté', AbstractController::SUCCESS);
        $this->redirect('/login');
    }
}
