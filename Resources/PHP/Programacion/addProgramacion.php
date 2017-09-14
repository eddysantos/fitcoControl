<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"INSERT INTO ct_programacion(fk_cliente, fechaInicio, fechaFinal, piezasRequeridas, metaDiaria) VALUES(?,?,?,?,?)";

$stmt = $conn->prepare($query);
$stmt->bind_param('sssss',
  $_POST['cId'],
  $_POST['fi'],
  $_POST['ff'],
  $_POST['pz'],
  $_POST['md']
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
