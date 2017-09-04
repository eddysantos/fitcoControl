<?php

  $servername = "localhost";
  $db_user = "root";
  $db_pass = "root";
  $db = "Fitco";
  $port = 8888;

//  $conn = mysqli_connect($servername,$db_user,$db_pass,$db,$port) or die("Conexion sin exito" . mysqli_error($conn));
  $conn = new mysqli(
    $servername,
    $db_user,
    $db_pass,
    $db,
    $port
    ) or die ("Error al conectarse a la base de datos: " . $conn->error);

?>
