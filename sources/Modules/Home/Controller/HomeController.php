<?php

namespace Alumni\Modules\Home\Controller;

use Alumni\Core\Controller\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
       $this->render('/base.html.twig');
    }

    public function offer($id)
    {
        echo $id;
    }
}