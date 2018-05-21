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
"INSERT INTO
ct_CuentasxPagar(
  proveedor,
  descripcion,
  montoPago,
  fechaVencimiento,
  pagado,
  factura)
  VALUES(?,?,?,?,?,?)";

$fvencimiento = parseDate($_POST['cxp_vencimiento']);

$stmt = $conn->prepare($query);
$stmt->bind_param('ssssss',
  $_POST['cxp_proveedor'],
  $_POST['cxp_desc'],
  $_POST['cxp_total'],
  $fvencimiento,
  $_POST['cxp_pagado'],
  $_POST['cxp_factura']
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
