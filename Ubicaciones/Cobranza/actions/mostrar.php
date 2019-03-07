<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$data = $_POST;


$variable = isset($data['string']) ? $data['string'] : null ;
$text = "%" . $variable . "%";
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
WHERE (ct.nombreCliente LIKE ?)  OR (co.facturaCobranza LIKE ?) OR (co.vencimientoCobranza LIKE ?) OR (co.importeCobranza LIKE ?)

GROUP BY co.pk_cobranza

ORDER BY  vencimiento DESC, factura ASC ";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la preparacion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

//SOLO EN CASO DE QUE SE OCUPE
$stmt->bind_param('ssss',$text,$text,$text,$text);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error al pasar variables [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

$rslt = $stmt->get_result();

if ($rslt->num_rows == 0) {
  $system_callback['code'] = 1;
  $system_callback['data'] ="<p db-id=''>No se encontraron resultados</p>";
  $system_callback['message'] = "Script called successfully but there are no rows to display.";
  exit_script($system_callback);
}


$system_callback['data'] = "";

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
  // $ocultar = "";


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


 // if ($admin == "Administrador") {
 //   $ocultar = "";
 // }elseif ($ce == "0") {
 //   $ocultar = "ocultar";
 // }


 $tc_editar = $_SESSION['user']['tc_editar'];
 $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';


 if ($admin || $tc_editar == 1) {
   $editar = "href='#DetCobranza' class='editarCobranza spand-link' data-toggle='modal'";
   $eliminar = "href='#' class='eliminarCobranza spand-link ml-3'";
   $bloqueo="";
 }else {
   $editar = "href='#' class='bn bloqueo'";
   $eliminar = "href='#' class='bn bloqueo'";
   $bloqueo = "bn bloqueo";
 }



  $system_callback['data'] .="<tr class='$background row bordelateral m-0' id='item' style=''>
    <td class='col-md-1'>
     <a $eliminar db-id='$idCobranza'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='$bloqueo img spand-icon'></a>
    </td>
      <td class='col-md-2'>
        <h4><b><input type='color' value='$colorCliente'>$clienteCobranza</b></h4>
        <p><a class='visibilidad'>Semana $semana</a></p>
      </td>
      <td class='col-md-2 text-center'>
        <h4><b>$concepto</b></h4>
        <p><a class='visibilidad'>Fact : $facturaCobranza</a></p>
      </td>

      <td class='col-md-2 text-center'>
        <h4><b> $ $importeCobranza </b></h4>
        <p><a class='visibilidad'>Pagado : $ $pagado</a></p>
      </td>
      <td class='col-md-3 text-center'>
        <h4><b>$dia $vencimientoCobranza</b></h4>
        <p><a class='visibilidad'>Entrega: $entrega</a></p>
      </td>
      <td class='col-md-2 text-right'>

        <a href='' data-target='#coment' data-toggle='modal' class='comentCobranza spand-link mr-3' db-id='$idCobranza'><img src='/fitcoControl/Resources/iconos/coment.svg' class='img spand-icon'></a>

        <!--AGREGAR PAGO DE FACTURA-->
        <a href='#PagoFacturas' class='agregarPago spand-link' data-toggle='modal'  db-id='$idCobranza'><img  src='/fitcoControl/Resources/iconos/003-add.svg' class='img spand-icon'></a>


        <a $editar db-id='$idCobranza'><img  src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='$bloqueo img ml-3 spand-icon'></a>


      </td>
    </tr>";

}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);


 ?>
