<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$data = $_POST;

$data['string'];
$text = "%" . $data['string'] . "%";
$query = "SELECT * FROM ct_linea_copy1 WHERE (linea LIKE ?)  OR (nombre LIKE ?) OR (fecha LIKE ?) ORDER BY fecha DESC, nombre";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('sss', $text,$text,$text);
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
  $idlinea = $row['pk_linea'];
  $linea = utf8_encode($row['linea']);
  $fecha = $row['fecha'];
  $nombre = utf8_encode($row['nombre']);


  $pro_liEditar= $_SESSION['user']['pro_liEditar'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';


  if ($admin || $pro_liEditar == 1) {
    $editar = "href='#EditarLinea' data-toggle='modal' class='editar-linea spand-link'";
    $eliminar = "href='#' class='EliminarLinea spand-link'";
    $bloqueo="";
  }else {
    $editar = "href='#' class='bn bloqueo'";
    $eliminar = "href='#' class='bn bloqueo'";
    $bloqueo = "bn bloqueo";
  }

  // $system_callback['data'] .=
  // "<p db-id='$idlinea'>$idlinea - $operacion</p>";
  $id = $idlinea;

  $system_callback['data'] .=
  "<tr class='row bordelateral m-0 text-center' id='item'>
    <td class='col-md-2'>$fecha</td>
    <td class='col-md-6'>$nombre</td>
    <td class='col-md-1'>$linea</td>
    <td class='col-md-3 text-right'>
      <a href='' data-target='#addProducc' data-toggle='modal' class='addProducc spand-link' db-id='$id'><img src='/fitcoControl/Resources/iconos/003-add.svg' class='spand-icon'></a>

      <a href='' class='visualizarProd spand-link' data-toggle='modal' data-target='#VerProdLineas' db-id='$id'><img  src='/fitcoControl/Resources/iconos/magnifier.svg' class='img ml-3 spand-icon'></a>

      <a $editar db-id='$id'><img  src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='$bloqueo img ml-3 spand-icon'></a>

      <a $eliminar db-id='$id'><img  src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='$bloqueo img ml-3 spand-icon'></a>


    </td>
  </tr>";
}


$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
