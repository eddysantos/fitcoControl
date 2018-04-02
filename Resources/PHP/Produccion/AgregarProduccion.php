<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"INSERT INTO ct_produccion(fk_programacion,fechaIntroduccion,metaProduccion,cantidadProduccion) VALUES(?,?,?,?)";

$fintroduccion = parseDate($_POST['mpro_fint']);

$stmt = $conn->prepare($query);
$stmt->bind_param('ssss',

  $_POST['mpro_idprog'],
  $fintroduccion,
  $_POST['mpro_meta'],
  $_POST['mpro_cant']

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
