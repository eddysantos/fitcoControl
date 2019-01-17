<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$query = "SELECT * FROM ct_program_copy1 ORDER BY start desc";

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
  $pk_programacion = $row['pk_programacion'];
  $cliente = $row['title'];
  $corte = $row['corte'];
  $color = $row['color'];
  $piezasRequeridas = $row['piezasRequeridas'];
  $piezasDiarias = $row['piezasDiarias'];
  $piezasHora = $row['piezasHora'];
  $horasNecesarias = $row['horasNecesarias'];
  $start = $row['start'];
  $end = $row['end'];
  $pro_liEditar= $_SESSION['user']['pro_liEditar'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';

  if ($admin || $pro_pgEditar == 1) {
    $editar = "href='#modalEditarProgram' class='EditarProgram spand-link'";
    $eliminar = "href='#' class='EliminarProgram spand-link'";
    $bloqueo="";
  }else {
    $editar = "href='#' class='bn bloqueo'";
    $eliminar = "href='#' class='bn bloqueo'";
    $bloqueo = "bn bloqueo";
  }

  // si es negro no tomar en cuenta
  if ($color === '#000000') {
    $displaynone = "display:none";
  }else {
    $displaynone = "";
  }


    $system_callback['data'] .=
    "<p db-id='$pk_programacion'>$pk_programacion - $cliente</p>";
    $id = $pk_programacion;

    $system_callback['data'] .=
    "<tr style='$displaynone' class='row bordelateral m-0 text-center' id='item'>
      <td class='col-md-2 text-left'><h5><b><input type='color' value='$color'>$cliente</b></h5></td>
      <td class='col-md-1'>$corte</td>
      <td class='col-md-1'>$piezasRequeridas</td>
      <td class='col-md-1'>$piezasDiarias</td>
      <td class='col-md-1'>$piezasHora</td>
      <td class='col-md-1'>$horasNecesarias</td>
      <td class='col-md-2'>$start</td>
      <td class='col-md-2'>$end</td>
      <td class='col-md-1'>
        <a $editar db-id='$id'><img  src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='$bloqueo img ml-3 spand-icon'></a>
        <a $eliminar db-id='$id'><img  src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='$bloqueo img ml-3 spand-icon'></a>
      </td>
    </tr>";
}


$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
