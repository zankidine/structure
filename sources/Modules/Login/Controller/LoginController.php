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
        require '../templates/index.html';
    }
}