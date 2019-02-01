<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$pk_inventario = trim($_POST['pk_inventario']);
$usuario_edit = trim($_POST['usuario_edit']);
$fecha_edit = trim($_POST['fecha_edit']);
$cod_proveedor = trim($_POST['cod_proveedor']);
$proveedor = trim($_POST['proveedor']);
$color = trim($_POST['color']);
$composicion = trim($_POST['composicion']);
$ancho = trim($_POST['ancho']);
$precio = trim($_POST['precio']);
$metros = trim($_POST['metros']);
$folio_corte = trim($_POST['folio_corte']);
$fecha = trim($_POST['fecha']);

$query = "UPDATE ct_inventario
SET cod_proveedor = ?,
proveedor = ?,
color = ?,
composicion = ?,
ancho = ?,
precio = ?,
metros = ?,
folio_corte = ?,
fecha = ?,
fecha_edit = ?,
usuario_edit = ?
WHERE pk_inventario = ?";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('ssssssssssss',$cod_proveedor,$proveedor,$color,$composicion,$ancho,$precio,$metros,$folio_corte,$fecha,$fecha_edit,$usuario_edit,$pk_inventario);
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
