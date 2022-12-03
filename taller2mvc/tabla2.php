<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once "vista/inc/Link.php"; ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla 2</title>
</head>
<body>
<!--  <div class="container text-center">
    <div class="row justify-content-center">
 <div class="col-4" >
 <a type="button" class="btn btn-primary" href="index.php">Inicio</a>
 </div>
 <div class="col-4" >
 <a type="button" class="btn btn-primary" href="tabla2create.php">Añadir Nuevo</a>
 </div>
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

<div class="container-fluid mt-5">

<div class="my-3" >
 <a type="button" class="btn btn-primary" href="tabla2create.php">Añadir Nuevo</a>
 </div>

<table class="table table-dark table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">ID Tabla1</th>
      <th scope="col">Nombre</th>
      <th scope="col">Estado Civil</th>
      <th scope="col">Cedula</th>
      <th scope="col">Correo</th>
      <th scope="col">Peso</th>
      <th scope="col">Fecha Registro</th>
      <th scope="col">Fecha Nacimiento</th>
      <th scope="col">Operaciones</th>
    </tr>
    <?php
    
    require_once "./modelos/tabla2Modelo.php";
   
    $ins_tabla2 = new tabla2Modelo();
    $results=tabla2Modelo::ver_tabla2_modelo();
        
    foreach($results as $filas){
    ?>
  </thead>
 
  <tbody>
    <td><?php echo $filas['ID']?></td>
    <td><?php echo $filas['ID_TABLA1']?></td>
    <td><?php echo $filas['Nombre']?></td>
    <td><?php echo $filas['Estado_Civil']?></td>
    <td><?php echo $filas['cc']?></td>
    <td><?php echo $filas['Peso']?></td>
    <td><?php echo $filas['Email']?></td>
    <td><?php echo $filas['fecha_registro']?></td>
    <td><?php echo $filas['Fecha_Nacimiento']?></td>
    <td> <?php echo "<button type='button' class='btn btn-warning'><a href='./tabla2update.php?ID=".$filas['ID']."'>Editar</a></button>"?>
    <?php echo "<button type='button' class='btn btn-danger'><a href='./Tablas/Tabla1R.php?IDE=".$filas['ID']."'>Eliminar</a></button>"?>
  
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