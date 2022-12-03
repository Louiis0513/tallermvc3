<?php 
require_once "../modelos/tabla1Modelo.php";


class tabla1Controlador extends tabla1Modelo
{

 /*--------- Controlador agregar tabla1 ---------*/
 public function agregar_tabla1_controlador(){
     $descripcion = mainModel::limpiar_cadena($_POST['descripcion']);
     $Clase = mainModel::limpiar_cadena($_POST['Clase']);
     $Salon = mainModel::limpiar_cadena($_POST['Salon']);

     /*== comprobar campos vacios ==*/
     if($descripcion == "" || $Clase == "" || $Salon == "") {
        header('Content-type:application/json;charset=utf-8');    
         echo json_encode([
             'error' => [
                 'mensaje' => 'No llenaste todos los datos'
             ]
         ]);
         exit();
        }

        /*== Verificando integridad de los datos ==*/
        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}", $descripcion)) {
            header('Content-type:application/json;charset=utf-8');    
            echo json_encode([
                'error' => [
                    'mensaje' => 'La descripcion NO tiene el formato correcto'
                ]
            ]);
            exit();
        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}", $Clase)) {
            header('Content-type:application/json;charset=utf-8');    
            echo json_encode([
                'error' => [
                    'mensaje' => 'La clase NO tiene el formato correcto'
                ]
            ]);
            exit();
        }

        if (mainModel::verificar_datos("[1-9A-B]{1,6}", $Salon)) {
            header('Content-type:application/json;charset=utf-8');    
            echo json_encode([
                'error' => [
                    'mensaje' => 'La Salon NO tiene el formato correcto'
                ]
            ]);
            exit();
        }
         /*== Comprobando descripcion ==*/
         $check_descripcion = mainModel::ejecutar_consulta_simple("SELECT descripcion FROM tabla1 WHERE descripcion='$descripcion'");
         if ($check_descripcion->rowCount() > 0) {
            header('Content-type:application/json;charset=utf-8');    
            echo json_encode([
                'error' => [
                    'mensaje' => 'La Descripcion ya se encuentra registrada en el sistema'
                ]
            ]);
            exit();
         }
 
         /*== Comprobando Clase ==*/
         $check_Clase = mainModel::ejecutar_consulta_simple("SELECT Clase FROM tabla1 WHERE Clase='$Clase'");
         if ($check_Clase->rowCount() > 0) {
            header('Content-type:application/json;charset=utf-8');    
            echo json_encode([
                'error' => [
                    'mensaje' => 'La Clase ya se encuentra registrada en el sistema'
                ]
            ]);
            exit();
         }
 
         /*== Comprobando Salon ==*/
         $check_Salon = mainModel::ejecutar_consulta_simple("SELECT Salon FROM tabla1 WHERE Salon='$Salon'");
         if ($check_Salon->rowCount() > 0) {
            header('Content-type:application/json;charset=utf-8');    
            echo json_encode([
                'error' => [
                    'mensaje' => 'La Salon ya se encuentra registrada en el sistema'
                ]
            ]);
            exit();
         }

         $datos_tabla1_reg = [
            "descripcion" => $descripcion,
            "Clase" => $Clase,
            "Salon" => $Salon

        ];

        $agregar_tabla1 = tabla1Modelo::agregar_tabla1_modelo($datos_tabla1_reg);

        var_dump($agregar_tabla1);

        if($agregar_tabla1->rowCount() == 1){
            echo "<script language='JavaScript'>
            alert('Los datos fueros de la clase ".$Clase." guardados correctamente');
            location.assign('../tabla1.php');</script>";
          }else{
             echo "<script language='JavaScript'>
             alert('ERROR:Los datos NO fueros guardados correctamente');
             location.assign('../tabla1.php');</script>";
          }

 }/*==fin de controlador=*/

 /*--------- Controlador eliminar tabla1 ---------*/
 public function eliminar_tabla1_controlador(){
    $id=$_GET['ID'];
    $id=mainModel::limpiar_cadena($id);

    $check_tabla1=mainModel::ejecutar_consulta_simple("SELECT ID_TABLA1 FROM tabla1 WHERE ID_TABLA1='$id'");
    if($check_tabla1->rowCount()<=0){
        header('Content-type:application/json;charset=utf-8');    
            echo json_encode([
                'error' => [
                    'mensaje' => 'El dato no fue encontrado'
                ]
            ]);
            exit();
    }

    $eliminar_tabla1=tabla1Modelo::eliminar_tabla1_modelo($id);
    
    if($eliminar_tabla1->rowCount()==1){
        echo "<script language='JavaScript'>
            alert('El dato  fue eliminado correctamente');
            location.assign('../tabla1.php');</script>";
    }else{
        echo "<script language='JavaScript'>
            alert('Error: Intentelo mas tarde');
            location.assign('../tabla1.php');</script>";
    }

}

//CONTROLADOR PARA ACTUALIZAR DATOS DE LA TABLA1
public function tabla1_update_controlador(){
    $id=$_POST['ID_A'];
    
    
    $check_tabla1=mainModel::ejecutar_consulta_simple("SELECT ID_TABLA1 FROM tabla1 WHERE ID_TABLA1='$id'");
    if($check_tabla1->rowCount()<=0){
        header('Content-type:application/json;charset=utf-8');    
            echo json_encode([
                'error' => [
                    'mensaje' => 'El dato no fue encontrado'
                ]
            ]);
            exit();
    }
    $id=mainModel::limpiar_cadena($id);
    $descripcion = mainModel::limpiar_cadena($_POST['descripcion_A']);
    $Clase = mainModel::limpiar_cadena($_POST['Clase_A']);
    $Salon = mainModel::limpiar_cadena($_POST['Salon_A']);

    /*== Verificando integridad de los datos ==*/
    if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}", $descripcion)) {
        header('Content-type:application/json;charset=utf-8');    
        echo json_encode([
            'error' => [
                'mensaje' => 'La descripcion NO tiene el formato correcto'
            ]
        ]);
        exit();
    }

    if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}", $Clase)) {
        header('Content-type:application/json;charset=utf-8');    
        echo json_encode([
            'error' => [
                'mensaje' => 'La clase NO tiene el formato correcto'
            ]
        ]);
        exit();
    }

    if (mainModel::verificar_datos("[1-9]{1,6}", $Salon)) {
        header('Content-type:application/json;charset=utf-8');    
        echo json_encode([
            'error' => [
                'mensaje' => 'La Salon NO tiene el formato correcto'
            ]
        ]);
        exit();
    }

   

    $datos_tabla1_up = [
        "ID_A"=>$id,
        "descripcion_A" => $descripcion,
        "Clase_A" => $Clase,
        "Salon_A" => $Salon

    ];
    $actualizar_tabla1 = tabla1Modelo::update_tabla1_modelo($datos_tabla1_up);

    if ($actualizar_tabla1->rowCount() == 1) {
        echo "<script language='JavaScript'>
            alert('El dato del la clase ".$Clase." fueron actualizado correctamente');
            location.assign('../tabla1.php');</script>";
    } else {
        echo "<script language='JavaScript'>
            alert('Error: Intentelo mas tarde');
            location.assign('../tabla1.php');</script>";
    }
    
}
 

}