<?php
require_once "bootstrap.php";


$bd = new BBDD();


$table= $_POST['submit'];

$header = $bd->get_headers ($table);
$rows = $bd->get_rows($table);
$tabla_html = Plantilla::get_tabla_hmtl($header, $rows);
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
    <legend>Listado de <?=$table?></legend>
    <?=$tabla_html?>
</fieldset>

</body>
</html>

