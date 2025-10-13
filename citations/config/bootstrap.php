<?php

if(DEBUG) {
    ini_set('display_errors', '1');
    ini_set('display_startupt_errors', '1');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
    ini_set('display_startupt_errors', '0');
    error_reporting(0);
}

set_exception_handler(function (\Throwable $e):void {
    $msgError = 'Une erreur est survenue : ';
    if(DEBUG){
        $msgError .= '<br>' . $e->getMessage() . 'dans le fichier ' . $e->getMessage() . ' à la ligne ' . $e->getLine();
    }

    $_SESSION['msgError'] = $msgError;

    header('Location: /error/exception');
    exit;
});

require_once __DIR__ . '/router.php';