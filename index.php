<?php
require_once "bootstrap.php";

$bd = new BBDD();


$tablas = $bd->get_tables();

$formulario = Plantilla::get_formulario_tablas($tablas);

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



