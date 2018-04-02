<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"UPDATE ct_ventas
SET nombreCliente = ?,
nombreVendedor = ?,
fechaIngreso =?,
fechaBaja =?,
precioXprenda =?,
acuerdoPago =?,
numeroPrendas =?
WHERE pk_ventas = ?";

$fingreso = parseDate($_POST['fingreso']);
$fbaja = parseDate($_POST['fbaja']);

$stmt = $conn->prepare($query);
$stmt->bind_param('ssssssss',

  $_POST['nombreCliente'],
  $_POST['vendedor'],
  $fingreso,
  $fbaja,
  $_POST['precio'],
  $_POST['pago'],
  $_POST['prendas'],
  $_POST['idVentas']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
