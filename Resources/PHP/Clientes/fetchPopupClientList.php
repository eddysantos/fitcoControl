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
//$stmt->bind_param('s', $txt);
//$stmt->execute();

//$resultados = $stmt->get_result();
//$num_rows = $stmt->num_rows;

if (false) {
  $data['code'] = 2;
  //$data['response'] = $num_rows;
} else {
  $data['code'] = 1;
  $data['system'] = $conn;
  while ($a = mysqli_fetch_assoc($resultados)) {
    $idCliente = $a['pk_cliente'];
    $nc = $a['nombreCliente'];
    $data['response'] .= "<p client-id='$idCliente'>$nc</p>";
  }
}



$json = json_encode($data);

echo $json;

?>
