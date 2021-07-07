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

$query =
"INSERT INTO ct_seccionCorte(clienteCorte,fechaCorte,fhinicio_prog,fhfinal_prog,fhinicio_real,fhfinal_real,Notas) VALUES(?,?,?,?,?,?,?)";

$fc = parseDate($_POST['fcorte']);

$stmt = $conn->prepare($query);
$stmt->bind_param('sssssss',
  $_POST['clienteCorte'],
  $fc,
  $_POST['fhInicioProg'],
  $_POST['fhFinalProg'],
  $_POST['fhInicioReal'],
  $_POST['fhFinalReal'],
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
