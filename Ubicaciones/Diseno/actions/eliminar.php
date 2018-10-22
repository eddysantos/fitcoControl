<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query ="DELETE FROM  ct_diseno
WHERE pk_diseno = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('s',
  $_POST['dbId']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
