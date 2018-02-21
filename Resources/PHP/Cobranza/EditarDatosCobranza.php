<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"UPDATE ct_cobranza
SET
facturaCobranza = ?,
importeCobranza = ?,
vencimientoCobranza = ?,
fechaEntrega = ?,
fk_cliente = ?
WHERE pk_cobranza = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('ssssss',
  $_POST['mcbz_factura'],
  $_POST['mcbz_importe'],
  $_POST['mcbz_vencimiento'],
  $_POST['mcbz_fechaEntrega'],
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
