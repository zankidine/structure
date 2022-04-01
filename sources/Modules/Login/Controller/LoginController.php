<?php

/*********************************************************/
/********* CONTROLE DU LOGIN | LOGIQUE METIER ************/
/*********************************************************/

namespace Alumni\Modules\Login\Controller;

use Alumni\Core\Controller\BaseController;

class LoginController extends BaseController
{
    public function login()
    {
        $this->render('/login/login.html.twig');
    }

    public function register()
    {
        dump($_POST);
        //header('Location: /');
    }
}