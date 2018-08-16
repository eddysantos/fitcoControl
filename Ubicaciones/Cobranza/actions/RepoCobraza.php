<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

if ($_POST['request']) {
$system_callback = [];
$data = $_POST;
$request = $data['request'];
$data['string'];
$text = "%" . $data['string'] . "%";
$query = "SELECT
  co.pk_cobranza AS idcobranza,
  ct.nombreCliente AS nombre,
  co.facturaCobranza AS factura,
  co.importeCobranza AS importe,
  co.vencimientoCobranza AS vencimiento,
  WEEK(co.vencimientoCobranza) AS semana,
  year(co.vencimientoCobranza) AS anio,
  co.conceptoPago AS concepto,
  co.fechaEntrega AS entrega,
  ct.colorCliente AS color,
  ct.creditoCliente AS credito,
  sum(pg.importePago) AS pagado

  FROM ct_cobranza co

  LEFT JOIN ct_cliente ct ON co.fk_cliente = ct.pk_cliente
  LEFT JOIN ct_pagos pg ON co.pk_cobranza = pg.fk_cobranza

  WHERE ct.nombreCliente = '$request'

  GROUP BY co.pk_cobranza

  ORDER BY  vencimiento DESC";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query execution [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

$rslt = $stmt->get_result();

if ($rslt->num_rows == 0) {
  $system_callback['code'] = 1;
  $system_callback['data'] ="<p db-id=''>No se encontraron resultados</p>";
  $system_callback['message'] = "Script called successfully but there are no rows to display.";
  exit_script($system_callback);
}



while ($row = $rslt->fetch_assoc()) {


  $idCobranza = $row['idcobranza'];
  $clienteCobranza = $row['nombre'];
  $facturaCobranza = $row['factura'];
  $pagado = number_format($row['pagado'], 2);
  $hoy = date('Y-m-d');
  $importeCobranza = number_format($row['importe'], 2);
  $vencimientoCobranza = $row['vencimiento'];
  $colorCliente = $row['color'];
  $creditoCliente = $row['credito'];
  $semana = $row['semana'];
  $concepto = $row['concepto'];
  $entrega = $row['entrega'];
  $diasemana = $row['vencimiento'];
  $dia = date('N',strtotime($diasemana));
  $background = "";
  $ocultar = "";
  $ce =  $_SESSION['user']['cobranza_editar'];
  $admin = $_SESSION['user']['privilegiosUsuario'];
  $vencido = number_format($row['importe'] -$row['pagado'], 2);



  if ($dia == 1) {
    $dia = "Lun";
  }elseif ($dia == 2) {
    $dia = "Mar";
  }elseif ($dia == 3) {
    $dia = "Mie";
  }elseif ($dia == 4) {
    $dia = "Jue";
  }elseif ($dia == 5) {
    $dia = "Vie";
  }elseif ($dia == 6) {
    $dia = "Sab";
  }elseif ($dia == 7) {
    $dia = "Dom";
  }

  if (($importeCobranza == $pagado) && ($vencimientoCobranza == $hoy)) {
    $background = "verde";
  }elseif (($vencimientoCobranza < $hoy) && ($importeCobranza == $pagado)) {
    $background = "verde";
  }elseif (($vencimientoCobranza > $hoy) && ($importeCobranza == $pagado)) {
    $background = "verde";
  }elseif (($vencimientoCobranza < $hoy) && ($importeCobranza <> $pagado)) {
    $background = "rojo";
  }

 if ($admin == "Administrador") {
   $ocultar = "";
 }elseif ($ce == "0") {
   $ocultar = "ocultar";
 }

 // si funciona filtro de solo vencido
   if ($importeCobranza == $pagado || $vencimientoCobranza > $hoy ) {
     $vervencido = "display:none";
   }else {
     $vervencido = "";
   }

 $system_callback['data'] .=
 "<p db-id='$idCobranza'>$idCobranza - $clienteCobranza</p>";
 $id = $idCobranza;

  $system_callback['data'] .=

  "
  <tr class='$background' id='item' style='$vervencido'>
    <td width='20%'><a href='#coment' data-toggle='modal' class='comentCobranza spand-link mr-3' cobranza-id='$id'>$clienteCobranza</a></td>
    <td width='8%'>$facturaCobranza</td>
    <td width='8%'>$concepto</td>
    <td width='10%'> $ $importeCobranza </td>
    <td width='10%'> $ $pagado </td>
    <td width='10%' style='color:red'> $ $vencido </td>
    <td width='10%'>$dia $vencimientoCobranza</td>
    </a>
  </tr>";
}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
};
?>
