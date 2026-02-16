<?php

class Plantilla
{


    static public function get_formulario_tablas(array $tablas)
    {
        $formulario = "<form method='POST' action='index.php'>";
        foreach ($tablas as $tabla) {
            $formulario .= "<input type='submit' name='submit' value='$tabla'>";
        }
        $formulario .= "</form>";
        return $formulario;
    }
}
