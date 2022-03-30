<?php

namespace Alumni\Core\Router;

interface RouterInterface
{
    /**
     * ROUTE AVEC LA METHODE GET
     * @param $path
     * @param $action
     * @return void
     */
    public function get($path, $action):void;

    /**
     * ROUTE AVEC LA METHODE POST
     * @param $path
     * @param $action
     * @return void
     */
    public function post($path, $action):void;

    /**
     * EXECUTION DE LA DEMANDE (POST|GET)
     * @return mixed
     */
    public function resolve();
}