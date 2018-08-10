<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$data = $_POST;

$data['string'];
$text = "%" . $data['string'] . "%";
$query = "SELECT
*

FROM usuarios_1

WHERE (nombreUsuario LIKE ?)  OR (apellidosUsuario LIKE ?) OR (correoUsuario LIKE ?) OR (departamentoUsuario LIKE ?)

ORDER BY nombreUsuario ASC";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('ssss', $text,$text,$text,$text);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
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
  $idusuario = $row['pk_usuario'];
  $nombreUsuario = $row['nombreUsuario'];
  $apellidosUsuario = $row['apellidosUsuario'];
  $correoUsuario = $row['correoUsuario'];
  $departamentoUsuario = $row['departamentoUsuario'];
  $puestoUsuario = $row['puestoUsuario'];
  $privilegiosUsuario = $row['privilegiosUsuario'];


    $system_callback['data'] .=
    "<p db-id='$idusuario'>$idusuario - $nombreUsuario</p>";
    $id = $idusuario;

    $system_callback['data'] .=
    "<tr class='row bordelateral m-0' id='item'>
        <td class='col-md-1'>
          <img src='/fitcoControl/Resources/iconos/users.svg' class='icono'>
        </td>
        <td class='col-md-4'>
          <h4><b>$nombreUsuario  $apellidosUsuario</b></h4>
          <a class='visibilidad' href='mailto:$correoUsuario'>$correoUsuario</a>
        </td>
        <td class='col-md-3 text-center'>
          <h4><b>$puestoUsuario</b></h4>
          <p class='visibilidad'>$departamentoUsuario</p>
        </td>
        <td class='col-md-2 text-center'>
          <h4><b>$privilegiosUsuario</b></h4>
        </td>
        <td class='col-md-2 text-right'>
          <a href='#EditarUsuario' class='EditUsuario spand-link' data-toggle='modal' db-id='$id'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='spand-icon'></a>

            <a href='#' class='eliminarUser spand-link ml-3'  db-id='$id'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='spand-icon'></a>
        </td>
      </tr>";
}


$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
