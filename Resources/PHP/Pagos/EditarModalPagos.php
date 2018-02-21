<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"UPDATE ct_pagos
SET fechaPago= ?,
importePago = ?
WHERE pk_pagos = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('sss',
  $_POST['ff'],
  $_POST['pp'],
  $_POST['id']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>