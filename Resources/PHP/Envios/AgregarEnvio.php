<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";


$data = array(
  'code'=>"",
  'response'=>array()
);
function parseDate($dv){
  return date('Y-m-d', strtotime($dv));
}


$query = "INSERT INTO ct_envios(fk_programacion,descripcion,fechaEnvio,horaEnvio,notas) VALUES(?,?,?,?,?)";

$ff = parseDate($_POST['ff']);

$stmt = $conn->prepare($query);
$stmt->bind_param('sssss',
  $_POST['id'],
  $_POST['st'],
  $ff,
  $_POST['hr'],
  $_POST['nt']

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
