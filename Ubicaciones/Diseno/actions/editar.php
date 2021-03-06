<?php
// session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$pk_diseno = trim($_POST['pk_diseno']);
$dis_requerido = trim($_POST['dis_requerido']);
$dis_entregados = trim($_POST['dis_entregados']);
$fecha = trim($_POST['fecha']);
$porcentaje = trim($_POST['porcentaje']);



$query = "UPDATE ct_diseno SET dis_requerido = ?, dis_entregados = ?, fecha = ?, porcentaje = ? WHERE pk_diseno = ?";


$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('sssss',$dis_requerido,$dis_entregados,$fecha,$porcentaje,$pk_diseno);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query execution [$stmt->errno]: $stmt->error";
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
