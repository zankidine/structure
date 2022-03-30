<?php

/*********************************************************/
/********* POINT D'ENTRER PRINCIPAL DU PROJET ************/
/*********************************************************/

declare(strict_types=1);


use Alumni\Modules\Home\Controller\HomeController;
use Alumni\Modules\Login\Controller\LoginController;

error_reporting(E_ALL);

// Inclusion de l'autoloader de composer
require_once __DIR__ . "/../vendor/autoload.php";

$router = new Alumni\Core\Router\Router();


$router->get('/',[HomeController::class, 'index']);
$router->get('/login',[LoginController::class, 'login']);
$router->post('/login',[LoginController::class, 'login']);

try {
    $router->resolve();
} catch (Exception $e) {

    echo $e->getMessage("L");
}