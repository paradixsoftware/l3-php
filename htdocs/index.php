<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once "Autoload.php";
require_once "vendor/autoload.php";
Autoload::register();

$router = new Router();
$router->process();

