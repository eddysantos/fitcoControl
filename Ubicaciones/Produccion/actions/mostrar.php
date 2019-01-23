<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';


$system_callback = [];
$data = $_POST;

$data['string'];
$text = "%" . $data['string'] . "%";
$query = "SELECT
p.pk_programacion AS idprogram,
p.title AS cliente,
p.end AS ffin,
year(p.end) AS anio,
p.piezasRequeridas AS piezas,
p.color AS color,
SUM(pr.cantidadProduccion) AS total

FROM ct_program p

LEFT JOIN ct_produccion pr ON p.pk_programacion = pr.fk_programacion
WHERE (title LIKE ?)  OR (end LIKE ?)
GROUP BY p.pk_programacion
ORDER BY anio DESC, ffin DESC";


$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}


$stmt->bind_param('ss', $text,$text);
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
  $idprog = $row['idprogram'];
  $cliente = $row['cliente'];
  $ffin = $row['ffin'];
  $piezas = $row['piezas'];
  $color = $row['color'];
  $total = $row['total'];
  $hoy = date('Y-m-d');
  $iconocaja = "";
  $background = "";
  $numerosemana = date("W",strtotime($ffin));//sacar numero de la semana
  // $ocultar = "";
  $admin = $_SESSION['user']['privilegiosUsuario'];
  $pe = $_SESSION['user']['produccion_editar'];

//si fecha vencimiento es mayor a la fecha de hoy y mis piezas requeridas son igual a
  if (($ffin > $hoy)  && ($piezas == $total)) {
    $iconocaja = "001-check.svg";
    $background = "verde";
  } elseif (($ffin < $hoy) && ($piezas == $total)) {
    $iconocaja = "001-check.svg";
    $background = "verde";
  }elseif (($ffin < $hoy) && ($piezas > $total)) {
    $iconocaja = "003-shipping.svg";
    $background = "rojo";
  }else {
    $iconocaja = "002-delivery.svg";
  }

  // si es negro no tomar en cuenta
  if ($color === '#000000') {
    $displaynone = "display:none";
  }else {
    $displaynone = "";
  }

$system_callback['data'] .="
<tr style='$displaynone' class='$background row bordelateral  m-0' id='item'>
  <td class='col-md-1'>
    <img src='/fitcoControl/Resources/iconos/$iconocaja' class='icono'>
  </td>
    <td class='col-md-3'>
      <h4><b><input type='color' value='$color'>$cliente</b></h4>
    </td>
    <td class='col-md-2 text-center'>
      <h4><b>$piezas</b></h4>
    </td>
    <td class='col-md-2 text-center'>
      <h4><b>$total</b></h4>
    </td>
    <td class='col-md-2 text-center'>
      <h4><b>$ffin</b></h4>
    </td>

    <td class='col-md-2 text-right'>
      <a href='#' class='agregarproduccion spand-link' program-id='$idprog'><img src='/fitcoControl/Resources/iconos/003-add.svg' class='spand-icon'></a>

      <a href='#' class='visualizarproduccion spand-link ml-3' data-toggle='modal' data-target='#VisualizarTablaProduccion' program-id='$idprog'><img src='/fitcoControl/Resources/iconos/magnifier.svg' class='spand-icon'></a>
    </td>
  </tr>";
}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);

 ?>
