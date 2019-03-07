<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$data = $_POST;
$query = "SELECT
pk_CorteDiario AS id,
DATE_FORMAT(fechaIntroduccion,'%d-%m-%Y') AS fecha,
metaCorte AS meta,
cantidadCorte AS cant,
notas

FROM ct_CorteDiario

WHERE fk_CorteCalendario =?";

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
  $id = $row['id'];
  $notas = $row['notas'];
  $fecha = $row['fecha'];
  $meta = $row['meta'];
  $cantidad = $row['cant'];
  $pro_corEditar = $_SESSION['user']['pro_corEditar'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';


  if ($admin || $pro_corEditar == 1) {
    $editar = "href='#EdCor' class='editarCor spand-linkm' data-toggle='modal'";
    $eliminar = "href='#' class='eliminarCor spand-linkm ml-3'";
    $bloqueo="";
  }else {
    $editar = "href='#' class='bn bloqueo'";
    $eliminar = "href='#' class='bn bloqueo'";
    $bloqueo = "bn bloqueo";
  }

  $system_callback['data'] .="<tr class='row text-center bordelateral' id='item'>
    <td class='col-md-3'>
      <h4><b>$fecha</b></h4>
    </td>
    <td class='col-md-2'>
      <h4><b>$meta pzs</b></h4>
    </td>
    <td class='col-md-2'>
      <h4><b>$cantidad pzs</b></h4>
    </td>
    <td class='col-md-3'>
      <h4><b>$notas</b></h4>
    </td>
    <td class='col-md-2 text-right'>
      <a $editar db-id='$id'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='spand-iconm'></a>

      <a $eliminar  db-id='$id'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='spand-iconm'></a>
    </td>
  </tr>";

}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
?>
