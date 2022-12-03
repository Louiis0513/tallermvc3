<?php

require_once "mainModel.php";

class tabla2Modelo extends mainModel
{

        /*-Modelo para agregar tabla 1--*/

        protected static function agregar_tabla2_modelo($datos)
        {
                $sql = mainModel::conectar()->prepare("INSERT INTO tabla2(ID_TABLA1,Nombre,Estado_civil,fecha_registro,Fecha_Nacimiento,cc,Peso,Email)VALUES(:ID_T,:NN,:ES,NOW(),:FN,:IDN,:P,:CP)");

                $sql->bindParam(':ID_T', $datos['ID_TABLA1']);
                $sql->bindParam(':NN', $datos['Nombre']);
                $sql->bindParam(':ES', $datos['Estado_Civil']);
                $sql->bindParam(':FN', $datos['Fecha_Nacimiento']);
                $sql->bindParam(':IDN', $datos['cc']);
                $sql->bindParam(':P', $datos['Peso']);
                $sql->bindParam(':CP', $datos['Email']);
                $sql->execute();

                return $sql;
        }
        //modelo para ver tabla 2
        public static function ver_tabla2_modelo()
        {
                $sql = mainModel::conectar()->prepare("SELECT * FROM tabla2 ");
                $sql->execute();

                return $sql;
        }

        /*==Modelo para actualizar tabla=*/
        protected static function update_tabla2_modelo($datos)
        {
                $sql = mainModel::conectar()->prepare("UPDATE tabla2 SET ID_TABLA1 = :A,  Nombre = :B, Estado_civil = :C, fecha_registro = NOW(), Fecha_nacimiento = :FN, cc = :F, Peso = :P, Email = :H  WHERE ID = :ID2");
                $sql->bindParam(':ID2', $datos['ID2']);
                $sql->bindParam(':A', $datos['ID_TABLA1']);
                $sql->bindParam(':B', $datos['Nombre']);
                $sql->bindParam(':C', $datos['Estado_Civil']);
                $sql->bindParam(':FN', $datos['Fecha_Nacimiento']);
                $sql->bindParam(':F', $datos['cc']);
                $sql->bindParam(':P', $datos['Peso']);
                $sql->bindParam(':H', $datos['Email']);
                $sql->execute();
                return $sql;
        }

        protected static function eliminar_tabla2_modelo($id)
  {
    $sql = mainModel::conectar()->prepare("DELETE FROM tabla2 WHERE ID =:IDE");
    $sql->bindParam(":IDE", $id);
    $sql->execute();
    return $sql;
  }
}
