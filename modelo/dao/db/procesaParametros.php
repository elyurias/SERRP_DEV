<?php
class procesaParametros {

    public static function PrepareStatement($query, $datos) {
        $indice = 0;
        $query1 = "";
        for ($i = 0; $i < strlen($query); $i++) {
            if ($query[$i] == "?") {
                if ($datos[$indice] != "null")
                    $query1.= (" '" . self::EvitandoInjectio($datos[$indice]) . "' ");
                else
                    $query1.= (" " . self::EvitandoInjectio($datos[$indice]) . " ");
                $indice++;
            } else {
                $query1.= $query[$i];
            }
        }
        return $query1;
    }

    public static function PrepareStatementEntities($query, $datos) {
        $indice = 0;
        $query1 = "";
        for ($i = 0; $i < strlen($query); $i++) {
            if ($query[$i] == "?") {
                if ($datos[$indice] != "null")
                    $query1.= (" '" . html_entity_decode ($datos[$indice]) . "' ");
                else
                    $query1.= (" " .  html_entity_decode ($datos[$indice]) . " ");
                $indice++;
            } else {
                $query1.= $query[$i];
            }
        }
        return $query1;
    }

    public static function PrepareStatementBuscar($query, $datos) {
        $indice = 0;
        $query1 = "";
        for ($i = 0; $i < strlen($query); $i++) {
            if ($query[$i] == "?") {
                //    if($datos[$indice]!=" ")
                //  $query1.= (self::EvitandoInjectio($datos[$indice]));

                $indice++;
            } else {
                $query1.= $query[$i];
            }
        }
        return $query1;
    }

    public static function PrepareStatementBuscarTodos($query) {
        $indice = 0;
        $query1 = "";
        for ($i = 0; $i < strlen($query); $i++) {
            if ($query[$i] == "?") {
                $indice++;
            } else {
                $query1.= $query[$i];
            }
        }
        return $query1;
    }

    public static function PrepareStatementfiltro($query, $datos, $filtro, $operadorArit = '', $operadorLog = array()) {
        $bandera = 0;
        $query1 = "";
        if (count($datos) != count($filtro)) {
            return "Las matrices no son iguales";
        }
        if (count($filtro) != count($operadorArit)) {
            return "Las matrices no son iguales";
        }
        $cadbandera = '';
        for ($x = 0; $x <= count($filtro) - 1; $x++) {
            if ($filtro[$x] != "" or $filtro[$x] != 0) {
                $cadbandera.=$filtro[$x];
            }
        }
        if ($cadbandera == '') {
            return $query;
        }

        $contI = 0;
        $query1.=' WHERE ';


        for ($i = $contI; $i <= count($datos) - 1; $i++) {
            if ($filtro[$i] != "") {
                if ($bandera != 0) {

                    //$query1.= " and ";
                    $query1.=" " . self::operlog($operadorLog[$i]) . " ";
                }$bandera = 1;
                $query1.=" " . $filtro[$i] . " " . self::tipoBusqueda(self::EvitandoInjectio($datos[$i]), $operadorArit[$i]);
            }
        }

        return $query . $query1;
    }

   

    private static function operlog($operador) {
        switch ($operador) {
            case "or":
                return " or ";
                break;

            default: return " and ";
        }
    }

    private static function tipoBusqueda($datos, $operador) {
        switch ($operador) {
            case "like_%x%":
                return "like '%" . $datos . "%'";
                break;
            case "like_x%":
                return "like '" . $datos . "%'";
                break;
            case "like_%x":
                return "like '%" . $datos . "'";
                break;
            case "<>":
                return " <> " . $datos . " ";
                break;
            case "isNotNull":
                return $datos . " is not null";
                break;
            case "isNull":
                return $datos . " is null";
                break;
            case ">=":
                return " >= '" . $datos . "'";
                break;
            case "=":
                return " = '" . $datos . "'";
                break;
            case "<=":
                return " <= '" . $datos . "'";
                break;
            default: return "='" . $datos . "'";
        }
    }

  

   
    private static function EvitandoInjectio($var) {
        $var = str_ireplace("'", "a", $var);
        $var = str_ireplace("$", "b", $var);
        $var = str_ireplace(";", "c", $var);
        $var = str_ireplace("%", "d", $var);
        $var = str_ireplace("=", "ig", $var);
       // $var = mysql_real_escape_string($var);
        return $var;

       // return utf8_decode($var);
    }

    private static function HtmlEntities($var) {
        $var = str_ireplace("'", "a", $var);
        $var = str_ireplace("$", "b", $var);
        $var = str_ireplace(";", "c", $var);
        $var = str_ireplace("%", "d", $var);
        $var = str_ireplace("=", "ig", $var);
        $var = mysql_real_escape_string($var);
        return htmlentities($var);
    }

    public static function codificar($array) {
        $lista = array();
        $i = 0;
        foreach ($array as $k => $val) {

            $lista[$i] = htmlentities($val);
            $i++;
        }
        return $lista;
        // foreach ($lista as $k){echo "<br>".$k;}
    }

   

    public static function InsertaDocumentos($query, $documentos, $id) {
        $indice = 0;
        $queries = array();
        foreach ($documentos as $value) {
            $query1 = "";
            for ($i = 0; $i < strlen($query); $i++) {
                if ($query[$i] == "?") {
                        $query1.= (" '" . $value . "', '" .$id. "'");
                } else {
                    $query1.= $query[$i];
                }
            }
            $queries[$indice] = $query1;
            $indice++;
        }
        
        return $queries;
    }

}

?>