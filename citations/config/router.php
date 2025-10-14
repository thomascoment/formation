<?php

/**
 * Router principal de l'application
 * Il faudra une classe qui est composée d'un Altorouter et qui gère le routing
 * ainsi que les middlewares
 */

declare(strict_types=1);

$router = new AltoRouter();

require_once ROOT_PATH . '/config/routes.php';

$match = $router->match();

// call closure or throw 404 status
if (is_array($match) && is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
} else {
    // no route was matched
    (new App\Controller\ErrorController())->err404();
}