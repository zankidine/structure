<?php

namespace Alumni\Core\Controller;



use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class BaseController
{
    protected $loader;
    protected $twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader(ROOT . '/templates');
        $this->twig = new Environment($this->loader);
    }

    public function render($path, $params = [])
    {
        $this->twig->display($path, $params);
    }
}