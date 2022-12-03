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

    <div class="container mt-5">
        <form action="./REPORTES2.PHP" method="post">
            <h4 class="display-3 text-center mt-3">Búsqueda por Fecha</h4>

            <p> <strong>
                    Fecha comienzo: 
                </strong> 
            </p>
            
            <input class="form-control mb-3" type="date" id="start_date" name="start_date"  > 

            <p> <strong>
                    Fecha Final: 
                </strong> 
            </p>


            <input class="form-control mb-3" type="date" id="end_date" name="end_date"><br />

            
            <input class="btn btn-primary" type="submit" id="btn_submit" value="Generar Reporte"><br>

        </form>
    </div>


  
</body>

</html>