<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>

<body>


    <?php
    require_once "modelos/mainModel.php";
    $ins_tabla1 = new mainModel();
    $id = $_GET['ID'];

    $sql = "SELECT * FROM tabla1 WHERE ID_TABLA1='" . $id . "' ";
    $statement = $ins_tabla1::conectar()->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $filas) {
        $id = $filas['ID_TABLA1'];
        $Descripcion = $filas['descripcion'];
        $Clase        = $filas['Clase'];
        $Salon     = $filas['Salon'];
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




    <div class="container mt-5">

    <h1 class="my-5 text-center display-3" >Editar Registro Tabla 1</h1>

        <form action="./Tablas/Tabla1R.php" method="post">

            <input type="hidden" name="ID_A" value="<?php echo $id; ?> " readonly>

            <label for="">
                <strong>

                    Descripcion 
                </strong>
            </label>

            <input class="form-control my-3" type="text" name="descripcion_A" value="<?php echo $Descripcion; ?>">

            <label for="">
                <strong>

                    Clase 
                </strong>
            </label>

            <input class="form-control mb-3" type="text" name="Clase_A" value="<?php echo $Clase; ?>">

            <label for="">
                <strong>
                    Salon
                </strong>
            </label>
            <input class="form-control mb-3" type="text" name="Salon_A" value="<?php echo $Salon; ?>">

            
            <input class="btn btn-primary" type="submit" value="ACTUALIZAR"><br>
        <?php
    } ?>
    </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>