<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query = "INSERT INTO ct_ventas(nombreCliente,nombreVendedor,fechaIngreso,fechaBaja,precioXprenda,acuerdoPago,numeroPrendas) VALUES(?,?,?,?,?,?,?)";

$stmt = $conn->prepare($query);

$stmt->bind_param('sssssss',
  $_POST['cliente'],
  $_POST['vendedor'],
  $_POST['fingreso'],
  $_POST['fbaja'],
  $_POST['precio'],
  $_POST['acuerdo'],
  $_POST['nprendas']

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
