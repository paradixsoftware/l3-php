<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "tp2/Autoload.php";
use app\Parole\Parole;
use app\Parole\ParoleFrancais;
use app\Vehicule\Voiture;

Autoload::register();

$voiture = new Voiture();
