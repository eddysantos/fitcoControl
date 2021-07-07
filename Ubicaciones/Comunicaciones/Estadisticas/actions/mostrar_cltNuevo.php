<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$query = "SELECT * FROM clientesNuevos  ORDER BY fecha DESC";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la preparacion del query [$conn->errno]: $conn->error";
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
  $id = $row['pk_clt_nuevos'];
  $fecha = $row['fecha'];
  $numcliente = $row['clientesNuevos'];
  $eliminar = "<a href='' id='eliminarClt' class='eliminarClt spand-linkm' db-id='$id'>
    <img class='mr-4 spand-iconm' src='/fitcoControl/Resources/iconos/004-delete-1.svg'>
  </a>";
  // $editar = "href='#editar_clienteNuevo'";
  // $bloqueo = "";

  $system_callback['data'] .="<tr class='row text-center m-0 borderojo'>
    <td class='col-md-4'>$fecha</td>
    <td class='col-md-5'>$numcliente</td>
      <td class='col-md-3 text-right'>
         <a href='#editar_clienteNuevo' db-id='$id' class='edit_clienteNuevo'>
           <img class='mr-4 spand-iconm' src='/fitcoControl/Resources/iconos/001-edit-1.svg'>
         </a>
       </td>
  </tr>";

}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);

 ?>
