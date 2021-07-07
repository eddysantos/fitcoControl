<?php
// $root = $_SERVER['DOCUMENT_ROOT'];
// $data = array(
//   'code'=>"",
//   'response'=>array()
// );
//
// function parseDate($dv){
//   return date('Y-m-d', strtotime($dv));
// }
// require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
// $query =
// "INSERT INTO comen_cobranza(fk_cobranza,fecha,comentario) VALUES(?,?,?)";
//
//
// $fecha = parseDate($_POST['fecha']);
//
//
// $stmt = $conn->prepare($query);
// $stmt->bind_param('sss',
//
//   $_POST['id'],
//   $fecha,
//   $_POST['comentario']
//
// );
// $stmt->execute();
//
// $aff_rows = $conn->affected_rows;
//
// if ($aff_rows != 1) {
//   $data['code'] = 2;
//   $data['response'] = $stmt->error;
// } else {
//   $data['code'] = 1;
// }
//
// $json = json_encode($data);
//
// echo $json;


$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$fk_com = trim($_POST['fk_com']);
$fecha = trim($_POST['fecha']);
$comentario = trim($_POST['comentario']);

$query = "INSERT INTO comen_cobranza(fk_cobranza,fecha,comentario) VALUES(?,?,?)";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('sss',$fk_com,$fecha,$comentario);
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
