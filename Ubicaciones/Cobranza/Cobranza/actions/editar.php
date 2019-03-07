<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$pk_cobranza = trim($_POST['pk_cobranza']);
$nombreCliente = trim($_POST['nombreCliente']);
$conceptoPago = trim($_POST['conceptoPago']);
$facturaCobranza = trim($_POST['facturaCobranza']);
$importeCobranza = trim($_POST['importeCobranza']);
$fechaEntrega = trim($_POST['fechaEntrega']);
$vencimientoCobranza = trim($_POST['vencimientoCobranza']);

$query = "UPDATE ct_cobranza
SET
conceptoPago = ?,
facturaCobranza = ?,
importeCobranza = ?,
vencimientoCobranza = ?,
fechaEntrega = ?,
fk_cliente = ?
WHERE pk_cobranza = ?";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('sssssss',$conceptoPago,$facturaCobranza,$importeCobranza,$vencimientoCobranza,$fechaEntrega,$nombreCliente,$pk_cobranza);
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
