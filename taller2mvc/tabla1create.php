<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "vista/inc/Link.php"; ?>
    <title>AñadirT1</title>
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




    <div class="container mt-5 ">
        <h1 class="my-5 text-center display-3" >Crear Registro Tabla 1</h1>
        <form action="./Tablas/Tabla1R.php" method="post">
            
            <div class="mb-3">
                <input class="form-control mb-3" type="text" name="descripcion" placeholder="Descripcion">
                <input class="form-control mb-3" type="text" name="Clase" placeholder="Clase">
                <input class="form-control mb-3" type="text" name="Salon" placeholder="Salon">
                <input class="btn btn-primary" type="submit" name="enviar" value="AGREGAR">
            </div>

        </form>
    </div>


   
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>