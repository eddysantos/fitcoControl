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
"UPDATE ct_envios
SET descripcion = ?,
fechaEnvio = ?,
horaEnvio = ?,
notas = ?
WHERE pk_envios = ?";


$ff = parseDate($_POST['ff']);

$stmt = $conn->prepare($query);
$stmt->bind_param('sssss',
  $_POST['st'],
  $ff,
  $_POST['hr'],
  $_POST['nt'],
  $_POST['id']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
