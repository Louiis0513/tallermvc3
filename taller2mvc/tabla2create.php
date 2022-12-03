<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "vista/inc/Link.php"; ?>
    <title>AñadirT2</title>
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



    <div class="container mt-5">
    <h1 class="my-5 text-center display-3" >Crear Registro Tabla 2</h1>
        <div class="mb-3">
            <form action="./Tablas/Tabla1R.php" method="post">
                <input class="form-control mb-3" type="text" name="ID_TABLA1" placeholder="ID TABLA1">
                <input class="form-control mb-3" type="text" name="Nombre" placeholder="Nombre">
                <input class="form-control mb-3" type="text" name="Estado_Civil" placeholder="Estado Civil">
                <input class="form-control mb-3" type="date" name="Fecha_Nacimiento" placeholder="DD/MM/AAAA">
                <input class="form-control mb-3" type="text" name="cc" placeholder="identificacion">
                <input class="form-control mb-3" type="text" name="Peso" placeholder="Peso">
                <input class="form-control mb-3" type="text" name="Email" placeholder="Correo">
                <input class="btn btn-primary" type="submit" name="enviar" value="Enviar">

            </form>
        </div>
    </div>
    <?php require_once "vista/inc/Scrips.php"; ?>
</body>

</html>