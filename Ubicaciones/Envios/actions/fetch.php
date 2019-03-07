<?php
// $root = $_SERVER['DOCUMENT_ROOT'];
// $data = array(
//   'code'=>"",
//   'response'=>array()
// );
//
// require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
// $query = "SELECT * FROM ct_envios WHERE pk_envios = ?";
//
// $stmt = $conn->prepare($query);
// $stmt->bind_param('s', $_POST['envioId']);
// $stmt->execute();
//
// $resultados = $stmt->get_result();
// $num_rows = $stmt->num_rows;
//
// if (false) {
//   $data['code'] = 2;
//   $data['response'] = $num_rows;
// } else {
//   $data['code'] = 1;
//   while ($a = mysqli_fetch_assoc($resultados)) {
//     $data['response'] = $a;
//   }
// }
//
//
//
// $json = json_encode($data);
//
// echo $json;


$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$data = $_POST;

$query = "SELECT * FROM ct_envios WHERE pk_envios = ?";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('s', $data['dbid']);
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

$rslt = $stmt->get_result();
$rows = $rslt->num_rows;

if ($rows == 0) {
  $system_callback['code'] = 2;
  $system_callback['data'] = "No hay informacion que mostrar";
  exit_script($system_callback);
} elseif ($rows == 1) {
  $system_callback['code'] = 1;
  $system_callback['data'] = $rslt->fetch_assoc();
  $system_callback['message'] = "Script called successfully!";
  exit_script($system_callback);
} else {
  $system_callback = 3;
  exit_script($system_callback);
}

?>
