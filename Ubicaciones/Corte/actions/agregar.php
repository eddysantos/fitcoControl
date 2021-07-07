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
"INSERT INTO ct_CorteDiario(fk_CorteCalendario,fechaIntroduccion,metaCorte,cantidadCorte,notas) VALUES(?,?,?,?,?)";

$fintroduccion = parseDate($_POST['fechaIntroduccion']);

$stmt = $conn->prepare($query);
$stmt->bind_param('sssss',

  $_POST['fk_CorteCalendario'],
  $fintroduccion,
  $_POST['metaCorte'],
  $_POST['cantidadCorte'],
  $_POST['notaCorte']

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
