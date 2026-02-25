<?php

/**
 * Bootstrap du projet
 */

if (DEBUG) {
    $params = [
        'displayErrorReporting' => E_ALL,
        'startupErrors' => 1,
        'errors' => 1
    ];
} else {
    $params = [
        'displayErrorReporting' => 0,
        'startupErrors' => 0,
        'errors' => 0
    ];
}

ini_set('display_errors', (string)$params['errors']);
ini_set('display_startup_errors', (string)$params['startupErrors']);
error_reporting((int)$params['displayErrorReporting']);


/**
 * Gestion des exceptions
 */
set_exception_handler(function (\Throwable $e): void {
    $msgError = 'Une erreur est survenue : ';
    if (DEBUG) {
        $msgError .= '<br>' . $e->getMessage() . 'dans le fichier ' . $e->getMessage() . ' à la ligne ' . $e->getLine();
    }

    $_SESSION['msgError'] = $msgError;

    header('Location: /error/exception');
    exit;
});

require_once __DIR__ . '/router.php';
