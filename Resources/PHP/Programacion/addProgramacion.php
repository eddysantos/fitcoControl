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
"INSERT INTO ct_programacion(fk_cliente, fechaInicio, fechaFinal, piezasRequeridas, horaEntrega,) VALUES(?,?,?,?,?)";


$finicio = parseDate($_POST['fi']);
$ffinal = parseDate($_POST['ff']);

$stmt = $conn->prepare($query);
$stmt->bind_param('sssss',
  $_POST['cId'],
  $finicio,
  $ffinal,
  $_POST['pz'],
  $_POST['hr']

  // $_POST['md']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

if ($aff_rows != 1) {
  $data['code'] = 2;
  $data['response'] = $stmt->error;
  $json = json_encode($data);
  echo $json;
} else {
  $data['code'] = 1;
  require "fetchProgramacion.php";
}


?>
