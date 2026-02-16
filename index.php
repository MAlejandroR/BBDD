<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once "vendor/autoload.php";

$carga = fn($clase)=>require "$clase.php";

spl_autoload_register($carga);

//cargar el directorio donde esté en .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$bd = new BBDD();


$tablas = $bd->get_tables();

$formulario = Plantilla::get_formulario_tablas($tablas);
if (isset($_POST["sumbitg"])) {

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<fieldset style="background:antiquewhite;margin:15%;width:60%">
    <legend>Tablas</legend>
    <?=$formulario ??""?>
</fieldset>


</body>
</html>



