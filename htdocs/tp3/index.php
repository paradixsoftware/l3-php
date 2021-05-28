<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "Autoload.php";
use app\Controller\HomeController;
use app\Entity\A;
use app\Entity\B;
use app\Entity\Product;

Autoload::register();

$product = new Product();
