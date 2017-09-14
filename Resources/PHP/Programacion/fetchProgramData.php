<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$data = array(
  'code'=>"",
  'response'=>array()
);

$query ="SELECT *

FROM ct_programacion


WHERE pk_programacion = ?";


$stmt = $conn->prepare($query);
$stmt->bind_param('s', $_POST['programId']);
$stmt->execute();


$resultados = $stmt->get_result();
$num_rows = $stmt->num_rows;

if (false) {
  $data['code'] = 2;
  $data['response'] = $num_rows;
} else {
  $data['code'] = 1;
  while ($a = mysqli_fetch_assoc($resultados)) {
    $data['response'] = $a;
  }
}

$json = json_encode($data);

echo $json;

?>
