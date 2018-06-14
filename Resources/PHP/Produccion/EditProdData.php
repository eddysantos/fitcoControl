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
"UPDATE ct_produccion
SET fechaIntroduccion = ?,
metaProduccion = ?,
cantidadProduccion =?,
notas =?
WHERE pk_produccion = ?";

$fintro = parseDate($_POST['ff']);

$stmt = $conn->prepare($query);
$stmt->bind_param('sssss',
  $fintro,
  $_POST['mm'],
  $_POST['ee'],
  $_POST['nt'],
  $_POST['id']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
