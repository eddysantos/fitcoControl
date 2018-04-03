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
"UPDATE ct_corte
SET tiempoActual = ?,
horaActual = ?,
Notas =?
WHERE pk_corte = ?";


$fc = parseDate($_POST['fc']);
$stmt = $conn->prepare($query);
$stmt->bind_param('ssss',
  $fc,
  $_POST['hc'],
  $_POST['nc'],
  $_POST['id']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
