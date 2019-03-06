<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$data = $_POST;

$query = "SELECT * FROM ct_inv_utilizado WHERE fk_inventario = ? ORDER BY fecha_ut DESC";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('s',$data['dbid']);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
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
  $id = $row['pk_inv_utilizado'];
  $fecha_ut = $row['fecha_ut'];
  $utilizado = $row['utilizado'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';
  $invEditar = $_SESSION['user']['pro_invEditar'];

  if ($admin || $invEditar == 1) {
    $editar = "href='#editarUtilizado' data-toggle='modal' db-id='$id' class='editarUtilizado'";
    $bloqueo="";
  }else {
    $editar = "href='#' class='bn bloqueo'";
    $bloqueo = "bn bloqueo";
  }

  $system_callback['data'] .="<tr class='row text-center m-0 borderojo'>
    <td class='col-md-4'>$fecha_ut</td>
    <td class='col-md-5 pl-0 pr-0'>$utilizado</td>
    <td class='col-md-3'>
    <a $editar><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='$bloqueo mr-4 spand-iconm'></a>
  </tr>";

}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);

 ?>
