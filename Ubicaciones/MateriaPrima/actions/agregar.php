<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$fecha = trim($_POST['m_fecha']);
$m_entradas = trim($_POST['m_entradas']);
$m_ent_correctas = trim($_POST['m_ent_correctas']);
$m_porcentaje = trim($_POST['m_porcentaje']);


$query = "INSERT INTO ct_materiaPrima (mat_entradas,mat_ent_correctas,fecha,porcentaje) VALUES (?,?,?,?)";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('ssss',$m_entradas,$m_ent_correctas,$fecha,$m_porcentaje);
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
