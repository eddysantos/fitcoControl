<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$vts_vendedor = trim($_POST['vts_vendedor']);
$vts_nombreCliente = trim($_POST['vts_nombreCliente']);
$vts_nprendas = trim($_POST['vts_nprendas']);
$vts_precio = trim($_POST['vts_precio']);
$vts_Apago = trim($_POST['vts_Apago']);
$vts_costoPrenda = trim($_POST['vts_costoPrenda']);
$vts_ingresoBanco = trim($_POST['vts_ingresoBanco']);
$vts_fingreso = trim($_POST['vts_fingreso']);

$query ="INSERT INTO ct_ventas_copy1 (nombreCliente,nombreVendedor,fecha,precioXprenda,acuerdoPago,numeroPrendas,costoPrenda,ingresoBanco) VALUES(?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('ssssssss',$vts_nombreCliente,$vts_vendedor,$vts_fingreso,$vts_precio,$vts_Apago,$vts_nprendas,$vts_costoPrenda,$vts_ingresoBanco);
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
