<?php   

define('ROOT', dirname(__DIR__));

if(isset($_GET['module'])){
    switch($_GET['module']){
        case 'species':
        case'animals':
            $controller = $_GET['module'];
            break;
        default :
            $controller = '404';   
        }
    }else{
    $controller = 'species';
}

require_once ROOT . '/controller/' . $controller . '.php';