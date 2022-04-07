<?php

/*********************************************************/
/**** LA GESTION DE LA CONNEXION A LA BASE DE DONNEES ****/
/*********************************************************/

namespace Alumni\Core\Database;
use Exception;
use PDO;

class DatabaseConnection
{
    /**
     * @var PDO
     */
    private static PDO $instance;
    private array $credentials;

    public function __construct()
    {
        // On récupère les paramètres pour la base de données
        $this->credentials = include '../config.php';

        try {

            self::$instance = new PDO("{$this->credentials['DSN']}{$this->credentials['HOST']};dbname={$this->credentials['DBNAME']}", $this->credentials['USER'], $this->credentials['PASSWORD'],$this->credentials['options']);

        } catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    /**
     * @return PDO
     */
    public function getInstance(): PDO
    {
        return self::$instance;
    }

}
