<?php
require_once "../modelos/tabla2Modelo.php";


class tabla2Controlador extends tabla2Modelo
{

    /*--------- Controlador agregar tabla2 ---------*/
    public function agregar_tabla2_controlador() {
        $Identit1 = mainModel::limpiar_cadena($_POST['ID_TABLA1']);
        $Nombre        = mainModel::limpiar_cadena($_POST['Nombre']);
        $Estado     = mainModel::limpiar_cadena($_POST['Estado_Civil']);
        $Fecha_Na     = mainModel::limpiar_cadena($_POST['Fecha_Nacimiento']);
        $cc     = mainModel::limpiar_cadena($_POST['cc']);
        $Peso     = mainModel::limpiar_cadena($_POST['Peso']);
        $Correo     = mainModel::limpiar_cadena($_POST['Email']);

        /*== comprobar campos vacios ==*/
        if ($Identit1 == "" || $Nombre == "" || $Estado == "" || $Fecha_Na == "" || $Correo == "") {
            header('Content-type:application/json;charset=utf-8');
            echo json_encode([
                'error' => [
                    'mensaje' => 'No llenaste todos los datos'
                ]
            ]);
            exit();
        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,15}", $Nombre)) {
            header('Content-type:application/json;charset=utf-8');    
            echo json_encode([
                'error' => [
                    'mensaje' => 'El nombre NO tiene el formato correcto'
                ]
            ]);
            exit();
        }
        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,10}", $Estado)) {
            header('Content-type:application/json;charset=utf-8');    
            echo json_encode([
                'error' => [
                    'mensaje' => 'El Estado Civil NO tiene el formato correcto'
                ]
            ]);
            exit();
        }
        if (mainModel::verificar_datos("[1-9]{1,17}", $cc)) {
            header('Content-type:application/json;charset=utf-8');    
            echo json_encode([
                'error' => [
                    'mensaje' => 'La Identificacion NO tiene el formato correcto'
                ]
            ]);
            exit();
        }
        if (mainModel::verificar_datos("[1-9.]{1,4}", $Peso)) {
            header('Content-type:application/json;charset=utf-8');    
            echo json_encode([
                'error' => [
                    'mensaje' => 'el Peso NO tiene el formato correcto'
                ]
            ]);
            exit();
        }
        /*__PROFE POR TIEMPO NO PUDE HACER EL MODIFICADOR DE LA FECHA A GUARDAR YA QUE EN LA BASE DE DATOS ESTA AL CONTRARIO PERO POR EL INPUT 
        DATE SI LO GUARDA -- IGUAL AQUI LE DEJO MEDIO EL METODO PERO NO SE USARA YA QUE NO GUARDARA LA FECHA, AQUI SOLO SE COMPRUEBA Y SI QUITA 
        EL COMENTARIO SE DARA CUENTA, PERO AL REVISAR LA BASE DE DATOS LA FECHA SERA 0000-00-00 
        if (mainModel::verificar_fecha($Fecha_Na)) {
            header('Content-type:application/json;charset=utf-8');    
            echo json_encode([
                'error' => [
                    'mensaje' => 'Fecha NO tiene el formato correcto'
                ]
            ]);
            exit();
        }*/

        /*== Comprobando Correo ==*/
        $check_correo = mainModel::ejecutar_consulta_simple("SELECT Email FROM tabla2 WHERE Email='$Correo'");
        if ($check_correo->rowCount() > 0) {
            header('Content-type:application/json;charset=utf-8');
            echo json_encode([
                'error' => [
                    'mensaje' => 'El correo: ' . $Correo . ' ya se ah registrado anteriormente encuentra registrada en el sistema'
                ]
            ]);
            exit();
        }
        // AQUI CAMBIARIA EL FORMATO  $fecha=date_format()

        $datos_tabla1_reg = [
            "ID_TABLA1" => $Identit1,
            "Nombre" => $Nombre,
            "Estado_Civil" => $Estado,
            "Fecha_Nacimiento" => $Fecha_Na,
            "cc" => $cc,
            "Peso" => $Peso,
            "Email" => $Correo

        ];

        $agregar_tabla1 = tabla2Modelo::agregar_tabla2_modelo($datos_tabla1_reg);

        if ($agregar_tabla1->rowCount() == 1) {
            echo "<script language='JavaScript'>
           alert('Los datos fueros de " . $Nombre . " guardados correctamente');
           location.assign('../tabla2.php');</script>";
        } else {
            echo "<script language='JavaScript'>
            alert('ERROR:Los datos NO fueros guardados correctamente');
            location.assign('../tabla2.php');</script>";
        }
    }/*==fin de controlador=*/

    //CONTROLADOR PARA ACTUALIZAR DATOS DE LA TABLA1
    public function tabla2_update_controlador() {
        $id = $_POST['ID2'];


        $check_tabla2 = mainModel::ejecutar_consulta_simple("SELECT ID FROM tabla2 WHERE ID='$id'");
        if ($check_tabla2->rowCount() <= 0) {
            header('Content-type:application/json;charset=utf-8');
            echo json_encode([
                'error' => [
                    'mensaje' => 'El dato no fue encontrado'
                ]
            ]);
            exit();
        }
        $id = mainModel::limpiar_cadena($_POST['ID2']);
        $Identit1 = mainModel::limpiar_cadena($_POST['ID_TABLA1_A']);
        $Nombre        = mainModel::limpiar_cadena($_POST['Nombre_A']);
        $Estado     = mainModel::limpiar_cadena($_POST['Estado_Civil_A']);
        $Fecha_Na     = mainModel::limpiar_cadena($_POST['Fecha_Nacimiento_A']);
        $cc     = mainModel::limpiar_cadena($_POST['cc_A']);
        $Peso     = mainModel::limpiar_cadena($_POST['Peso_A']);
        $Correo     = mainModel::limpiar_cadena($_POST['Email_A']);

        $datos_tabla2_up = [
            "ID2" => $id,
            "ID_TABLA1" => $Identit1,
            "Nombre" => $Nombre,
            "Estado_Civil" => $Estado,
            "Fecha_Nacimiento" => $Fecha_Na,
            "cc" => $cc,
            "Peso" => $Peso,
            "Email" => $Correo

        ];

        $actualizar_tabla2 = tabla2Modelo::update_tabla2_modelo($datos_tabla2_up);

        if ($actualizar_tabla2->rowCount() == 1) {
            echo "<script language='JavaScript'>
            alert('Los dato de " . $Nombre . " fueron actualizado correctamente');
            location.assign('../tabla2.php');</script>";
        } else {
            echo "<script language='JavaScript'>
            alert('Error: Intentelo mas tarde');
            location.assign('../tabla2.php');</script>";
        }
    }


    //Controlador para eliminar 
    public function eliminar_tabla2_controlador(){
        $id=$_GET['IDE'];
        $id=mainModel::limpiar_cadena($id);
    
        $check_tabla1=mainModel::ejecutar_consulta_simple("SELECT ID FROM tabla2 WHERE ID='$id'");
        if($check_tabla1->rowCount()<=0){
            header('Content-type:application/json;charset=utf-8');    
                echo json_encode([
                    'error' => [
                        'mensaje' => 'El dato no fue encontrado'
                    ]
                ]);
                exit();
        }
    
        $eliminar_tabla2=tabla2Modelo::eliminar_tabla2_modelo($id);
        
        if($eliminar_tabla2->rowCount()==1){
            echo "<script language='JavaScript'>
                alert('El dato  fue eliminado correctamente');
                location.assign('../tabla2.php');</script>";
        }else{
            echo "<script language='JavaScript'>
                alert('Error: Intentelo mas tarde');
                location.assign('../tabla2.php');</script>";
        }
    
    }

}
