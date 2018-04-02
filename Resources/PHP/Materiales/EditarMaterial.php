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
"UPDATE ct_materiales
SET material = ?,
fechaCompra = ?,
numeroSerie =?,
personaEntrega =?,
fechaEntrega = ?,
condicionEntrega = ?,
precioMaterial = ?
WHERE pk_material = ?";


$fcompra = parseDate($_POST['fc']);
$fentrega = parseDate($_POST['fe']);

$stmt = $conn->prepare($query);
$stmt->bind_param('ssssssss',
  $_POST['mm'],
  $fcompra,
  $_POST['ns'],
  $_POST['pe'],
  $fentrega,
  $_POST['cc'],
  $_POST['pr'],
  $_POST['id']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
