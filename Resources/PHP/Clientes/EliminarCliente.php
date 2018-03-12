<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"DELETE FROM  ct_cliente
WHERE pk_cliente = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('s',
  $_POST['clienteId']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
