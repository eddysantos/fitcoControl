<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);


$tabla = "";
$suma = 0;
$pago = 0;
$diferencia = 0;
$query = "SELECT
pk_cuentasPagar AS idCuentas,
proveedor AS proveedor,
descripcion AS descripcion,
montoPago AS total,
fechaVencimiento AS vencimiento,
pagado AS pagado,
factura AS factura

 FROM ct_CuentasxPagar

 ORDER BY vencimiento DESC,proveedor ASC";


 if (isset($_POST['cuentas'])) {
   $q = $conn->real_escape_string($_POST['cuentas']);
   $query = "SELECT
   pk_cuentasPagar AS idCuentas,
   proveedor AS proveedor,
   descripcion AS descripcion,
   montoPago AS total,
   fechaVencimiento AS vencimiento,
   pagado AS pagado,
   factura AS factura

    FROM ct_CuentasxPagar

    WHERE proveedor LIKE '%$q%' OR
    descripcion LIKE '%$q%' OR
    montoPago LIKE '%$q%' OR
    fechaVencimiento LIKE '%$q%' OR
    pagado LIKE '%$q%' OR
    factura LIKE '%$q%'

    ORDER BY vencimiento DESC,proveedor ASC";
}
  $buscarDatos = $conn->query($query);
  if ($buscarDatos->num_rows > 0) {
    $tabla.="
    <form id='Ecuentas' class='page p-0'>
     <table class='table table-hover table-fixed'>
      <thead id='font'>
          <tr class='row m-0 encabezado text-center' style='letter-spacing:1px'>
            <td class='col-md-1'></td>
            <td class='col-md-4'><p>PROVEEDOR</p></td>
            <td class='col-md-2'><p>DESCRIPCION</p></td>
            <td class='col-md-2'><p>TOTAL</p></td>
            <td class='col-md-2'><p>PAGADO/PENDIENTE</p></td>
            <td class='col-md-1'></td>
          </tr>
        </thead>
        <tbody id='mostrarCuentas'>";

        while ($row = $buscarDatos->fetch_assoc()) {
          $id = $row['idCuentas'];
          $proveedor = $row['proveedor'];
          $descripcion = $row['descripcion'];
          $factura = $row['factura'];
          $vencimiento = $row['vencimiento'];
          $pagado = $row['pagado'];
          $total = $row['total'];
          $cle = $_SESSION['user']['cliente_editar'];
          $admin = $_SESSION['user']['privilegiosUsuario'];

          $pendiente = $total - $pagado;

        if ($cle == 1 || $admin == "Administrador") {
          $tabla.= "
            <tr class='row bordelateral m-0' id='item'>
              <td class='col-md-1'>
                <img src='/fitcoControl/Resources/iconos/team.svg' class='icono'>
              </td>
              <td class='col-md-4'>
                <h2><b>$proveedor</a></b></h2>
                <p class='visibilidad'>Fact: $factura</p>
              </td>
              <td class='col-md-2'>
              <h2><b>$descripcion</a></b></h2>
              <p class='visibilidad'>$vencimiento</p>
              </td>
              <td class='col-md-2 text-center'>
                <h2><b>$ $total</a></b></h2>
              </td>
              <td class='col-md-2 text-center'>
                <h2><b>$ $pagado</a></b></h2>
                <p class='visibilidad'>pendiente: $ $pendiente</p>
              </td>

              <td class='col-md-1 text-right'>
                <a href='#' class='EditCuenta spand-link' data-toggle='modal' data-target='#EditarCuenta'  cuenta-id='$id'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='img spand-icon'></a>

                  <a href='#'  class='eliminarCuenta spand-link ml-3' cuenta-id='$id'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='img spand-icon'></a>
              </td>
            </tr>";
            $suma += $row['total'];
            $pago += $row['pagado'];
            $diferencia += $row['total']-$row['pagado'];
        }elseif ($cle == 0) {
         $tabla.= "
         <tr class='row bordelateral m-0' id='item'>
           <td class='col-md-1'>
             <img src='/fitcoControl/Resources/iconos/team.svg' class='icono'>
           </td>
           <td class='col-md-3'>
             <h2><b>$proveedor</a></b></h2>
             <p class='visibilidad'>Fact: $factura</p>

           </td>
           <td class='col-md-3'>
           <h2><b>$descripcion</a></b></h2>
           <p class='visibilidad'>$vencimiento</p>
           </td>
           <td class='col-md-2 text-center'>
             <h2><b>$ $total</a></b></h2>
           </td>
           <td class='col-md-2 text-center'>
             <h2><b>$ $pagado</a></b></h2>
             <p class='visibilidad'>pendiente: $ $pendiente</p>
           </td>
             <td class='col-md-1 text-right'>
               <a href='#' class='spand-link'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='img bloqueo spand-icon'></a>

               <a href='#' class='spand-link ml-3'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='img bloqueo spand-icon'></a>
             </td>
           </tr>";
           $suma += $row['total'];
           $pago += $row['pagado'];
           $diferencia += $row['total']-$row['pagado'];
       }
      }

      setlocale(LC_MONETARY, 'en_US');
      $suma1 =  money_format('%(#10n', $suma);
      $pago1 =  money_format('%(#10n', $pago);
      $diferencia1 =  money_format('%(#10n', $diferencia);
       $tabla.="
       </tbody>
       <tfoot>
         <tr class='row text-center piedetabla m-0'>
            <td class='col-md-4 text-center'><b>Facturas :$ $suma1</b></td>
            <td class='col-md-4 text-center'><b>Pagado :$ $pago1</b></td>
            <td class='col-md-4 text-center'><b>Pendiente :$ $diferencia1</b></td>
          </tr>
        </tfoot>
      </table>
     </form>";


   }else {
     $tabla="<div id='SinRegistros' class='container-fluid pantallaRegistros'>
       <div class='tituloSinRegistros'>NO HAY REGISTROS</div>
     </div>";
   }
   echo $tabla;

?>
