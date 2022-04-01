<?php

namespace Alumni\Core\Http;

class Request
{
    /**
     * @return mixed
     */
    public function methode()
    {
        return $_SERVER["REQUEST_METHOD"];
    }

    /**
     * @return string
     */
    public function uri(): string
    {
        if(rtrim($_SERVER["REQUEST_URI"], '/') == "") return '/';
        return rtrim($_SERVER["REQUEST_URI"], '/');
    }

    /**
     * @param $methode
     * @return bool
     */
    public function isGet($methode): bool
    {
        if ($methode == "GET")
        {
            return true;
        }
        return false;
    }

    /**
     * @param $methode
     * @return bool
     */
    public function isPost($methode): bool
    {
        if ($methode == "POST")
        {
            return true;
        }

        return false;
    }
}