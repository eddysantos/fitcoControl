<?php
// $root = $_SERVER['DOCUMENT_ROOT'];
// require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';
//
// $cliente = trim($_POST['cliente']);
// $vendedor = trim($_POST['vendedor']);
// $nprendas = trim($_POST['nprendas']);
// $precio = trim($_POST['precio']);
// $acuerdo = trim($_POST['acuerdo']);
// $fingreso = trim($_POST['fingreso']);
// $fbaja = trim($_POST['fbaja']);
//
// $query ="INSERT INTO ct_ventas(nombreCliente,nombreVendedor,fechaIngreso,fechaBaja,precioXprenda,acuerdoPago,numeroPrendas) VALUES(?,?,?,?,?,?,?)";
//
// $stmt = $conn->prepare($query);
// if (!($stmt)) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
//   exit_script($system_callback);
// }
//
// $stmt->bind_param('sssssss',$cliente,$vendedor,$fingreso,$fbaja,$precio,$acuerdo,$nprendas);
// if (!($stmt)) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
//   exit_script($system_callback);
// }
//
//
// if (!($stmt->execute())) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error durante la ejecucion [$stmt->errno]: $stmt->error";
//   exit_script($system_callback);
// }
//
// $affected = $stmt->affected_rows;
// $system_callback['affected'] = $affected;
// $system_callback['datos'] = $_POST;
//
// if ($affected == 0) {
//   $system_callback['code'] = 2;
//   $system_callback['message'] = "El query no hizo ningún cambio a la base de datos";
//   exit_script($system_callback);
// }
//
// $system_callback['code'] = 1;
// $system_callback['message'] = "Script called successfully!";
// exit_script($system_callback);



$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);
function parseDate($dv){
  return date('Y-m-d', strtotime($dv));
}
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query = "INSERT INTO ct_ventas(nombreCliente,nombreVendedor,fechaIngreso,fechaBaja,precioXprenda,acuerdoPago,numeroPrendas) VALUES(?,?,?,?,?,?,?)";
$fingreso = parseDate($_POST['fingreso']);
$fbaja = parseDate($_POST['fbaja']);
$stmt = $conn->prepare($query);
$stmt->bind_param('sssssss',
  $_POST['cliente'],
  $_POST['vendedor'],
  $fingreso,
  $fbaja,
  $_POST['precio'],
  $_POST['acuerdo'],
  $_POST['nprendas']
);
$stmt->execute();
$aff_rows = $conn->affected_rows;
if ($aff_rows != 1) {
  $data['code'] = 2;
  $data['response'] = $stmt->error;
} else {
  $data['code'] = 1;
}
$json = json_encode($data);
echo $json;
?>
