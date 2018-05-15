<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

function parseDate($dv){
  return date('Y-m-d', strtotime($dv));
}

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"UPDATE ct_cliente
SET nombreCliente = ?,
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

$fingreso = parseDate($_POST['mclt_fingreso']);

$stmt = $conn->prepare($query);
$stmt->bind_param('sssssssssss',
  $_POST['mclt_nombre'],
  $_POST['mclt_contacto'],
  $_POST['mclt_telefono'],
  $_POST['mclt_credito'],
  $fingreso,
  $_POST['mclt_color'],
  $_POST['mclt_prendas'],
  $_POST['mclt_precio'],
  $_POST['mclt_nosotros'],
  $_POST['mclt_vendedor'],
  $_POST['mclt_id']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
