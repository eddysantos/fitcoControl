<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$fk_orden = trim($_POST['fk_orden']);
$razonSocial = trim($_POST['razonSocial']);
$rfc = trim($_POST['rfc']);
$precio = trim($_POST['precio']);
$iva = trim($_POST['iva']);
$numCuenta = trim($_POST['numCuenta']);
$clabe = trim($_POST['clabe']);
$nombreBanco = trim($_POST['nombreBanco']);
$condicionPago = trim($_POST['condicionPago']);
$sugerencia = trim($_POST['sugerencia']);
$razonSugerencia = trim($_POST['razonSugerencia']);
$opcion = trim($_POST['opcion']);


$query = "INSERT INTO ct_ordenCotizaciones (fk_orden,
                                            precio,
                                            iva,
                                            razonSocial,
                                            rfc,
                                            numCuenta,
                                            clabe,
                                            nombreBanco,
                                            sugerencia,
                                            razonSugerencia,
                                            condicionPago,
                                            opcion_cot) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('ssssssssssss',$fk_orden,$precio,$iva,$razonSocial,$rfc,$numCuenta,$clabe,$nombreBanco,$sugerencia,$razonSugerencia,$condicionPago,$opcion);
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
