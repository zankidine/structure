<?php

namespace Alumni\Core\Router;

use Alumni\Core\Http\Request;
use Exception;

class Router implements RouterInterface
{

    protected const METHODE_GET = 'GET';
    protected const METHODE_POST = 'POST';
    protected string $requestMethode;
    protected string $requestUri;
    protected string $defaultController = "Alumni\\Core\\Controller\\NotFoundPageController";
    protected string $defaultMethode = 'index';
    /**
     * @var array|string[]
     */
    protected array $patterns = [
        ":id"=>"[0-9]+", // Accepte seulement les paramètres en chiffre
        ":any"=>"[a-zA-Z0-9]+" // Accepte tout type de paramètre
    ];
    /**
     * @var Request
     */
    protected Request $request;

    public function __construct()
    {
        $this->request = new Request();
        $this->requestMethode = $this->request->methode();
        $this->requestUri = $this->request->uri();
    }
    protected array $routes = [];

    /**
     * @inheritDoc
     */
    public function get($path, $action): void
    {
        $path = $this->pregReplace($path);
        $this->routes[self::METHODE_GET][$path] = $action;
    }

    /**
     * @inheritDoc
     */
    public function post($path, $action): void
    {
        $path = $this->pregReplace($path);
        $this->routes[self::METHODE_POST][$path] = $action;
    }

    /**
     * Recherche si la demande utilisateur (url) correspondant à une
     * url du site.
     * @param $url
     * @param $methode
     * @return bool|array
     */
    public function match($url, $methode)
    {
        // Recherche de correspondance selon la METHODE
        // Si c'est une méthode de type GET
        // Parcourir le tableau routes[GET]
        if( $this->request->isGet($methode)) {
            foreach ($this->routes[self::METHODE_GET] as $path => $action)
            {
                if(preg_match("%^{$path}$%", $url, $matches) === 1){
                    if ($url == $matches[0])
                    {
                        array_shift($matches);

                        $action[] = $matches;
                        return $action;
                    }
                }

            }
        }
        // Si c'est une méthode de type POST
        // Parcourir le tableau des routes[POST]
        elseif ($this->request->isPost($methode))
        {
            foreach ($this->routes[self::METHODE_POST] as $path => $action)
            {
                if ($url == $path)
                {
                    return $action;
                }
            }
        }
        // Si pas de correspondance
        return false;
    }

    /**
     * @param $path
     * @return array|mixed|string|string[]|null
     */
    protected function pregReplace($path)
    {
        // Parcourir le tableau des règles d'expression régulière
        foreach ($this->patterns as $pattern => $replace)
        {
            // Remplace avec l'expression (correcte)
            $path = preg_replace("/({$pattern})/",$replace,$path);
        }

        return $path;
    }

    /**
     * @throws Exception
     */
    public function dispatch()
    {
        // Si une route correspond
        if ($this->match($this->requestUri, $this->requestMethode) !== false)
        {
            // On récupère le nom de la classe avec son namespace
            $className = $this->match($this->requestUri, $this->requestMethode)[0];

            // On récupèse la méthode de la classe
            $methode = $this->match($this->requestUri, $this->requestMethode)[1];

            // Paramètres
            if ($this->request->methode() == "POST")
            {
                $params = $_POST;
            } else {
                $params = $this->match($this->requestUri, $this->requestMethode)[2];
            }


            // Si la classe n'existe pas, affiche une erreur
            if (class_exists($className))
            {
                // Si la classe existe mais pas la méthode, affiche une erreur
               if (method_exists($className, $methode))
               {
                    //Instanciation de la classe
                    $className = new $className;
                    // Exécution de la méthode
                   call_user_func_array([$className, $methode], $params);

               } else {
                   throw new Exception("La methode n'existe pas.");
               }
            } else {
                throw new Exception("La classe n'existe pas.");
            }
        } else
        {
            // Si la page n'existe pas on défini alors une page
            // par défaut d'erreur 404
            $className = new $this->defaultController;
            $methode = $this->defaultMethode;

            // Change le code HTTP par défaut pour 404 page non trouvé.
            http_response_code(404);
            call_user_func([$className, $methode]);
        }
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function resolve()
    {

        $this->dispatch();
    }
}