<?php

namespace Alumni\Modules\Customer\Model;

use Alumni\Core\Model\Model;

class CustomerManager extends Model
{
    private Model $model;

    public function __construct()
    {
        $this->model = new Model;
        $this->model->setTableName('client');
    }

    public function listeClients()
    {
        return $this->model->findAllObject(CustomerEntity::class);
    }
}