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
// "INSERT INTO
// ct_cliente(
//   nombreCliente,
//   nombreContacto,
//   correoCliente,
//   telefonoCliente,
//   creditoCliente,
//   fingresoCliente,
//   colorCliente,
//   prendasCliente,
//   precioPrenda,
//   nosotrosCliente,
//   vendedorCliente)
//   VALUES(
//     ?,?,?,?,?,?,?,?,?,?,?)";
//
// $fingreso = parseDate($_POST['clt_fingreso']);
//
// $stmt = $conn->prepare($query);
// $stmt->bind_param('sssssssssss',
//   $_POST['clt_nombre'],
//   $_POST['clt_ncontacto'],
//   $_POST['clt_contacto'],
//   $_POST['clt_telefono'],
//   $_POST['clt_credito'],
//   $fingreso,
//   $_POST['clt_color'],
//   $_POST['clt_prendas'],
//   $_POST['clt_precio'],
//   $_POST['clt_nosotros'],
//   $_POST['clt_vendedor']
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

$nombreCliente = trim($_POST['nombreCliente']);
$nombreContacto = trim($_POST['nombreContacto']);
$correoCliente = trim($_POST['correoCliente']);
$telefonoCliente = trim($_POST['telefonoCliente']);
$creditoCliente = trim($_POST['creditoCliente']);
$fingresoCliente = trim($_POST['fingresoCliente']);
$colorCliente = trim($_POST['colorCliente']);
$prendasCliente = trim($_POST['prendasCliente']);
$precioPrenda = trim($_POST['precioPrenda']);
$nosotrosCliente = trim($_POST['nosotrosCliente']);
$vendedorCliente = trim($_POST['vendedorCliente']);

$query ="INSERT INTO ct_cliente(
  nombreCliente,
  nombreContacto,
  correoCliente,
  telefonoCliente,
  creditoCliente,
  fingresoCliente,
  colorCliente,
  prendasCliente,
  precioPrenda,
  nosotrosCliente,
  vendedorCliente)
  VALUES(
    ?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('sssssssssss',$nombreCliente,$nombreContacto,$correoCliente,$telefonoCliente,$creditoCliente,$fingresoCliente,$colorCliente,$prendasCliente,$precioPrenda,$nosotrosCliente,$vendedorCliente);
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
// $system_callback['affected'] = $affected;

if ($affected == 0) {
  $system_callback['code'] = 2;
  $system_callback['message'] = "El query no hizo ningún cambio a la base de datos";
  exit_script($system_callback);
}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
?>
