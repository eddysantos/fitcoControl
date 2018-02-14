<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"UPDATE ct_produccion
SET fechaIntroduccion = ?,
metaProduccion = ?,
cantidadProduccion =?
WHERE pk_produccion = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('ssss',
  $_POST['ff'],
  $_POST['mm'],
  $_POST['ee'],
  $_POST['id']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
