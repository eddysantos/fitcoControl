<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$conceptoPago = trim($_POST['conceptoPago']);
$facturaCobranza = trim($_POST['facturaCobranza']);
$importeCobranza = trim($_POST['importeCobranza']);
$vencimientoCobranza = trim($_POST['vencimientoCobranza']);
$fechaEntrega = trim($_POST['fechaEntrega']);
$fk_cliente = trim($_POST['fk_cliente']);

$query = "INSERT INTO
  ct_cobranza(
  conceptoPago,
  facturaCobranza,
  importeCobranza,
  vencimientoCobranza,
  fechaEntrega,
  fk_cliente)
  VALUES(?,?,?,?,?,?)";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('ssssss',$conceptoPago,$facturaCobranza,$importeCobranza,$vencimientoCobranza,$fechaEntrega,$fk_cliente);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
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
