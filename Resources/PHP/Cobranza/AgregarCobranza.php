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
  fk_cliente,
  facturaCobranza,
  importeCobranza,
  vencimientoCobranza)
  VALUES(
    ?,?,?,?)";

$stmt = $conn->prepare($query);
$stmt->bind_param('ssss',
  $_POST['cbz_cliente'],
  $_POST['cbz_factura'],
  $_POST['cbz_importe'],
  $_POST['cbz_dvencimiento']
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
