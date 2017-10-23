<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"INSERT INTO ct_pagos(fk_cobranza,fechaPago,importePago) VALUES(?,?,?)";

$stmt = $conn->prepare($query);
$stmt->bind_param('sss',

  $_POST['mpgo_id'],
  $_POST['mpgo_fpago'],
  $_POST['mpgo_importe']

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
