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
 FROM
 ct_linea  li
 WHERE (linea LIKE ?)  OR (nombre LIKE ?) OR (fecha LIKE ?) OR (operacion LIKE ?)";

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
  $idlinea = $row['pk_linea'];
  $linea = $row['linea'];
  $ope = $row['operacion'];
  $meta = $row['meta'];
  $fecha = $row['fecha'];
  $nombre = $row['nombre'];
  $prod1 = $row['prod1'];
  $prod2 = $row['prod2'];
  $prod3 = $row['prod3'];
  $prod4 = $row['prod4'];
  $prod5 = $row['prod5'];
  $prod6 = $row['prod6'];
  $prod7 = $row['prod7'];
  $prod8 = $row['prod8'];
  $prod9 = $row['prod9'];
  $prod10 = $row['prod10'];


  $system_callback['data'] .=
  "<p db-id='$idlinea'>$idlinea - $operacion</p>";
  $id = $idlinea;

  $system_callback['data'] .=
  "<tr class='row bordelateral m-0 text-center' id='item'>
    <td class='col-md-2'><h5>$fecha</h5></td>
    <td class='col-md-4'>$nombre</td>
    <td class='col-md-3'>$ope</td>
    <td class='col-md-1'>$linea</td>
    <td class='col-md-2 text-right'>
      <a href='#' class='spand-link' db-id='$id'><img src='/fitcoControl/Resources/iconos/003-add.svg' class='spand-icon'></a>

      <a href='#EditarLinea' data-toggle='modal' class='editar-linea spand-link' db-id='$id'><img  src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='img ml-3 spand-icon'></a>
    </td>

    <td class='col-md-2'><label class='visibilidad'>1 hra</label></td>
    <td class='col-md-1'><label class='visibilidad'>2 hras</label></td>
    <td class='col-md-1'><label class='visibilidad'>3 hras</label></td>
    <td class='col-md-1'><label class='visibilidad'>4 hras</label></td>
    <td class='col-md-1'><label class='visibilidad'>5 hras</label></td>
    <td class='col-md-1'><label class='visibilidad'>6 hras</label></td>
    <td class='col-md-1'><label class='visibilidad'>7 hras</label></td>
    <td class='col-md-1'><label class='visibilidad'>8 hras</label></td>
    <td class='col-md-1'><label class='visibilidad'>9 hras</label></td>
    <td class='col-md-2'><label class='visibilidad'>10 hras</label></td>

    <td class='col-md-2'><label class='visibilidad'>$prod1</label></td>
    <td class='col-md-1'><label class='visibilidad'>$prod2</label></td>
    <td class='col-md-1'><label class='visibilidad'>$prod3</label></td>
    <td class='col-md-1'><label class='visibilidad'>$prod4</label></td>
    <td class='col-md-1'><label class='visibilidad'>$prod5</label></td>
    <td class='col-md-1'><label class='visibilidad'>$prod6</label></td>
    <td class='col-md-1'><label class='visibilidad'>$prod7</label></td>
    <td class='col-md-1'><label class='visibilidad'>$prod8</label></td>
    <td class='col-md-1'><label class='visibilidad'>$prod9</label></td>
    <td class='col-md-2'><label class='visibilidad'>$prod10</label></td>
  </tr>";
}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
