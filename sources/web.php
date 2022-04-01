<?php

/*********************************************************/
/************ DECLARATION DES ROUTES DU SITE *************/
/*********************************************************/



use Alumni\Modules\Home\Controller\HomeController;
use Alumni\Modules\Login\Controller\LoginController;
use Alumni\Core\Router\Router;

$router = new Router();

$router->get('/',[HomeController::class, 'index']);
$router->get('/offer/(:id)', [HomeController::class, 'offer']);
$router->get('/login',[LoginController::class, 'login']);
$router->post('/login',[LoginController::class, 'register']);




















try {
    $router->resolve();
} catch (Exception $e) {

    echo $e->getMessage();
}