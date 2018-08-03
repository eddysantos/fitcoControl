<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";


$tabla = "";
$suma = 0;
$pago = 0;
$diferencia = 0;
$query = "SELECT
cxp.pk_cuentasPagar AS idCuentas,
cxp.proveedor AS proveedor,
cxp.descripcion AS descripcion,
cxp.montoPago AS total,
cxp.fechaVencimiento AS vencimiento,
cxp.pagado AS pagado,
cxp.factura AS factura

 FROM ct_CuentasxPagar cxp

 ORDER BY vencimiento ASC";

  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    $tabla.="
    <div class='m-5'>
      <a href='/fitcoControl/Ubicaciones/CuentasxPagar/CuentasxPagar.php' class='consultar'><img style='width: 100px;' src='/fitcoControl/Resources/iconos/logoFitco.png'></a>
    </div>
    <form class='page p-0'>
     <table class='table table-bordered'>
      <thead id='font'>
        <tr>
          <td width='20%'>PROVEEDOR</td>
          <td width='10%'>#FACT.</td>
          <td width='10%'>CONCETO</td>
          <td width='8%'>TOTAL DE FACT</td>
          <td width='8%'>PAGADO</td>
          <td width='10%'>VENCIDO</td>
          <td width='10%'>VENCIMIENTO</td>
        </tr>
        </thead>
        <tbody id='mostrarCuentas'>";

      while ($row = $result->fetch_assoc()) {
        $id = $row['idCuentas'];
        $proveedor = $row['proveedor'];
        $descripcion = $row['descripcion'];
        $factura = $row['factura'];
        $vencimiento = $row['vencimiento'];
        $pagado = $row['pagado'];
        $total = $row['total'];
        $ce = $_SESSION['user']['cobranza_editar'];
        $admin = $_SESSION['user']['privilegiosUsuario'];
        $hoy = date('Y-m-d');
        $pendiente = $total - $pagado;


        if (($total == $pagado) && ($vencimiento == $hoy)) {
          $background = "verde";
        }elseif (($vencimiento < $hoy) && ($total == $pagado)) {
          $background = "verde";
        }elseif (($vencimiento > $hoy) && ($total == $pagado)) {
          $background = "verde";
        }elseif (($vencimiento < $hoy) && ($total <> $pagado)) {
          $background = "rojo";
        }

        if ($total == $pagado || $vencimiento > $hoy) {
          $vervencido = "display:none";
        }else {
          $vervencido = "";
        }


        $tabla.=
        "<tr class='$background font12' id='item' style='$vervencido'>
            <td with='20%'>$proveedor</td>
            <td with='10%'>$factura</td>
            <td with='10%'>$descripcion</td>
            <td with='10%'>$ $total</td>
            <td with='10%'>$ $pagado</td>
            <td with='10%'>$ $pendiente</td>
            <td with='10%'>$vencimiento</td>
          </tr>";
          $suma += $row['total'];
          $pago += $row['pagado'];
          $diferencia += $row['total']-$row['pagado'];
      }


   }else {
     $tabla="<div id='SinRegistros' class='container-fluid pantallaRegistros'>
       <div class='tituloSinRegistros'>NO HAY REGISTROS</div>
     </div>";
   }
   echo $tabla;

?>
