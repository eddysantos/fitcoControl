<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"UPDATE ct_cobranza
SET fk_cliente = ?,
facturaCobranza = ?,
importeCobranza =?,
vencimientoCobranza =?
WHERE pk_cobranza = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('sssss',
  $_POST['mcbz_cliente'],
  $_POST['mcbz_factura'],
  $_POST['mcbz_importe'],
  $_POST['mcbz_vencimiento'],
  $_POST['mcbz_id']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
