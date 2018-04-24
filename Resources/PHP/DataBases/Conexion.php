<?php

// *** ESTA BD Es la del servidor de pruebas **** //
$servername = "127.0.0.1";
$db_user = "root";
$db_pass = "root";
$db = "Fitco";
$port = 8889;

// $db = 'Fitco';
// $servername = '10.1.4.10';
// $port = 3306;
// $db_user = 'prolog';
// $db_pass = 'f4Tnps.03';

//  $conn = mysqli_connect($servername,$db_user,$db_pass,$db,$port) or die("Conexion sin exito" . mysqli_error($conn));
  $conn = new mysqli(
    $servername,
    $db_user,
    $db_pass,
    $db,
    $port
    ) or die ("Error al conectarse a la base de datos: " . $conn->error);





?>
