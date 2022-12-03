<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once "vista/inc/Link.php"; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
</head>

<body>
    
    
<nav class="navbar navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="index.php">Home</a>

      <div class="d-flex">
        <a type="button" class="btn btn-primary" href="tabla1.php">Tabla 1</a>
        <a type="button" class="btn btn-primary" href="tabla2.php">Tabla 2</a>
        <a type="button" class="btn btn-primary" href="reportes.php">Reporte</a>

      </div>

    </div>
  </nav>
    <?php
    /* require_once "modelos/reporteModelo.php";
    $ins_tabla1 = new reporteModelo();
   $resultado=reporteModelo::filtrar_reporte_modelo(); */
    ?>

    <div class="container-fluid mt-5">

    <h4 class="display-3 text-center mt-3">Reporte</h4>

        <table class="table table-dark table-striped mt-3">
        <thead>
            <tr>
            <th scope="col">ID Tabla1</th>
            <th scope="col">descripcion</th>
            <th scope="col">Clase</th>
            <th scope="col">Salon</th>

            <th scope="col">ID Table2</th>
            <th scope="col">FK Tabla2</th>
            <th scope="col">Nombre</th>
            <th scope="col">Estado Civil</th>
            <th scope="col">Cedula</th>
            <th scope="col">Correo</th>
            <th scope="col">Fecha Nacimiento</th>
            <th scope="col">Fecha Registro</th>
 
            </tr>
          
        </thead>

        <?php
        require_once "modelos/reporteModelo.php";

        $repo = new reporteModelo();

        $results = $repo->filtrar_reporte_modelo($_POST['start_date'],$_POST['end_date']);

        $results = json_decode($results);

        #var_dump($results[0]);

        foreach ($results as $filas => $value) {
        
            $id = $results[$filas]->ID;
            $idtabla1 = $results[$filas]->ID_TABLA1;
            $nombre      = $results[$filas]->Nombre;
            $EstadoC = $results[$filas]->Estado_Civil;
            $Fecha_Na = $results[$filas]->Fecha_Nacimiento;
            $CC = $results[$filas]->cc;
            $Peso = $results[$filas]->Peso;
            $Correo = $results[$filas]->Email;
            $Fecha_Re = $results[$filas]->fecha_registro;
            
            $descripcion = $results[$filas]->descripcion;
            $Clase = $results[$filas]->Clase;
            $Salon = $results[$filas]->Salon;


        ?>

            <div class="container-fluid">
                </thead>

                <tbody>
                    <td><?php echo $idtabla1 ?></td>
                    <td><?php echo $descripcion ?></td>
                    <td><?php echo $Clase ?></td>
                    <td><?php echo $Salon ?></td>
                    
                    <td><?php echo $id ?></td>
                    <td><?php echo $idtabla1 ?></td>
                    <td><?php echo $nombre ?></td>
                    <td><?php echo $EstadoC ?></td>
                    <td><?php echo $CC ?></td>
                    <td><?php echo $Correo ?></td>
                    <td><?php echo $Fecha_Na ?></td>
                    <td><?php echo $Fecha_Re ?></td>

                </tbody>
            <?php
        }
            ?>
            </table>
            </div>
            <?php require_once "vista/inc/Scrips.php"; ?>
      
   
</body>

</html>