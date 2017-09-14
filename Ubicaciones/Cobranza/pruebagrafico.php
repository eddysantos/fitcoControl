<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);
$query = "SELECT

co.pk_cobranza AS idcobranza,
ct.nombreCliente AS nombre,
SUM(co.importeCobranza) AS totalcobranza,
WEEK(co.vencimientoCobranza) AS semana,
ct.colorCliente AS color

FROM ct_cobranza co

LEFT JOIN ct_cliente ct ON co.fk_cliente = ct.pk_cliente

GROUP BY nombre, semana

ORDER BY semana,nombre ASC";

$stmt = $conn->prepare($query);
$stmt->execute();

$resultado = $stmt->get_result();

$datosGraf = array(
  array('Cliente')
);

if (!$resultado) {
  $data['code'] = 2;
  $data['response'] = mysqli_error($conn);
  die();
}else {
  while($row = mysqli_fetch_assoc($resultado)){
    $data["data"][]= $row;

    $idCobranza = $row['idcobranza'];
    $clienteCobranza = $row['nombre'];
    $totalCobranza = number_format($row['totalcobranza'], 2);
    $semana = $row['semana'];
    $colorCliente = $row['color'];

   }
  }
 ?>
