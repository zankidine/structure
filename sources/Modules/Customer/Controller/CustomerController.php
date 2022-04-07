<?php

namespace Alumni\Modules\Customer\Controller;

use Alumni\Core\Controller\BaseController;
use Alumni\Modules\Customer\Model\CustomerManager;

class CustomerController extends BaseController
{
    protected $client;


    public function index()
    {
        $this->client = new CustomerManager();
        $listeClients = $this->client->listeClients();
       $this->render('/liste.html.twig',['liste'=>$listeClients]);
    }

}