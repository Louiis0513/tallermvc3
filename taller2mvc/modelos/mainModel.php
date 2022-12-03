<?php


class mainModel
{

    /*-----Funcion para conectar a la base de datos---*/
    public static function conectar()
    {
        $conexion = new PDO('mysql:host=localhost;dbname=db_taller', 'root', '');
        $conexion->exec("SET CHARACTER SET utf8");
        return $conexion;
    }

    /*-----Funcion para ejecutar consultas simples---*/
    protected static function ejecutar_consulta_simple($consulta)
    {
        $sql = self::conectar()->prepare($consulta);
        $sql->execute();
        return $sql;
    }

    protected static function limpiar_cadena($cadena)
    {
        $cadena = trim($cadena);
        $cadena = stripslashes($cadena);
        $cadena = str_ireplace("<cript>", "", $cadena);
        $cadena = str_ireplace("<cript src", "", $cadena);
        $cadena = str_ireplace("<cript type=", "", $cadena);
        $cadena = str_ireplace("SELECT * FROM", "", $cadena);
        $cadena = str_ireplace("DELETE * FROM", "", $cadena);
        $cadena = str_ireplace("UPDATE * FROM", "", $cadena);
        $cadena = str_ireplace("INSERT * FROM", "", $cadena);
        $cadena = str_ireplace("DROP TABLE", "", $cadena);
        $cadena = str_ireplace("DROP DATABASE", "", $cadena);
        $cadena = str_ireplace("TRUNCATE TABLE", "", $cadena);
        $cadena = str_ireplace("SHOW TABLES", "", $cadena);
        $cadena = str_ireplace("SHOW DATABASE", "", $cadena);
        $cadena = str_ireplace("?>", "", $cadena);
        $cadena = str_ireplace("--", "", $cadena);
        $cadena = str_ireplace(">", "", $cadena);
        $cadena = str_ireplace("<", "", $cadena);
        $cadena = str_ireplace("[", "", $cadena);
        $cadena = str_ireplace("]", "", $cadena);
        $cadena = str_ireplace("^", "", $cadena);
        $cadena = str_ireplace("==", "", $cadena);
        $cadena = str_ireplace(";", "", $cadena);
        $cadena = str_ireplace("::", "", $cadena);
        $cadena = stripslashes($cadena);
        $cadena = trim($cadena);
        return $cadena;
    }

    /*____ Funcios para verificar datos__*/
    protected static function verificar_datos($filto, $cadena)
    {
        if (preg_match("/^" . $filto . "$/", $cadena)) {
            return false;
        } else {
            return true;
        }
    }
    /*____ Funcios para verificar fechas__*/
    protected static function verificar_fecha($fecha)
    {
        $valores = explode("/", $fecha);
        if (count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])) {
            return false;
        } else {
            return true;
        }
    }
}
