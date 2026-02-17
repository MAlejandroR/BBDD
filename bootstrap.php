<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "vendor/autoload.php";

$carga = fn($clase)=>require "$clase.php";

spl_autoload_register($carga);

//cargar el directorio donde esté en .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



