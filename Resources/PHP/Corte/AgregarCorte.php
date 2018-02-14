<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";


$data = array(
  'code'=>"",
  'response'=>array()
);


$query =
"INSERT INTO ct_corte(fk_programacion,tiempoActual,horaActual,Notas) VALUES(?,?,?,?)";


$stmt = $conn->prepare($query);
$stmt->bind_param('ssss',
  $_POST['id'],
  $_POST['ff'],
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
