<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$fecha_ut = trim($_POST['fecha_ut']);
$utilizado = trim($_POST['utilizado']);
$usuario_edit_ut = trim($_POST['usuario_edit_ut']);
$fecha_edit_ut = trim($_POST['fecha_edit_ut']);
$pk_inv_utilizado = trim($_POST['pk_inv_utilizado']);
$fk_inventario = trim($_POST['fk_inventario']);
$usuario_reg_ut = trim($_POST['usuario_reg_ut']);
$fecha_reg_ut = trim($_POST['fecha_reg_ut']);

$query = "UPDATE ct_inv_utilizado
SET  fk_inventario = ?,
fecha_ut = ?,
utilizado = ?,
usuario_reg_ut = ?,
fecha_reg_ut = ?,
usuario_edit_ut = ?,
fecha_edit_ut = ?
WHERE pk_inv_utilizado = ?";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('ssssssss',$fk_inventario,$fecha_ut,$utilizado,$usuario_reg_ut,$fecha_reg_ut,$usuario_edit_ut,$fecha_edit_ut,$pk_inv_utilizado);
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
