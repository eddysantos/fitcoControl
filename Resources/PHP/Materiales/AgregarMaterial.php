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
  ct_materiales(
  material,
  fechaCompra,
  numeroSerie,
  personaEntrega,
  fechaEntrega,
  condicionEntrega,
  precioMaterial)
  VALUES(?,?,?,?,?,?,?)";



$fcompra = parseDate($_POST['fc']);
$fentrega = parseDate($_POST['fe']);

$stmt = $conn->prepare($query);
$stmt->bind_param('sssssss',
  $_POST['mm'],
  $fcompra,
  $_POST['ss'],
  $_POST['pe'],
  $fentrega,
  $_POST['cc'],
  $_POST['pp']

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
