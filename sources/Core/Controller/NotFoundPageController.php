<?php

namespace Alumni\Core\Controller;

class NotFoundPageController extends BaseController
{
    public function index()
    {
        require '../templates/404.html';
    }
}