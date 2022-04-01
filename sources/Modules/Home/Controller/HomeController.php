<?php

namespace Alumni\Modules\Home\Controller;

use Alumni\Core\Controller\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        require '../templates/index.html';
    }

    public function offre($id)
    {
        echo $id;
    }
}