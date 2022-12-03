<?php

require_once "mainModel.php";

class reporteModelo extends mainModel{
    public function filtrar_reporte_modelo($fecha_ini,$fecha_fin)
    {
      $sql = mainModel::conectar()->prepare("SELECT * FROM `tabla2` inner join tabla1 on tabla2.ID_TABLA1 = tabla1.ID_TABLA1 WHERE Fecha_Nacimiento BETWEEN :a AND :b");
      $sql->bindParam(":a", $fecha_ini);
      $sql->bindParam(":b", $fecha_fin);
      $sql->execute();
      $results = $sql->fetchAll(PDO::FETCH_ASSOC);

      return json_encode($results);
    }
   

}