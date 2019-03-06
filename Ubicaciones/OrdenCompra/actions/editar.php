<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$pk_orden = trim($_POST['pk_orden']);
$pk_cotizacion = trim($_POST['pk_cotizacion']);
$notaAprobado = trim($_POST['notaAprobado']);
$opcion = trim($_POST['opcion']);
$aprobado = trim($_POST['aprobado']);

$query = "UPDATE ct_ordenCompra
SET opcion = ?,
notaAprobado = ?,
aprobado = ?
WHERE pk_orden = ?";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('ssss',$opcion,$notaAprobado,$aprobado,$pk_orden);
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
// $system_callback['datos'] = $_POST;

if ($affected == 0) {
  $system_callback['code'] = 2;
  $system_callback['message'] = "el primer query no hizo nada";
  exit_script($system_callback);
}

// $system_callback['code'] = 1;
// $system_callback['message'] = "Script called successfully!";
//
//




$queryCot = "UPDATE ct_ordenCotizaciones
SET cot_aut = ?
WHERE pk_cotizacion = ?";

$stmt = $conn->prepare($queryCot);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('ss',$aprobado,$pk_cotizacion);
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
  $system_callback['message'] = "el segundo query no hizo nada";
  exit_script($system_callback);
}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";


exit_script($system_callback);

 ?>
