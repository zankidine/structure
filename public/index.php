<?php

/*********************************************************/
/********* POINT D'ENTRER PRINCIPAL DU PROJET ************/
/*********************************************************/

declare(strict_types=1);



ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
//ini_set("SMTP","localhost");
//ini_set("smtp_port","25");
error_reporting(E_ALL);

define("ROOT",dirname(__DIR__));

// Inclusion de l'autoloader de composer
require_once __DIR__ . "/../vendor/autoload.php";

require_once __DIR__ . "/../sources/web.php";


