<?php

class Plantilla
{


    static public function get_formulario_tablas(array $tablas)
    {
        $formulario = "<form method='POST' action='listado.php'>";
        foreach ($tablas as $tabla) {
            $formulario .= "<input type='submit' name='submit' value='$tabla'>";
        }
        $formulario .= "</form>";
        return $formulario;
    }

    static function get_tabla_hmtl(array $header,array $rows):string{
        $tabla_html = "<table border='1'>";
        $tabla_html .= "<tr>";
        //Añado las cabeceras
        foreach ($header as $field) {
            $tabla_html .= "<th>$field</th>";
        }
        foreach ($rows as $row) {
            $tabla_html .= "<tr>";
            foreach ($row as $field) {
                $tabla_html .= "<td>$field</td>";
            }
            $tabla_html .= "</tr>";
        }

        $tabla_html .= "</table>";
        return $tabla_html;


    }
}
