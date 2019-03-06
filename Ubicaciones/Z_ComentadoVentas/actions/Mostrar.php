<?php
// session_start();
//
// $root = $_SERVER['DOCUMENT_ROOT'];
// require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';
//
//
// $system_callback = [];
// $data = $_POST;
//
// $data['string'];
// $text = "%" . $data['string'] . "%";
// $query = "SELECT
// pk_ventas AS idVentas,
// nombreCliente AS cliente,
// nombreVendedor AS vendedor,
// fechaIngreso AS ingreso,
// fechaBaja AS baja,
// precioXprenda AS precioXprenda,
// acuerdoPago AS acuerdo,
// numeroPrendas AS prendas
//
// FROM ct_ventas v
// WHERE (nombrecliente LIKE ?)  OR (nombrevendedor LIKE ?) OR (fechaIngreso LIKE ?)
// ORDER BY ingreso";
//
//
// $stmt = $conn->prepare($query);
// if (!($stmt)) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
//   exit_script($system_callback);
// }
//
//
// $stmt->bind_param('sss', $text,$text,$text);
// if (!($stmt)) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
//   exit_script($system_callback);
// }
//
// if (!($stmt->execute())) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error during query execution [$stmt->errno]: $stmt->error";
//   exit_script($system_callback);
// }
//
// $rslt = $stmt->get_result();
//
// if ($rslt->num_rows == 0) {
//   $system_callback['code'] = 1;
//   $system_callback['data'] ="<p db-id=''>No se encontraron resultados</p>";
//   $system_callback['message'] = "Script called successfully but there are no rows to display.";
//   exit_script($system_callback);
// }
//
//
// while ($row = $rslt->fetch_assoc()) {
//  $idVentas = utf8_encode($row['idVentas']);
//  $nombreCliente = utf8_encode($row['cliente']);
//  $nombreVendedor = utf8_encode($row['vendedor']);
//  $fechaIngreso = utf8_encode($row['ingreso']);
//  $precioXprenda = utf8_encode($row['precioXprenda']);
//  $numeroPrendas = utf8_encode($row['prendas']);
//  $acuerdo = utf8_encode($row['acuerdo']);
//
//
//  $ve_editar= $_SESSION['user']['ve_editar'];
//  $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';
//
//
//  if ($admin || $ve_editar == 1) {
//    $editar = "href='#EditarVentas' class='EditVentas spand-link' data-toggle='modal'";
//    $eliminar = "href='#' class='EliminarVenta spand-link'";
//    $bloqueo="";
//  }else {
//    $editar = "href='#' class='bn bloqueo'";
//    $eliminar = "href='#' class='bn bloqueo'";
//    $bloqueo = "bn bloqueo";
//  }
//
//  if ($fechaBaja == 'NULL') {
//    $fechaBaja = "N/A";
//  }else {
//    $fechaBaja = $row['baja'];
//  }
//
//  $id = $idVentas;
//
// $system_callback['data'] .="
//   <tr class='row bordelateral m-0' id='item'>
//     <td class='col-md-1'>
//       <img src='/fitcoControl/Resources/iconos/users.svg' class='icono'>
//     </td>
//     <td class='col-md-3'>
//       <h4><b>$nombreCliente</b></h4>
//       <p class='visibilidad'>Prendas x Mes: $numeroPrendas</p>
//     </td>
//     <td class='col-md-3 text-center'>
//       <h4><b>$nombreVendedor</b></h4>
//       <p class='visibilidad'>Acuerdo de Pago: $acuerdo</p>
//     </td>
//     <td class='col-md-2 text-center'>
//       <h4><b>$fechaIngreso</b></h4>
//       <p class='visibilidad'>Baja: $fechaBaja</p>
//     </td>
//     <td class='col-md-1'></td>
//     <td class='col-md-2 text-right'>
//       <a $editar db-id='$id'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class=' spand-icon $bloqueo'></a>
//
//       <a $eliminar db-id='$id'><img  src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='ml-3 spand-icon $bloqueo'></a>
//     </td>
//   </tr>";
// }
//
// $system_callback['code'] = 1;
// $system_callback['message'] = "Script called successfully!";
// exit_script($system_callback);

 ?>
