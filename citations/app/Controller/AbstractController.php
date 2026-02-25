<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\User;

/**
 * Controlleur abstrait qui permet de factoriser les fonctionnalitées commune à tous les controlleurs
 */
abstract class AbstractController
{
    const SUCCESS = "success";
    const DANGER = "danger";
    const WARNING = "warning";
    const INFO = "info";


    /**
     * Redirige vers une vue
     * @param string $view fichier relatif (exemple author/list)
     * @param array $param les paramètres à passer à la vue (ex : une liste d'entités)
     * @return void
     */
    protected function render(string $view, array $params = []): void
    {
        require_once(ROOT_PATH . '/view/' . $view . '.php');
    }


    /**
     * Redirection HTTP
     * @param string $url l'url de redirection
     * @return never
     */
    protected function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }


    /**
     * Ajoute un flash en session
     * @param string $message message à afficher
     * @param string $code la classe CSS (peut être une constante de AbstractController)
     * @return void
     */
    protected function addFlash(string $message, string $code = 'success'): void
    {
        $_SESSION['flash'] = 
        [
            'texte' => $message,
            'code' => $code
        ];
    }

    
    /**
     * Envoie une réponse JSON
     * @param array $data les données à envoyer
     * @param int $code le code HTTP (200 par défaut)
     * @return never
     */
    protected function jsonResponse(array $data, int $code = 200): void
    {
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *'); 
        header('Access-Control-Allow-Methods: GET'); 
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        http_response_code($code);
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        exit;
    }

    protected function accessValidator(string $role ='user'):void{

        if(!$_SESSION['user']){
            $this->addFlash('Vous devez être connecté pour accéder à la page', AbstractController::DANGER);
            $this->redirect('/login');
        }
        if($role == 'admin' && empty($_SESSION['user']['is_admin'])){
            $this->addFlash('Vous n\'avez pas les droits pour accéder à cette page', AbstractController::DANGER);
            $this->redirect('/accueil');
        }
    }
}


