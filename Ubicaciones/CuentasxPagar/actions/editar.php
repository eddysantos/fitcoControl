<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$pk_cuentasPagar = trim($_POST['pk_cuentasPagar']);
$proveedor = trim($_POST['proveedor']);
$descripcion = trim($_POST['descripcion']);
$factura = trim($_POST['factura']);
$montoPago = trim($_POST['montoPago']);
$fechaVencimiento = trim($_POST['fechaVencimiento']);
$pagado = trim($_POST['pagado']);

$query = "UPDATE ct_CuentasxPagar
SET proveedor = ?,
descripcion = ?,
montoPago = ?,
fechaVencimiento = ?,
pagado = ?,
factura = ?
WHERE pk_cuentasPagar = ?";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('sssssss',$proveedor,$descripcion,$montoPago,$fechaVencimiento,$pagado,$factura,$pk_cuentasPagar);
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
