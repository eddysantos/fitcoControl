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
"UPDATE ct_CuentasxPagar
SET proveedor = ?,
descripcion = ?,
montoPago = ?,
fechaVencimiento =?,
pagado =?,
factura = ?
WHERE pk_cuentasPagar = ?";



$vencimiento = parseDate($_POST['vence']);

$stmt = $conn->prepare($query);
$stmt->bind_param('sssssss',
  $_POST['proveedor'],
  $_POST['desc'],
  $_POST['total'],
  $vencimiento,
  $_POST['pagado'],
  $_POST['factura'],
  $_POST['id']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
