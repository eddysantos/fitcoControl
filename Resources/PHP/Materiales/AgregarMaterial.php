<?php
$root = $_SERVER['DOCUMENT_ROOT'];

require $root . "/fitcoControl/Resources/PHP/Util/helperFunctions.php";

$data = array(
  'code'=>"",
  'response'=>array()
);

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


$stmt = $conn->prepare($query);
$stmt->bind_param('sssssss',
  $_POST['mm'],
  $_POST['fc'],
  $_POST['ss'],
  $_POST['pe'],
  $_POST['fe'],
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
