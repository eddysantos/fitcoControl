<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"INSERT INTO ct_cliente(nombreCliente,correoCliente,telefonoCliente,creditoCliente,fingresoCliente,colorCliente,prendasCliente,nosotrosCliente) VALUES(?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($query);
$stmt->bind_param('ssssssss',
  $_POST['clt_nombre'],
  $_POST['clt_contacto'],
  $_POST['clt_telefono'],
  $_POST['clt_credito'],
  $_POST['clt_fingreso'],
  $_POST['clt_color'],
  $_POST['clt_prendas'],
  $_POST['clt_nosotros']
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
