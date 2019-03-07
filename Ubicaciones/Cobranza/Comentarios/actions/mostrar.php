<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$query = "SELECT * FROM comen_cobranza WHERE fk_cobranza =?";


$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la preparacion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('s', $_POST['dbid']);
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
  $tc_editar = $_SESSION['user']['tc_editar'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';


  if ($admin || $tc_editar == 1) {
    $editar = "href='#edit_coment' data-toggle='modal' id='btnEditarCom' class='editarComen spand-linkm'";
    $bloqueo="";
  }else {
    $editar = "href='#' class='bn bloqueo'";
    $bloqueo = "bn bloqueo";
  }


  $pk_coment = $row['pk_coment'];
  $fecha = $row['fecha'];
  $comentario = $row['comentario'];

  $system_callback['data'] .="<tr class='row' id='item'>

    <td class='col-md-3 text-center'>
      <h4><b>$fecha</b></h4>
    </td>
    <td class='col-md-8 left'>
      <h4><b>$comentario</b></h4>
    </td>
    <td class='col-md-1 text-center pr-0 pl-0'>
    <a $editar db-id='$pk_coment'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='$bloqueo mr-4 spand-iconm'></a>
    </td>
  </tr>";

}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);

?>
