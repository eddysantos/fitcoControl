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

FROM ct_mantenimiento

WHERE (mant_Inv LIKE ?)  OR (area LIKE ?) OR (proveedor LIKE ?) OR (fechaRequerido LIKE ?) ORDER BY orden ASC";

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
  $idMant = utf8_encode($row['pk_mantenimiento']);
  $orden = utf8_encode($row['orden']);
  $mant_Inv = utf8_encode($row['mant_Inv']);
  $area = utf8_encode($row['area']);
  $descripcion = utf8_encode($row['descripcion']);
  $proveedor = utf8_encode($row['proveedor']);
  $costo = utf8_encode($row['costo']);
  $fechaRequerido = utf8_encode($row['fechaRequerido']);
  $pagado = utf8_encode($row['pagado']);
  $autorizacion = utf8_encode($row['autorizacion']);
  $pro_miEditar = utf8_encode($_SESSION['user']['pro_miEditar']);
  $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';



  if ($admin || $pro_miEditar == 1) {
    $editar = "href='#EditarMantenimiento' class='EditMantenimiento spand-link' data-toggle='modal' ";
    $eliminar = "href='#' class='eliminarMant spand-link ml-3'";
    $bloqueo="";
  }else {
    $editar = "href='#' class='bn bloqueo'";
    $eliminar = "href='#' class='bn bloqueo'";
    $bloqueo = "bn bloqueo";
  }

  if ($autorizacion == 1) {
    $color = "verde";
  }else {
    $color = "";
  }

  if ($pagado == 1) {
    $display = "display:none";
  }else {
    $display = "";
  }
  $id = $idMant;
  

    $system_callback['data'] .=
    "<div class='$color  bordelateral m-0 font12 bordebottom' style='$display'>
      <div class='row'>
        <div class='col-md-1 text-center'></div>
        <div class='text-right p-0 col-md-1 gris'>Mant / Inv: </div>
        <div class='col-md-4'>$mant_Inv</div>
        <div class='text-right p-0 col-md-1 gris'>Proveedor: </div>
        <div class='col-md-3'>$proveedor</div>
        <div class='col-md-2 text-center'></div>
      </div>
      <div class='row'>
        <div class='col-md-1 text-center'>$orden</div>
        <div class='text-right p-0 col-md-1 pt-2 gris'>Area : </div>
        <div class='col-md-4 pt-2'> $area</div>
        <div class='text-right p-0 col-md-1 pt-2 gris'>Costo con IVA : </div>
        <div class='col-md-3 pt-2'>$ $costo</div>
        <div class='col-md-2 text-right pr-5'>
          <a $editar db-id='$id'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='$bloqueo spand-icon'></a>
          <a $eliminar db-id='$id'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='$bloqueo spand-icon'></a>
        </div>
      </div>
      <div class='row'>
        <div class='col-md-1 text-center'></div>
        <div class='text-right p-0 col-md-1 gris'>Descripcion: </div>
        <div class='col-md-4'> $descripcion</div>
        <div class='text-right p-0 col-md-1 gris'>Fecha Requerido: </div>
        <div class='col-md-3'>$fechaRequerido</div>
        <div class='col-md-2 text-center'></div>
      </div>
    </div>";
}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
