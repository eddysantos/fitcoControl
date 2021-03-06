<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$pk_cliente = trim($_POST['pk_cliente']);

$query = "DELETE FROM ct_cliente WHERE pk_cliente = ?";
$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('s',$pk_cliente);
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

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
// $root = $_SERVER['DOCUMENT_ROOT'];
// $data = array(
//   'code'=>"",
//   'response'=>array()
// );
//
// require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
// $query =
// "DELETE FROM  ct_cliente
// WHERE pk_cliente = ?";
//
// $stmt = $conn->prepare($query);
// $stmt->bind_param('s',
//   $_POST['dbId']
// );
// $stmt->execute();
//
// $aff_rows = $conn->affected_rows;
//
// $json = json_encode($aff_rows);
//
// echo $json;




?>
