<?php
$root = $_SERVER['DOCUMENT_ROOT'];

date_default_timezone_set('GMT');

$data = array(
  'code'=>"",
  'response'=>array(),
  'colores'=>array(),
  'prep'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query = "SELECT

c.nombreCliente AS Cliente,
p.fechaInicio AS FechaInicio,
p.fechaFinal AS FechaFinal,
c.colorCliente AS ColorCliente

FROM ct_programacion p

LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente";

$stmt = $conn->prepare($query);
//$stmt->bind_param('s', $_POST['clienteId']);
$stmt->execute();

$resultados = $stmt->get_result();
$num_rows = $stmt->num_rows;

if (false) {
  $data['code'] = 2;
  $data['response'] = $num_rows;
} else {
  $data['code'] = 1;
  while ($a = mysqli_fetch_assoc($resultados)) {
    // $fi = date('D M d Y H:i:s eO', strtotime($a['FechaInicio']));
    // $ff = date('D M d Y H:i:s eO', strtotime($a['FechaFinal']));
    $fi =  strtotime($a['FechaInicio']);
    $ff =  strtotime($a['FechaFinal']);
    $data['response'][] = array(
      $a['Cliente'], $fi, $ff
    );
    $data['prep'][$a['Cliente']] = $a['ColorCliente'];
  }
}

foreach ($data['prep'] as $key => $value) {
  $data['colores'][] = $value;
}

$json = json_encode($data);

echo $json;

?>
