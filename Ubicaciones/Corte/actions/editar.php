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
//
// require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
// $query =
// "UPDATE ct_CorteDiario
// SET fechaIntroduccion = ?,
// metaCorte = ?,
// cantidadCorte =?,
// notas =?
// WHERE pk_CorteDiario = ?";
//
// $fintro = parseDate($_POST['ff']);
//
// $stmt = $conn->prepare($query);
// $stmt->bind_param('sssss',
//   $fintro,
//   $_POST['mm'],
//   $_POST['cc'],
//   $_POST['nt'],
//   $_POST['id']
// );
// $stmt->execute();
//
// $aff_rows = $conn->affected_rows;
//
// $json = json_encode($aff_rows);
//
// echo $json;


$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$pk_CorteDiario = trim($_POST['pk_CorteDiario']);
$fechaIntroduccion = trim($_POST['fechaIntroduccion']);
$metaCorte = trim($_POST['metaCorte']);
$cantidadCorte = trim($_POST['cantidadCorte']);
$notas = trim($_POST['notas']);

$query = "UPDATE ct_CorteDiario
SET fechaIntroduccion = ?,
metaCorte = ?,
cantidadCorte =?,
notas =?
WHERE pk_CorteDiario = ?";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('sssss',$fechaIntroduccion,$metaCorte,$cantidadCorte,$notas,$pk_CorteDiario);
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
