<?php

if(isset($_POST['descripcion']) || isset($_POST['ID'])|| isset($_POST['ID_A'])|| isset($_POST['start_date'])){
    require_once "../controladores/tabla1Controlador.php";
   $ins_tabla1 = new tabla1Controlador();

if(isset($_POST['descripcion']) && isset($_POST['Clase'])){
    echo $ins_tabla1->agregar_tabla1_controlador();
     }

     
         if(isset($_POST['ID_A'])){
            echo $ins_tabla1->tabla1_update_controlador();
             }

}
if(isset($_GET['ID'])){
    require_once "../controladores/tabla1Controlador.php";
   $ins_tabla1 = new tabla1Controlador();

     if(isset($_GET['ID'])){
        echo $ins_tabla1->eliminar_tabla1_controlador();
         }
         

}

//Tabla 2 
if(isset($_POST['Estado_Civil']) || isset($_POST['Fecha_Nacimiento'])|| isset($_POST['Peso'])|| isset($_POST['ID2'])){
    require_once "../controladores/tabla2Controlador.php";
   $ins_tabla2 = new tabla2Controlador();

if(isset($_POST['Nombre']) && isset($_POST['cc'])){
    echo $ins_tabla2->agregar_tabla2_controlador();
     }

     
         if(isset($_POST['ID2'])){
            echo $ins_tabla2->tabla2_update_controlador();
             }

}
if(isset($_GET['IDE'])){
    require_once "../controladores/tabla2Controlador.php";
   $ins_tabla2 = new tabla2Controlador();

     if(isset($_GET['IDE'])){
        echo $ins_tabla2->eliminar_tabla2_controlador();
         }
         

}

//reporte
if(isset($_POST['start_date'])){
    require_once "../controladores/reporteControlador.php";
   $ins_reporte = new reporteControlador();

   if(isset($_POST['start_date'])){
    echo $ins_reporte->reporte_tabla1_controlador();
     }

}