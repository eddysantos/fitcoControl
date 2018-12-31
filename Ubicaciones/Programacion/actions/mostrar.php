<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
// $data = $_POST;

// $data['string'];
// $text = "%" . $data['string'] . "%";
$query = "SELECT * FROM ct_program_copy1";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

// $stmt->bind_param('sss',$text,$text,$text);
// if (!($stmt)) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
//   exit_script($system_callback);
// }

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
  $piezasRequeridas = $row['piezasRequeridas'];
  $piezasDiarias = $row['piezasDiarias'];
  $piezasHora = $row['piezasHora'];
  $horasNecesarias = $row['horasNecesarias'];
  $start = $row['start'];
  $end = $row['end'];


    $system_callback['data'] .=
    "<p db-id='$pk_programacion'>$pk_programacion - $cliente</p>";
    $id = $pk_programacion;

    $system_callback['data'] .=
    "<tr class='row bordelateral m-0 text-center' id='item'>
      <td class='col-md-2'>$cliente</td>
      <td class='col-md-1'>$corte</td>
      <td class='col-md-1'>$piezasRequeridas</td>
      <td class='col-md-1'>$piezasDiarias</td>
      <td class='col-md-1'>$piezasHora</td>
      <td class='col-md-1'>$horasNecesarias</td>
      <td class='col-md-2'>$start</td>
      <td class='col-md-2'>$end</td>
    </tr>";
}


$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
