<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once "vista/inc/Link.php"; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla 1</title>
</head>
<body>
<!--  <div class="container text-center">
    <div class="row justify-content-center">
 <div class="col-4" >
 <a type="button" class="btn btn-primary" href="index.php">Inicio</a>
 </div>
 <div class="col-4" >
 <a type="button" class="btn btn-primary" href="tabla1create.php">Añadir Nuevo</a>
 </div>


 </div>    -->


 
 <nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Home</a>

      <div class="d-flex">
        <a type="button" class="btn btn-primary" href="tabla1.php">Tabla 1</a>
        <a type="button" class="btn btn-primary" href="tabla2.php">Tabla 2</a>
        <a type="button" class="btn btn-primary" href="reportes.php">Reporte</a>

      </div>

    </div>
  </nav>


<div class="container mt-5">

<div class="my-3" >
 <a type="button" class="btn btn-primary" href="tabla1create.php">Añadir Nuevo</a>
 </div>

<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">descripcion</th>
      <th scope="col">Clase</th>
      <th scope="col">Salon</th>
      <th scope="col">Operaciones</th>
    </tr>
    <?php
    
    require_once "./modelos/tabla1Modelo.php";
   
    $ins_tabla1 = new tabla1Modelo();
    $results=tabla1Modelo::ver_tabla1_modelo();
        
    foreach($results as $filas){
    ?>
  </thead>
 
  <tbody>
    <td><?php echo $filas['ID_TABLA1']?></td>
    <td><?php echo $filas['descripcion']?></td>
    <td><?php echo $filas['Clase']?></td>
    <td><?php echo $filas['Salon']?></td>
    <td> <?php echo "<button type='button' class='btn btn-warning'><a href='./Tablas/Tabla1R.php?ID=".$filas['ID_TABLA1']."'>Eliminar</a></button>"?>
    <?php echo "<button type='button' class='btn btn-danger'><a href='./tabla1update.php?ID=".$filas['ID_TABLA1']."'>Actualizar</a></button>"?>
  
  </td>

  </tbody>
  <?php
}
?>
</table>
</div>
<?php require_once "vista/inc/Scrips.php"; ?>
</body>
</html>
   