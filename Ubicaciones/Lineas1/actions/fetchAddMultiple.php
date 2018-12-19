<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$query = "SELECT * FROM lst_EmpleadosProduc";

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
  // $fecha = date("Y-m-d");
  $fecha = utf8_encode($row['fecha']);
  $linea = utf8_encode($row['linea']);
  $nombre = utf8_encode($row['nombre']);



  $system_callback['data'] .=
  "<tr class='row bordelateral m-0 text-center' id='item'>
    <td class='col-md-6'><input class='efecto' name='nom[]' type='text' value='$nombre' required></td>
    <td class='col-md-3'><input class='efecto' name='lin[]' type='text' value='$linea' required></td>
    <td class='col-md-3'><input class='efecto' name='fecha[]' type='date' value='$fecha' required></td>
  </tr>";
}


$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
