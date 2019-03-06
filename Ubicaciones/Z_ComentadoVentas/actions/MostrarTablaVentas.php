<?php
// session_start();
//
// $root = $_SERVER['DOCUMENT_ROOT'];
// require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
//
//
// $data = array(
//   'code' => "",
//   'response' => "",
//   'infoTabla' => ""
// );
// $query = "SELECT
// v.pk_ventas AS idVentas,
// v.nombreCliente AS cliente,
// v.nombreVendedor AS vendedor,
// DATE_FORMAT(v.fechaIngreso, '%d-%m-%Y') AS ingreso,
// DATE_FORMAT(v.fechaBaja, '%d-%m-%Y') AS baja,
// v.precioXprenda AS precioXprenda,
// v.acuerdoPago AS acuerdo,
// v.numeroPrendas AS prendas
//
// FROM ct_ventas v
// ORDER BY ingreso";
//
// if (isset($_POST['ventas'])) {
//   $q = $conn->real_escape_string($_POST['ventas']);
//   $query = "SELECT
//   v.pk_ventas AS idVentas,
//   v.nombreCliente AS cliente,
//   v.nombreVendedor AS vendedor,
//   DATE_FORMAT(v.fechaIngreso, '%d-%m-%Y') AS ingreso,
//   DATE_FORMAT(v.fechaBaja, '%d-%m-%Y') AS baja,
//   v.precioXprenda AS precioXprenda,
//   v.acuerdoPago AS acuerdo,
//   v.numeroPrendas AS prendas
//
//   FROM ct_ventas v
//
//   WHERE nombreCliente LIKE '%$q%' OR
//   nombreVendedor LIKE '%$q%' OR
//   fechaIngreso LIKE '%$q%' OR
//   fechaBaja LIKE '%$q%' OR
//   precioXprenda LIKE '%$q%' OR
//   acuerdoPago LIKE '%$q%' OR
//   numeroPrendas LIKE '%$q%'
//
//   ORDER BY ingreso";
// }
//
// $buscarDatos = $conn->query($query);
// if ($buscarDatos->num_rows > 0) {
//   $tabla.="
//   <form id='Eventas' class='page p-0'>
//     <table class='table table-hover fixed-table'>
//       <thead>
//         <tr class='row m-0 encabezado'>
//           <td class='col-md-1'></td>
//           <td class='col-md-3 text-center'><h3>NUEVO CLIENTE</h3></td>
//           <td class='col-md-3 text-center'><h3>VENDEDOR</td>
//           <td class='col-md-2 text-center'><h3>INGRESO</h3></td>
//           <td class='col-md-3 text-center'><h3></h3></td>
//         </tr>
//       </thead>
//       <tbody id='mostrarVentas'>";
//
//       while ($row = $buscarDatos->fetch_assoc()) {
//        $idVentas = $row['idVentas'];
//        $nombreCliente = $row['cliente'];
//        $nombreVendedor = $row['vendedor'];
//        $fechaIngreso = $row['ingreso'];
//        $precioXprenda = $row['precioXprenda'];
//        $numeroPrendas = $row['prendas'];
//        $acuerdo = $row['acuerdo'];
//
//
//        $ve_editar= $_SESSION['user']['ve_editar'];
//        $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';
//
//
//        if ($admin || $ve_editar == 1) {
//          $editar = "href='#' class='EditVentas spand-link' data-toggle='modal' data-target='#EditarVentas'";
//          $eliminar = "href='#' class='EliminarVenta spand-link'";
//          $bloqueo="";
//        }else {
//          $editar = "href='#' class='bn bloqueo'";
//          $eliminar = "href='#' class='bn bloqueo'";
//          $bloqueo = "bn bloqueo";
//        }
//
//        if ($fechaBaja == 'NULL') {
//          $fechaBaja = "N/A";
//        }else {
//          $fechaBaja = $row['baja'];
//        }
//
//
//       $tabla.="
//         <tr class='row bordelateral m-0' id='item'>
//           <td class='col-md-1'>
//             <img src='/fitcoControl/Resources/iconos/users.svg' class='icono'>
//           </td>
//           <td class='col-md-3'>
//             <h4><b>$nombreCliente</b></h4>
//             <p class='visibilidad'>Prendas x Mes: $numeroPrendas</p>
//           </td>
//           <td class='col-md-3 text-center'>
//             <h4><b>$nombreVendedor</b></h4>
//             <p class='visibilidad'>Acuerdo de Pago: $acuerdo</p>
//           </td>
//           <td class='col-md-2 text-center'>
//             <h4><b>$fechaIngreso</b></h4>
//             <p class='visibilidad'>Baja: $fechaBaja</p>
//           </td>
//           <td class='col-md-1'></td>
//           <td class='col-md-2 text-right'>
//             <a $editar ventas-id='$idVentas'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class=' spand-icon $bloqueo'></a>
//
//             <a $eliminar ventas-id='$idVentas'><img  src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='ml-3 spand-icon $bloqueo'></a>
//           </td>
//         </tr>";
//       }
//
//       $tabla.="
//       </tbody>
//      </table>
//     </form>";
//
//     }else {
//       $tabla="
//       <div id='SinRegistros' class='container-fluid pantallaRegistros'>
//         <div class='tituloSinRegistros'>NO HAY REGISTROS</div>
//       </div>";
//     }
//     echo $tabla;


?>
