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

WHERE (nombreUsuario LIKE ?)  OR (apellidosUsuario LIKE ?) OR (correoUsuario LIKE ?) OR (departamentoUsuario LIKE ?)";

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
  $idusuario = utf8_encode($row['pk_usuario']);
  $nombreUsuario = utf8_encode($row['nombreUsuario']);
  $apellidosUsuario = utf8_encode($row['apellidosUsuario']);
  $correoUsuario = utf8_encode($row['correoUsuario']);
  $departamentoUsuario = utf8_encode($row['departamentoUsuario']);
  $puestoUsuario = utf8_encode($row['puestoUsuario']);
  $privilegiosUsuario = utf8_encode($row['privilegiosUsuario']);
  $e_usEditar = utf8_encode($_SESSION['user']['e_usEditar']);
  $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';


  if ($admin || $e_usEditar == 1) {
    $editar = "href='#EditarUsuario' class='EditUsuario spand-link' data-toggle='modal' ";
    $eliminar = "href='#' class='eliminarUser spand-link ml-3'";
    $bloqueo="";
  }else {
    $editar = "href='#' class='bn bloqueo'";
    $eliminar = "href='#' class='bn bloqueo'";
    $bloqueo = "bn bloqueo";
  }


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
        <a $editar db-id='$id'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='$bloqueo spand-icon'></a>

          <a $eliminar db-id='$id'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='$bloqueo spand-icon'></a>
      </td>
    </tr>";
}



$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
