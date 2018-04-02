<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";


$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);
$query = "SELECT
v.pk_ventas AS idVentas,
v.nombreCliente AS cliente,
v.nombreVendedor AS vendedor,
v.fechaIngreso AS ingreso,
v.fechaBaja AS baja,
v.precioXprenda AS precioXprenda,
v.acuerdoPago AS acuerdo,
v.numeroPrendas AS prendas

FROM ct_ventas v
ORDER BY ingreso";

if (isset($_POST['ventas'])) {
  $q = $conn->real_escape_string($_POST['ventas']);
  $query = "SELECT
  v.pk_ventas AS idVentas,
  v.nombreCliente AS cliente,
  v.nombreVendedor AS vendedor,
  v.fechaIngreso AS ingreso,
  v.fechaBaja AS baja,
  v.precioXprenda AS precioXprenda,
  v.acuerdoPago AS acuerdo,
  v.numeroPrendas AS prendas

  FROM ct_ventas v

  WHERE nombreCliente LIKE '%$q%' OR
  nombreVendedor LIKE '%$q%' OR
  fechaIngreso LIKE '%$q%' OR
  fechaBaja LIKE '%$q%' OR
  precioXprenda LIKE '%$q%' OR
  acuerdoPago LIKE '%$q%' OR
  numeroPrendas LIKE '%$q%'

  ORDER BY ingreso";
}

$buscarDatos = $conn->query($query);
if ($buscarDatos->num_rows > 0) {
  $tabla.="
  <form id='Eventas' class='page p-0'>
    <table class='table table-hover fixed-table'>
      <thead>
        <tr class='row m-0 encabezado'>
          <td class='col-md-1'></td>
          <td class='col-md-3 text-center'><h3>NUEVO CLIENTE</h3></td>
          <td class='col-md-3 text-center'><h3>VENDEDOR</td>
          <td class='col-md-2 text-center'><h3>INGRESO</h3></td>
          <td class='col-md-3 text-center'><h3></h3></td>
        </tr>
      </thead>
      <tbody id='mostrarVentas'>";

      while ($row = $buscarDatos->fetch_assoc()) {
       $idVentas = $row['idVentas'];
       $nombreCliente = $row['cliente'];
       $nombreVendedor = $row['vendedor'];
       $fechaIngreso = $row['ingreso'];
       $fechaBaja = $row['baja'];
       $precioXprenda = $row['precioXprenda'];
       $numeroPrendas = $row['prendas'];
       $acuerdo = $row['acuerdo'];
       $ev =  $_SESSION['user']['editarVentas'];
       $admin = $_SESSION['user']['privilegiosUsuario'] == "Administrador";
       $bloqueo =  "bloqueo";

        if ($ev == 1 || $admin) {
          $tabla.="
            <tr class='row bordelateral m-0' id='item'>
              <td class='col-md-1'>
                <img src='/fitcoControl/Resources/iconos/users.svg' class='icono'>
              </td>
              <td class='col-md-3'>
                <h4><b>$nombreCliente</b></h4>
                <p class='visibilidad'>Prendas x Mes: $numeroPrendas</p>
              </td>
              <td class='col-md-3 text-center'>
                <h4><b>$nombreVendedor</b></h4>
                <p class='visibilidad'>Acuerdo de Pago: $acuerdo</p>
              </td>
              <td class='col-md-2 text-center'>
                <h4><b>$fechaIngreso</b></h4>
              </td>
              <td class='col-md-1'></td>
              <td class='col-md-2 text-right'>
                <a href='#' class='EditVentas spand-link' data-toggle='modal' data-target='#EditarVentas' ventas-id='$idVentas'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class=' spand-icon'></a>

                <a href='#' class='EliminarVenta spand-link' ventas-id='$idVentas'><img  src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='ml-3 spand-icon'></a>
              </td>
            </tr>";
        }elseif ($ev == 0) {
          $tabla.="
            <tr class='row bordelateral m-0' id='item'>
              <td class='col-md-1'>
                <img src='/fitcoControl/Resources/iconos/users.svg' class='icono'>
              </td>
              <td class='col-md-3'>
                <h4><b>$nombreCliente</b></h4>
                <p class='visibilidad'>Prendas x Mes: $numeroPrendas</p>
              </td>
              <td class='col-md-3 text-center'>
                <h4><b>$nombreVendedor</b></h4>
                <p class='visibilidad'>Acuerdo de Pago: $acuerdo</p>
              </td>
              <td class='col-md-2 text-center'>
                <h4><b>$fechaIngreso</b></h4>
              </td>
              <td class='col-md-1'></td>
              <td class='col-md-2 text-right'>
                <a href='#' class='spand-link' id='$bloqueo'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='spand-icon'></a>

                <a href='#' class='spand-link' id='$bloqueo'><img  src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='ml-3 spand-icon'></a>
              </td>
            </tr>";
        }
      }

      $tabla.="
      </tbody>
     </table>
    </form>";

    }else {
      $tabla="No se encontraron coincidencias";
    }
    echo $tabla;


?>
