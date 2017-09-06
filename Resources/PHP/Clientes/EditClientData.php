<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"UPDATE ct_cliente
SET nombreCliente = ?,
correoCliente = ?,
telefonoCliente =?,
creditoCliente =?,
fingresoCliente = ?,
colorCliente = ?,
prendasCliente = ?,
nosotrosCliente = ?
WHERE pk_cliente = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('sssssssss',
  $_POST['mclt_nombre'],
  $_POST['mclt_contacto'],
  $_POST['mclt_telefono'],
  $_POST['mclt_credito'],
  $_POST['mclt_fingreso'],
  $_POST['mclt_color'],
  $_POST['mclt_prendas'],
  $_POST['mclt_nosotros'],
  $_POST['mclt_id']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
