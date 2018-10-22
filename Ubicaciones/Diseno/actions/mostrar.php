<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$query = "SELECT * FROM ct_diseno";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query execution [$stmt->errno]: $stmt->error";
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
  $dis_editar = $_SESSION['user']['dis_editar'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';
  $id = $row['pk_diseno'];

  if ($admin || $dis_editar == 1) {
    $editar = "href='#edit_registro' id='editar-registro' class='editar spand-linkm' style='text-decoration:none'";
    $eliminar = "href='#' class='eliminar spand-linkm' ";
    $bloqueo="";
  }else {
    $editar = "href='#' class='bn bloqueo'";
    $eliminar = "href='#' class='bn bloqueo'";
    $bloqueo = "bn bloqueo";
  }


  $system_callback['data'] .="<tr class='row text-center m-0 borderojo'>
    <td class='col-md-3'>$row[fecha]</td>
    <td class='col-md-3'>$row[dis_requerido]</td>
    <td class='col-md-3'>$row[dis_entregados]</td>
    <td class='col-md-3 text-right'>
       <a $editar db-id='$id'>
         <img class='$bloqueo mr-4 spand-iconm' src='/fitcoControl/Resources/iconos/001-edit-1.svg'>
       </a>

       <a $eliminar db-id='$id'>
         <img class='$bloqueo mr-4 spand-iconm' src='/fitcoControl/Resources/iconos/004-delete-1.svg'>
       </a>
     </td>
  </tr>";
}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
