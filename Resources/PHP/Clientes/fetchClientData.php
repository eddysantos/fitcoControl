<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query = "SELECT * FROM ct_cliente WHERE pk_cliente = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('s', $_POST['clienteId']);
$stmt->execute();

$resultados = $stmt->get_results();

$num_rows = $conn->num_rows;

if ($num_rows > 1 || $num_rows == 0) {
  $data['code'] = 2;
} else {
  $data['code'] = 1;
  while ($a = $resultados->fetch_assoc()) {
    $data['response'] = $a;
  }
}

$json = json_encode($data);

echo $json;

?>
