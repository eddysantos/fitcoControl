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
"UPDATE comen_cobranza
SET fecha= ?,
comentario = ?
WHERE pk_coment = ?";

$fecha = parseDate($_POST['ff']);


$stmt = $conn->prepare($query);
$stmt->bind_param('sss',
  $fecha,
  $_POST['cc'],
  $_POST['id']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
