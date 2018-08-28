<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$data = $_POST;


$data['string'];
$text = "%" . $data['string'] . "%";
$query = "SELECT
cc.pk_CorteCalendario AS pk_CorteCalendario,
cc.title AS title,
cc.piezasRequeridas AS  piezasRequeridas,
cc.start AS  start,
cc.end AS end,
SUM(cd.cantidadCorte) AS cantidadCorte

FROM ct_CorteCalendario cc

LEFT JOIN ct_CorteDiario cd ON cc.pk_CorteCalendario = cd.fk_CorteCalendario



WHERE (title LIKE ?)  OR (piezasRequeridas LIKE ?) OR (start LIKE ?)
GROUP BY cc.pk_CorteCalendario";

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
  $idcorte = utf8_encode($row['pk_CorteCalendario']);
  $title = utf8_encode($row['title']);
  $piezasRequeridas = utf8_encode($row['piezasRequeridas']);
  $start = utf8_encode($row['start']);
  $end = utf8_encode($row['end']);
  $total = utf8_encode($row['cantidadCorte']);
  $id = $idcorte;
  $hoy = date('Y-m-d');

  if ($total == "" || $total == null) {
    $total == 0;
  }


  if (($end > $hoy)  && ($piezasRequeridas == $total)) {
    $background = "verde";
  } elseif (($end < $hoy) && ($piezasRequeridas == $total)) {
    $background = "verde";
  }elseif (($end < $hoy) && ($piezasRequeridas > $total)) {
    $background = "rojo";
  }else {
    $background = "";
  }

  $system_callback['data'] .=
  "<tr class='$background row bordelateral  m-0' id='item'>
    <td class='col-md-4'><h4><b>$title</b></h4></td>
    <td class='col-md-2 text-center'><h4><b>$piezasRequeridas</b></h4></td>
    <td class='col-md-2 text-center'><h4><b>$total</b></h4></td>
    <td class='col-md-2 text-center'><h4><b>$end</b></h4></td>

    <td class='col-md-2 text-right'>
      <a href='#' class='agregarcorte spand-link' db-id='$idcorte'><img src='/fitcoControl/Resources/iconos/003-add.svg' class='spand-icon'></a>

      <a href='#' class='visualizarCorte spand-link ml-3' data-toggle='modal' data-target='#VisualizarTablaCorte' db-id='$idcorte'><img src='/fitcoControl/Resources/iconos/magnifier.svg' class='spand-icon'></a>
    </td>
    </tr>";
}


$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
