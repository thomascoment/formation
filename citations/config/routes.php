<?php

declare(strict_types=1);
//Author routes
$router->map('GET', '/authors', function () {
    (new App\Controller\AuthorController())->index();
});

$router->map('GET|POST', '/authors/add', function () {
    (new App\Controller\AuthorController())->add();
});

$router->map('GET|POST', '/authors/delete/[i:id]', function ($id) {
    (new App\Controller\AuthorController())->delete((int) $id);
});

$router->map('GET', '/json/authors', function () {
    (new App\Controller\AuthorController())->jsonAll();
});

$router->map('GET', '/authors/[i:id]', function ($id) {
    (new App\Controller\AuthorController())->show((int) $id);
});


//Quotes routes
$router->map('GET', '/', function () {
    (new App\Controller\QuoteController())->index();
});
$router->map('GET', '/quotes', function () {
    (new App\Controller\QuoteController())->index();
});

$router->map('GET', '/quotes/list', function () {
    (new App\Controller\QuoteController())->index();
});

$router->map('GET', '/quotes/delete/[i:id]', function($id) {
    (new App\Controller\QuoteController())->delete((int) $id);
});


$router->map('GET|POST', '/quotes/add', function() {
    (new App\Controller\QuoteController())->add();
});









$router->map('GET', '/error/exception', function() {
    (new App\Controller\ErrorController())->exception();
});


// Routes d'authenfication

$router->map('GET|POST', '/login', function(): void {
    (new App\Controller\AuthController())->login();
});

$router->map('GET', '/logout', function() {
    (new App\Controller\AuthController())->logout();
});


// Routes Utilisateurs

$router->map('GET', '/users', function(){
    (new App\Controller\UserController())->index();
});