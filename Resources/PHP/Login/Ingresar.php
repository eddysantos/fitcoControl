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

  $query = $conn->query("SELECT * FROM usuarios WHERE usrUsuario = '$usuario' AND contraUsuario = '$contra'");

  if ($result = mysqli_fetch_array($query)) {
    $_SESSION['u_usuario'] = $usuario;
    $response['code'] = "1";
    $response = json_encode($response);
    echo $response;
    //$redirect = $root . "/ncplaa_cont/Ubicaciones/Bienvenida.php";
    //header($redirect);
    die();

  }else {
    $response['code']="200";
    $response['msg']="El usuario o contraseña es incorrecto";
  }

  $response = json_encode($response);
  echo $response;

 ?>
