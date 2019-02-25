<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$data = $_POST;

$data['string'];
$text = "%" . $data['string'] . "%";
$variable = $data['variable'];
$andWhere = 'WHERE (item LIKE ?)  OR (fechaRequerido LIKE ?) OR (descripcion LIKE ?) OR (usuarioSolicitud LIKE ?)';
$query = "SELECT *
FROM ct_ordenCompra com
LEFT JOIN ct_ordenCotizaciones co ON com.pk_orden = co.fk_orden
$andWhere
GROUP BY com.pk_orden";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la preparacion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('ssss',$text,$text,$text,$text);
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
  $item = utf8_encode($row['item']);
  $pk_orden = utf8_encode($row['pk_orden']);
  $descripcion = utf8_encode($row['descripcion']);
  $fechaRequerido = utf8_encode($row['fechaRequerido']);
  $cantidad = utf8_encode($row['cantidad']);
  $vitalDesechable = utf8_encode($row['vitalDesechable']);
  $usuarioSolicitud = utf8_encode($row['usuarioSolicitud']);
  $usuario_add = utf8_encode($row['usuario_add']);
  $fecha_add = utf8_encode($row['fecha_add']);
  $aprobado = utf8_encode($row['aprobado']);
  $pagado = utf8_encode($row['pagado']);
  $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';
  // $invEditar = $_SESSION['user']['pro_invEditar'];

  if (($vitalDesechable == "Vital") && ($aprobado == 0)) {
    $background = "rojo";
  }elseif ($aprobado == 1) {
    $background = "verde";
  }else {
    $background = "";
  }


  if (($aprobado == 1) && ($pagado <>  1)) {
    $nomostrar = "";
    $editar = "href='#mostrar_cot_autorizada' data-toggle='modal' class='ver_cot_aut'";
    $disnone = "";
    $displaynone = "";
  }elseif (($aprobado == 1) && ($pagado == 1)) {
    $displaynone = "display:none";
  }else {
    $nomostrar = "display:none";
    $editar = "href='#mostrar_cotizaciones' data-toggle='modal' class='ver_cotizaciones'";
    $disnone = "display:none";
    $displaynone = "";


  }


  $system_callback['data'] .="<tr style='$displaynone' class='$background row text-center m-0 borderojo'>
    <td class='col-md-3'>
      <b>#$pk_orden -- $item</b>
      <p class='visibilidad'><b>Persona que Solicita:</b> $usuarioSolicitud</p>
    </td>
    <td class='col-md-4'>$descripcion</td>
    <td class='col-md-2'>$fechaRequerido</td>
    <td class='col-md-1'>$cantidad</td>
    <td class='col-md-2 text-right'>
      <a $editar  db-id='$pk_orden'><img src='/fitcoControl/Resources/iconos/magnifier.svg' class='spand-icon'></a>

      <label style='$nomostrar' class='switch ml-4'>
        <input db-id='$pk_orden' id='_pagado' value='$pagado' type='checkbox' class='success select-pagado'>
        <span class='slider round'></span>
      </label>
    </td>

  </tr>";

}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
