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
-- DATE_FORMAT(co.vencimientoCobranza,'%d-%m-%Y') AS vencimiento,
co.vencimientoCobranza AS vencimiento,
ct.colorCliente AS color,
ct.creditoCliente AS credito,
SUM(pg.importePago) AS pagado


FROM ct_cobranza co

LEFT JOIN ct_cliente ct ON co.fk_cliente = ct.pk_cliente
LEFT JOIN ct_pagos pg ON co.pk_cobranza = pg.fk_cobranza

GROUP BY co.pk_cobranza

ORDER BY nombre ASC,vencimiento";


if (isset($_POST['cobranza'])) {
  $q = $conn->real_escape_string($_POST['cobranza']);
  $query = "SELECT

  co.pk_cobranza AS idcobranza,
  ct.nombreCliente AS nombre,
  co.facturaCobranza AS factura,
  co.importeCobranza AS importe,
  co.vencimientoCobranza AS vencimiento,
  ct.colorCliente AS color,
  ct.creditoCliente AS credito,
  SUM(pg.importePago) AS pagado

  FROM ct_cobranza co

  LEFT JOIN ct_cliente ct ON co.fk_cliente = ct.pk_cliente
  LEFT JOIN ct_pagos pg ON co.pk_cobranza = pg.fk_cobranza

  WHERE ct.nombreCliente LIKE '%$q%' OR
  co.facturaCobranza LIKE '%$q%' OR
  co.importeCobranza LIKE '%$q%' OR
  co.vencimientoCobranza LIKE '%$q%' OR
  ct.creditoCliente LIKE '%$q%' OR
  pg.importePago LIKE '%$q%'

  GROUP BY co.pk_cobranza

  ORDER BY nombre ASC,vencimiento";
}


 $buscarDatos=$conn->query($query);
 if ($buscarDatos->num_rows > 0) {
   $tabla.="
   <form id='Ecobranza' class='page p-0'>
    <table class='table table-hover table-fixed'>
     <thead id='font'>
       <tr class='row text-center encabezado m-0'>
         <td class='col-md-1'></td>
         <td class='col-md-2'>CLIENTE</td>
         <td class='col-md-1'>FACTURA</td>
         <td class='col-md-2'>IMPORTE</td>
         <td class='col-md-2'>PAGADO</td>
         <td class='col-md-2'>VENCIMIENTO</td>
       </tr>
     </thead>";

   while($row = $buscarDatos->fetch_assoc()){


     $idCobranza = $row['idcobranza'];
     $clienteCobranza = $row['nombre'];
     $facturaCobranza = $row['factura'];
     $pagado = number_format($row['pagado'], 2);
     $hoy = date("Y-m-d");
     $importeCobranza = number_format($row['importe'], 2);
     $vencimientoCobranza = $row['vencimiento'];
     $colorCliente = $row['color'];
     $creditoCliente = $row['credito'];
     $background = "";
     $ocultar = "";
     $ce =  $_SESSION['user']['cobranza_editar'];
     $admin = $_SESSION['user']['privilegiosUsuario'];

     if (($importeCobranza == $pagado) && ($vencimientoCobranza == $hoy)) {
       $background = "verde";
     }elseif (($vencimientoCobranza < $hoy) && ($importeCobranza == $pagado)) {
       $background = "verde";
     }elseif (($vencimientoCobranza < $hoy) && ($importeCobranza > $pagado)) {
       $background = "rojo";
     }

    if ($admin == "Administrador") {
      $ocultar = "";
    }elseif ($ce == "0") {
      $ocultar = "ocultar";
    }

     $tabla.= "
     <tbody id='mostrarCobranza'>
       <tr class='$background row bordelateral m-0' id='item'>
         <td class='col-md-1'>
           <img src='/fitcoControl/Resources/iconos/dinero.svg' class='icono'>
         </td>
         <td class='col-md-2'>
           <h4><b><input type='color' value='$colorCliente'>$clienteCobranza</b></h4>
           <p><a class='visibilidad'>Credito : $creditoCliente Días</a></p>
         </td>
         <td class='col-md-1 text-center'>
           <h4><b>$facturaCobranza</b></h4>
         </td>
         <td class='col-md-2 text-center'>
           <h4><b> $ $importeCobranza </b></h4>
         </td>
         <td class='col-md-2 text-center'>
           <h4><b> $ $pagado </b></h4>
         </td>
         <td class='col-md-2 text-center'>
           <h4><b> $vencimientoCobranza </b></h4>
         </td>
         <td class='col-md-2 text-right'>
           <!--AGREGAR PAGO DE FACTURA-->
           <a href='' id='btnEditarCobranza' class='$ocultar editarCobranza spand-link' data-toggle='modal' data-target='#DetCobranza' cobranza-id='$idCobranza'><img src='/fitcoControl/Resources/iconos/pencil1.svg' class='mr-3 spand-icon'></a>

           <a href='' id='btnAgregarPago' class='agregarPago spand-link' data-toggle='modal' data-target='#PagoFacturas' cobranza-id='$idCobranza'><img src='/fitcoControl/Resources/iconos/003-add.svg' class='spand-icon'></a>

           <a href='' class='visualizarcobranza spand-link' data-toggle='modal' data-target='#VisualizarTablaCobranza' cobranza-id='$idCobranza'><img src='/fitcoControl/Resources/iconos/magnifier.svg' class='ml-3 spand-icon'></a>
         </td>
       </tr>
     </tbody>";
     $suma += $row['importe'];
     $total += $row['pagado'];
     $diferencia += $row['importe']-$row['pagado'];
   }
   $tabla.="
     <tfoot>
       <tr class='row text-center piedetabla m-0'>
          <td class='col-md-4 text-center'><b>Facturado : $ $suma </b></td>
          <td class='col-md-4 text-center'><b>Pagado : $ $total </b></td>
          <td class='col-md-4 text-center'><b>Diferencia : $ $diferencia </b></td>
        </tr>
      </tfoot>
    </table>
   </form>";
 }else {
   $tabla="No se encontraron coincidencias";
 }

 echo $tabla;


 ?>
