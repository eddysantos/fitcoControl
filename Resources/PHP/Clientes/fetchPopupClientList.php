<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>""
);


require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

$txt = $conn->real_escape_string($_POST['txt']);

$query = "SELECT * FROM ct_cliente WHERE nombreCliente LIKE '%$txt%'";

$resultados = $conn->query($query);

if (false) {
  $data['code'] = 2;
} else {
  $data['code'] = 1;
  $data['system'] = $conn;
  while ($a = mysqli_fetch_assoc($resultados)) {
    $idCliente = $a['pk_cliente'];
    $nc = $a['nombreCliente'];
    $color = $a['colorCliente'];
    $data['response'] .= "<p color='$color' client-id='$idCliente'>$nc</p>";
  }
}



$json = json_encode($data);

echo $json;

?>
