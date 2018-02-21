
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
SUM(pgo.importePago) As totalpagado,
WEEK(co.vencimientoCobranza) AS semana,
ct.colorCliente AS color,
SUM(pgo.importePago) AS pagado

FROM ct_cobranza co

LEFT JOIN ct_cliente ct ON co.fk_cliente = ct.pk_cliente
LEFT JOIN ct_pagos pgo ON  pgo.fk_cobranza = co.pk_cobranza



GROUP BY semana

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
    $pagado = number_format($row['pagado'], 2);
    // $pendiente = $row['totalcobranza']-$row['pagado'];
    $pendientepago = number_format($row['totalcobranza']-$row['pagado'],2);



    $data["infoTabla"].= "<tr class='row  bordelateral m-0' id='item'>
      <td class='col-md-3 text-center'>
        <h5><b>$semana</b></h5>
      </td>
      <td class='col-md-3 text-center'>
        <h5><b> $ $totalCobranza </b></h5>
      </td>
      <td class='col-md-3 text-center'>
        <h5><b> $ $pagado </b></h5>
      </td>
      <td class='col-md-3 text-center'>
        <h5><b> $ $pendientepago </b></h5>
      </td>
    </tr>";


  }
}
$json = json_encode($data);

echo $json;

?>
