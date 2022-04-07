<?php

/*********************************************************/
/************ DECLARATION DES ROUTES DU SITE *************/
/*********************************************************/


use Alumni\Modules\Customer\Controller\CustomerController;
use Alumni\Modules\Hello\Controlleur\HelloController;
use Alumni\Modules\Home\Controller\HomeController;
use Alumni\Modules\Login\Controller\LoginController;
use Alumni\Core\Router\Router;

$router = new Router();

$router->get('/',[CustomerController::class, 'index']);
$router->get('/offer/', [HomeController::class, 'offer']);
$router->get('/login',[LoginController::class, 'login']);
$router->get('formulaire-connexion', [Connexion::class, 'index']);
$router->post('/login',[LoginController::class, 'register']);
$router->get('/hello',[HelloController::class,'hello']);
$router->get('/hello/(:any)',[HelloController::class,'nom']);




















try {
    $router->resolve();
} catch (Exception $e) {

    echo $e->getMessage();
}