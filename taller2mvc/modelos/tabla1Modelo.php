<?php

require_once "mainModel.php";

class tabla1Modelo extends mainModel
{

  /*-Modelo para agregar tabla 1--*/

  protected static function agregar_tabla1_modelo($datos)
  {
    $sql = mainModel::conectar()->prepare("INSERT INTO tabla1(descripcion, Clase, Salon) VALUES (?,?,?)");

    $sql->execute([
      $datos['descripcion'],
      $datos['Clase'],
      $datos['Salon']
    ]);

    return $sql;
  }

  /*-Modelo para eliminar de tabla 1--*/
  protected static function eliminar_tabla1_modelo($id)
  {
    $sql = mainModel::conectar()->prepare("DELETE FROM tabla1 WHERE ID_TABLA1 =:ID_e");
    $sql->bindParam(":ID_e", $id);
    $sql->execute();
    return $sql;
  }

  /*= Modelo seleccionador de datos =*/
  protected static function datos_tabla1_modelo($id)
  {
    $sql = mainModel::conectar()->prepare("SELECT FROM tabla1 WHERE ID =:ID");
    $sql->bindParam(':ID', $id);
    $sql->execute();
    return $sql;
  }

  /*==Modelo para actualizar tabla=*/
  protected static function update_tabla1_modelo($datos)
  {
    $sql = mainModel::conectar()->prepare("UPDATE tabla1 SET  ID_TABLA1 =:ID, descripcion = :ddd,  Clase = :ccc, Salon = :sss WHERE ID_TABLA1 = :ID");
    $sql->bindParam(':ID', $datos['ID_A']);
    $sql->bindParam(':ddd', $datos['descripcion_A']);
    $sql->bindParam(':ccc', $datos['Clase_A']);
    $sql->bindParam(':sss', $datos['Salon_A']);
    $sql->execute();
    return $sql;
  }

  public static function ver_tabla1_modelo()
  {
    $sql = mainModel::conectar()->prepare("SELECT * FROM tabla1 ");
    $sql->execute();

    return $sql;
  }
}
