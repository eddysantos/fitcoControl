<?php

session_start();
$root = $_SERVER['DOCUMENT_ROOT'];

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

$usuario = $conn->real_escape_string($_POST['lg_usuario']);
$contra = $conn->real_escape_string($_POST['lg_password']);
$response = array(
  "code"=>"",
  "msg"=>"",
  "data"=>"",
);

// $query = $conn->query("SELECT * FROM usuarios WHERE usrUsuario = '$usuario' AND contraUsuario = '$contra'");
  $query = $conn->query("SELECT * FROM usuarios_1 WHERE usrUsuario = '$usuario' AND contraUsuario = '$contra'");

  $results = $query->num_rows;

  if ($results == 1) {
    $_SESSION['user'] = $query->fetch_assoc();
    $response['code'] = "1";
    $response = json_encode($response);
    echo $response;
    die();
  } else {
    $response['code']="200";
    $response['msg']="El usuario o contraseña es incorrecto";
    $response['data'] = mysqli_error($conn);
  }
  
  $response = json_encode($response);
  echo $response;

 ?>
