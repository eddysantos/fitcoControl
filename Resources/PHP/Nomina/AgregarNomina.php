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
  ct_nomina(
  fechaNomina,
  dineroNomina,
  horasExtras,
  dineroHoras,
  servicios,
  nomina)
  VALUES(?,?,?,?,?,?)";



$ff = parseDate($_POST['ff']);

$stmt = $conn->prepare($query);
$stmt->bind_param('ssssss',
  $ff,
  $_POST['cn'],
  $_POST['he'],
  $_POST['ch'],
  $_POST['ss'],
  $_POST['nn']


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
