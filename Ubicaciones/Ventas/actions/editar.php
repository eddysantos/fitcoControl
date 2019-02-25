<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$nombreCliente = trim($_POST['nombreCliente']);
$nombreVendedor = trim($_POST['nombreVendedor']);
$numeroPrendas = trim($_POST['numeroPrendas']);
$precioXprenda = trim($_POST['precioXprenda']);
$costoPrenda = trim($_POST['costoPrenda']);
$ingresoBanco = trim($_POST['ingresoBanco']);
$acuerdoPago = trim($_POST['acuerdoPago']);
$fechaIngreso = trim($_POST['fechaIngreso']);
$pk_ventas = trim($_POST['pk_ventas']);



$query = "UPDATE ct_ventas_copy1 SET nombreCliente = ?,
                                     nombreVendedor = ?,
                                     numeroPrendas = ?,
                                     precioXprenda = ?,
                                     costoPrenda = ?,
                                     ingresoBanco = ?,
                                     acuerdoPago = ?,
                                     fecha = ?
                                     WHERE pk_ventas = ?";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('sssssssss',$nombreCliente,$nombreVendedor,$numeroPrendas,$precioXprenda,$costoPrenda,$ingresoBanco,$acuerdoPago,$fechaIngreso,$pk_ventas);
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

$descripcion = "Se Actualizo la Cuenta de Detalle: $s_cta_desc, de la cuenta $pk_id_cuenta, Codigo SAT:$fk_codAgrup, Naturaleza: $fk_id_naturaleza";

$clave = 'admonCtas';
$folio = $Cta_Mta;
require $root . '/conta6/Resources/PHP/actions/registroAccionesBitacora.php';

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);




?>
