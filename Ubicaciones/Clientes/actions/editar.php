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
// "UPDATE ct_cliente
// SET nombreCliente = ?,
// nombreContacto = ?,
// correoCliente = ?,
// telefonoCliente =?,
// creditoCliente =?,
// fingresoCliente = ?,
// colorCliente = ?,
// prendasCliente = ?,
// precioPrenda = ?,
// nosotrosCliente = ?,
// vendedorCliente = ?
// WHERE pk_cliente = ?";
//
// $fingreso = parseDate($_POST['mclt_fingreso']);
//
// $stmt = $conn->prepare($query);
// $stmt->bind_param('ssssssssssss',
//   $_POST['mclt_nombre'],
//   $_POST['mclt_ncontacto'],
//   $_POST['mclt_contacto'],
//   $_POST['mclt_telefono'],
//   $_POST['mclt_credito'],
//   $fingreso,
//   $_POST['mclt_color'],
//   $_POST['mclt_prendas'],
//   $_POST['mclt_precio'],
//   $_POST['mclt_nosotros'],
//   $_POST['mclt_vendedor'],
//   $_POST['mclt_id']
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
$pk_cliente = trim($_POST['pk_cliente']);



$query = "UPDATE ct_cliente
SET nombreCliente = ?,
nombreContacto = ?,
correoCliente = ?,
telefonoCliente =?,
creditoCliente =?,
fingresoCliente = ?,
colorCliente = ?,
prendasCliente = ?,
precioPrenda = ?,
nosotrosCliente = ?,
vendedorCliente = ?
WHERE pk_cliente = ?";


$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('ssssssssssss',$nombreCliente,$nombreContacto,$correoCliente,$telefonoCliente,$creditoCliente,$fingresoCliente,$colorCliente,$prendasCliente,$precioPrenda,$nosotrosCliente,$vendedorCliente,$pk_cliente);
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
