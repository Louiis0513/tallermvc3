<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php require_once "vista/inc/Link.php"; ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar2</title>
</head>

<body>

    <?php
    require_once "modelos/mainModel.php";
    $ins_tabla1 = new mainModel();
    $id = $_GET['ID'];

    $sql = "SELECT * FROM tabla2 WHERE ID='" . $id . "' ";
    $statement = $ins_tabla1::conectar()->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $filas) {
        $id = $filas['ID'];
        $idtabla1 = $filas['ID_TABLA1'];
        $nombre      = $filas['Nombre'];
        $EstadoC = $filas['Estado_Civil'];
        $Fecha_Na = $filas['Fecha_Nacimiento'];
        $CC = $filas['cc'];
        $Peso = $filas['Peso'];
        $Correo = $filas['Email'];

    ?>



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


        <div class="container my-5 ">

            <h1 class="my-5 text-center display-3" >Editar Registro Tabla 1</h1>

            <form action="./Tablas/Tabla1R.php" method="POST">

                <input type="hidden" name="ID2" value="<?php echo $id; ?>" readonly>

                <label for="">
                    <strong>

                    Id Pk tabla1
                    </strong>
                </label>

                <input class="form-control mb-3" type="text" name="ID_TABLA1_A" value="<?php echo $idtabla1; ?>">

                
                <label for="">
                    <strong>

                    Nombre
                    </strong>
                </label>

                <input class="form-control mb-3" type="text" name="Nombre_A" value="<?php echo $nombre; ?>">


                <label for="">
                    <strong>

                    Estado Civil
                    </strong>
                </label>

                <input class="form-control mb-3" type="text" name="Estado_Civil_A" value="<?php echo $EstadoC; ?>">


                <label for="">
                    <strong>

                    Fecha Nacimiento
                    </strong>
                </label>

                <input class="form-control mb-3" type="date" name="Fecha_Nacimiento_A" value="<?php echo $Fecha_Na; ?>">

                
                <label for="">
                    <strong>

                    Documento
                    </strong>
                </label>

                <input class="form-control mb-3" type="text" name="cc_A" value="<?php echo $CC; ?>">


                
                <label for="">
                    <strong>

                    Peso (Kg)
                    </strong>
                </label>

                <input class="form-control mb-3" type="text" name="Peso_A" value="<?php echo $Peso; ?>">

                
                <label for="">
                    <strong>

                    Correo
                    </strong>
                </label>

                <input class="form-control mb-3" type="email" name="Email_A" value="<?php echo $Correo; ?>">

                <input class="btn btn-primary" type="submit" value="Actualizar">


            <?php } ?>
     
            </from>
        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>