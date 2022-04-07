<?php

namespace Alumni\Modules\Hello\Controlleur;

use Alumni\Core\Controller\BaseController;

class HelloController extends BaseController
{
    public function hello()
    {
        $this->render('/hello.html.twig');
    }
    public function nom($nom)
    {

        $this->render('/hellp.html.twig',['nom'=>$nom]);
    }

}