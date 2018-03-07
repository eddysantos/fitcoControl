<?php
$root = $_SERVER['DOCUMENT_ROOT'];

$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"INSERT INTO
ct_cobranza(
  conceptoPago,
  facturaCobranza,
  importeCobranza,
  vencimientoCobranza,
  fechaEntrega,
  fk_cliente)
  VALUES(?,?,?,?,?,?)";

$stmt = $conn->prepare($query);

error_log("Pase por aqui!");

if (!($stmt)) {
  error_log($conn->$error);
  }
$stmt->bind_param('ssssss',
  $_POST['cbz_concepto'],
  $_POST['cbz_factura'],
  $_POST['cbz_importe'],
  $_POST['cbz_dvencimiento'],
  $_POST['cbz_entrega'],
  $_POST['cbz_cliente']
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
