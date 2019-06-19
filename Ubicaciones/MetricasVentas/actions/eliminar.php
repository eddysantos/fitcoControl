<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$pk_venMet = trim($_POST['pk_venMet']);

$query = "DELETE FROM ct_ventasVendedor WHERE pk_venMet = ?";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('s',$pk_venMet);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query execution[$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

$affected = $stmt->affected_rows;

if ($affected == 0) {
  $system_callback['code'] = 2;
  $system_callback['message'] = "primer query El query no hizo ningún cambio a la base de datos";
  exit_script($system_callback);
}


// SEGUNDA CONSULTA --- ELIMINANDO EN METRICAS

$queryMetricas = "DELETE FROM ct_ventasMetricas WHERE fk_venMet = ?";

$stmtMetrica = $conn->prepare($queryMetricas);
if (!($stmtMetrica)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmtMetrica->bind_param('s',$pk_venMet);
if (!($stmtMetrica)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during variables binding [$stmtMetrica->errno]: $stmtMetrica->error";
  exit_script($system_callback);
}

if (!($stmtMetrica->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query execution[$stmtMetrica->errno]: $stmtMetrica->error";
  exit_script($system_callback);
}

$affectedMetrica = $stmtMetrica->affected_rows;

if ($affectedMetrica == 0) {
  $system_callback['code'] = 2;
  $system_callback['message'] = "primer query El query no hizo ningún cambio a la base de datos";
  exit_script($system_callback);
}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
?>
