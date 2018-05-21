<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";


$tabla = "";
$suma = 0;
$total = 0;
$diferencia = 0;
$query = "SELECT
co.pk_cobranza AS idcobranza,
ct.nombreCliente AS nombre,
co.facturaCobranza AS factura,
co.importeCobranza AS importe,

co.vencimientoCobranza AS vencimiento,
-- DATE_FORMAT(co.vencimientoCobranza, '%d-%m-%Y') AS vencimiento,


WEEK(co.vencimientoCobranza) AS semana,
co.conceptoPago AS concepto,



co.fechaEntrega AS entrega,
-- DATE_FORMAT(co.fechaEntrega, '%d-%m-%Y') AS entrega,


ct.colorCliente AS color,
ct.creditoCliente AS credito,
sum(pg.importePago) AS pagado


FROM ct_cobranza co

LEFT JOIN ct_cliente ct ON co.fk_cliente = ct.pk_cliente
LEFT JOIN ct_pagos pg ON co.pk_cobranza = pg.fk_cobranza

GROUP BY co.pk_cobranza

ORDER BY semana DESC, vencimiento DESC limit 30";


if (isset($_POST['cobranza'])) {
  $q = $conn->real_escape_string($_POST['cobranza']);
  $query = "SELECT
  co.pk_cobranza AS idcobranza,
  ct.nombreCliente AS nombre,
  co.facturaCobranza AS factura,
  co.importeCobranza AS importe,

  co.vencimientoCobranza AS vencimiento,
  -- DATE_FORMAT(co.vencimientoCobranza, '%d-%m-%Y') AS vencimiento,

  WEEK(co.vencimientoCobranza) AS semana,
  co.conceptoPago AS concepto,

  co.fechaEntrega AS entrega,
  -- DATE_FORMAT(co.fechaEntrega, '%d-%m-%Y') AS entrega,

  ct.colorCliente AS color,
  ct.creditoCliente AS credito,
  sum(pg.importePago) AS pagado


  FROM ct_cobranza co

  LEFT JOIN ct_cliente ct ON co.fk_cliente = ct.pk_cliente
  LEFT JOIN ct_pagos pg ON co.pk_cobranza = pg.fk_cobranza

  WHERE ct.nombreCliente LIKE '%$q%' OR
  co.facturaCobranza LIKE '%$q%' OR
  co.importeCobranza LIKE '%$q%' OR
  co.vencimientoCobranza LIKE '%$q%' OR
  co.conceptoPago LIKE '%$q%' OR
  co.fechaEntrega LIKE '%$q%' OR
  ct.creditoCliente LIKE '%$q%' OR
  pg.importePago LIKE '%$q%'

  GROUP BY co.pk_cobranza

  ORDER BY semana DESC, vencimiento DESC limit 30";
}


 $buscarDatos=$conn->query($query);
 if ($buscarDatos->num_rows > 0) {
   $tabla.="
   <form id='Ecobranza' class='page p-0'>
    <table class='table table-hover table-fixed'>
     <thead id='font'>
       <tr class='row text-center encabezado m-0' style='letter-spacing:1px'>
         <td class='col-md-1'></td>
         <td class='col-md-2'>CLIENTE</td>
         <td class='col-md-2'>CONCETO</td>
         <td class='col-md-2'>TOTALES</td>
         <td class='col-md-3'>VENCIMIENTO</td>
       </tr>
     </thead>
     <tbody id='mostrarCobranza'>";

   while($row = $buscarDatos->fetch_assoc()){


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
     }
     elseif (($vencimientoCobranza < $hoy) && ($importeCobranza > $pagado)) {
       $background = "rojo";
     }
     // else {
     //    $background = "";
     // }


    if ($admin == "Administrador") {
      $ocultar = "";
    }elseif ($ce == "0") {
      $ocultar = "ocultar";
    }

     $tabla.= "
       <tr class='$background row bordelateral m-0' id='item'>
       <td class='col-md-1'>
        <img src='/fitcoControl/Resources/iconos/dinero.svg' class='img icono mr-5'>
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
           <!--AGREGAR PAGO DE FACTURA-->
           <a href='' id='btnAgregarPago' class='agregarPago spand-link' data-toggle='modal' data-target='#PagoFacturas' cobranza-id='$idCobranza'><img  src='/fitcoControl/Resources/iconos/003-add.svg' class='img spand-icon'></a>

           <a href='' class='visualizarcobranza spand-link' data-toggle='modal' data-target='#VisualizarTablaCobranza' cobranza-id='$idCobranza'><img  src='/fitcoControl/Resources/iconos/magnifier.svg' class='img ml-3 spand-icon'></a>

           <a href='' class='$ocultar editarCobranza spand-link' data-toggle='modal' data-target='#DetCobranza' cobranza-id='$idCobranza'><img  src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='img ml-3 spand-icon'></a>

           <a href='#' class='eliminarCobranza spand-link ml-3 $ocultar' cobranza-id='$idCobranza'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='img spand-icon'></a>
         </td>
       </tr>";
     $suma += $row['importe'];
     $total += $row['pagado'];
     $diferencia += $row['importe']-$row['pagado'];
   }
   setlocale(LC_MONETARY, 'en_US');
   $suma1 =  money_format('%(#10n', $suma);
   $total1 =  money_format('%(#10n', $total);
   $diferencia1 =  money_format('%(#10n', $diferencia);

   $tabla.="
     </tbody>
     <tfoot>
       <tr class='row text-center piedetabla m-0'>
          <td class='col-md-4 text-center'><b>Facturado :$ $suma1</b></td>
          <td class='col-md-4 text-center'><b>Pagado :$ $total1</b></td>
          <td class='col-md-4 text-center'><b>Diferencia :$ $diferencia1</b></td>
        </tr>
      </tfoot>
    </table>
   </form>";
 }else {
   $tabla="
   <div id='SinRegistros' class='container-fluid pantallaRegistros'>
     <div class='tituloSinRegistros'>NO HAY REGISTROS</div>
   </div>";
 }

 echo $tabla;


 ?>
