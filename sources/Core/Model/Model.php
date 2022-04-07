<?php

/*********************************************************/
/********* DEFINITION DES METHODES CRUD DE BASE **********/
/*********************************************************/

namespace Alumni\Core\Model;

use Alumni\Core\Database\DatabaseConnection;
use http\Client;

class Model extends DatabaseConnection
{
    protected DatabaseConnection $pdo;
    private string $tableName = '';
    private \PDOStatement $pdoStatement;

    /**
     * @param string $tableName
     */
    public function setTableName(string $tableName): void
    {
        $this->tableName = $tableName;
    }

    public function __construct()
    {
        $this->pdo = new DatabaseConnection();
    }

    public function findAll()
    {
        $this->pdoStatement = $this->pdo->getInstance()->query("SELECT * FROM {$this->tableName}");

        return $this->pdoStatement->fetchAll();
    }

    public function findAllObject($class)
    {
        $this->pdoStatement = $this->pdo->getInstance()->query("SELECT * FROM {$this->tableName}");

        $data = [];

        while ($object = $this->pdoStatement->fetchObject($class))
        {
            $data[] = $object;
        }

        return $data;
    }
}