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
"UPDATE ct_cobranza
SET
conceptoPago = ?,
facturaCobranza = ?,
importeCobranza = ?,
vencimientoCobranza = ?,
fechaEntrega = ?,
fk_cliente = ?
WHERE pk_cobranza = ?";
$mfvencimiento = parseDate($_POST['mcbz_vencimiento']);
$mfentrega = parseDate($_POST['mcbz_fechaEntrega']);
$stmt = $conn->prepare($query);
$stmt->bind_param('sssssss',
  $_POST['mcbz_concepto'],
  $_POST['mcbz_factura'],
  $_POST['mcbz_importe'],
  $mfvencimiento,
  $mfentrega,
  $_POST['mcbz_cliente'],
  $_POST['mcbz_id']
);
$stmt->execute();
$aff_rows = $conn->affected_rows;
if ($aff_rows != 1) {
  $data['code'] = 2;
  $data['response'] = $stmt->error;
} else {
  $data['code'] = 1;
}
$json = json_encode($aff_rows);
echo $json;
?>
