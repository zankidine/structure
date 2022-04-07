<?php

/*********************************************************/
/********* FICHIER DE CONFIGURATION DU PROJET ************/
/*********************************************************/

return [
    "DSN"=> "mysql:host=",
    "DBNAME"=>"gourmandise",
    "HOST"=>"localhost",
    "USER"=>"root",
    "PASSWORD"=>"",
    'options'=> [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
];