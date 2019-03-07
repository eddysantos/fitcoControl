<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$data = $_POST;

$query = "SELECT
p.pk_pagos AS idpagos,
DATE_FORMAT(p.fechaPago,'%d-%m-%Y') AS fecha,
p.importePago As pagado

FROM ct_pagos p

WHERE fk_cobranza =?";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la preparacion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('s',$data['dbid']);
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

while ($row = $rslt->fetch_assoc()) {
  $idpagos = $row['idpagos'];
  $fecha = $row['fecha'];
  $importe = number_format($row['pagado'], 2);
  $tc_editar = $_SESSION['user']['tc_editar'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';


  if ($admin || $tc_editar == 1) {
    $editar = "href='#EdPago' id='btnEditarPago' class=' editarPago spand-linkm' data-toggle='modal'";
    $eliminar = "href='' class='eliminarPago spand-linkm'";
    $bloqueo="";
  }else {
    $editar = "href='#' class='bn bloqueo'";
    $eliminar = "href='' class='bn bloqueo'";
    $bloqueo = "bn bloqueo";
  }


  $system_callback['data'] .="<tr class='row bordelateral m-0' id='item'>
    <td class='col-md-5 text-center'>
      <h4><b>$fecha</b></h4>
    </td>
    <td class='col-md-5 text-center'>
      <h4><b>$ $importe</b></h4>
    </td>
    <td class='col-md-2 text-center pr-0 pl-0'>
      <a $editar db-id='$idpagos'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='$bloqueo mr-4 spand-iconm'></a>

    </td>
  </tr>";

  // <a $eliminar db-id='$idpagos'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='$bloqueo spand-iconm'></a>


}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);

?>
