<?php

namespace App\Controller;

class ErrorController extends AbstractController
{
    public function err404()
    {
        http_response_code(404);
        $this->render("error/404");
    }

    public function exception(): void
    {
        $msgError = $_SESSION['msgError'];
        $this->render('error/exception', ['msg' => $msgError]);
        unset($_SESSION['msgError']);
    }
}