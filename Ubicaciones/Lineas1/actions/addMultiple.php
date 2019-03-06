<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$base = $_POST['nom'];
$linea = $_POST['lin'];
$fecha = $_POST['fecha'];


$query = "INSERT INTO ct_linea_copy1 (nombre,linea,fecha) VALUES ";

for ($i = 0; $i < count($base); $i++) {
  $query.="('".$base[$i]."','".$linea[$i]."','".$fecha[$i]."'),";
}

$cadena_final = substr($query, 0, -1);
$cadena_final.=";";

$stmt = $conn->prepare($cadena_final);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}


if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}


$affected = $stmt->affected_rows;
$system_callback['affected'] = $affected;
$system_callback['datos'] = $_POST;

if ($affected == 0) {
  $system_callback['code'] = 2;
  $system_callback['message'] = "El query no hizo ningún cambio a la base de datos";
  exit_script($system_callback);
}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);


 ?>
