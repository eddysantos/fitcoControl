<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$title = trim($_POST['title']);
$piezasRequeridas = trim($_POST['piezasRequeridas']);
$color = trim($_POST['color']);
$textColor = trim($_POST['textColor']);
$start = trim($_POST['start']);
$end = trim($_POST['end']);
$corte = trim($_POST['corte']);
$piezasDiarias = trim($_POST['piezasDiarias']);
$pk_programacion = trim($_POST['pk_programacion']);
$piezasHora = trim($_POST['piezasHora']);
$horasNecesarias = trim($_POST['horasNecesarias']);



$query = "UPDATE ct_program_copy1 SET title = ?,
                                       piezasRequeridas = ?,
                                       color = ?,
                                       textColor = ?,
                                       start = ?,
                                       end = ?,
                                       corte = ?,
                                       piezasDiarias = ?,
                                       piezasHora = ?,
                                       horasNecesarias = ?
                                 WHERE pk_programacion = ?";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('sssssssssss',$title,$piezasRequeridas,$color,$textColor,$start,$end,$corte,$piezasDiarias,$piezasHora,$horasNecesarias,$pk_programacion);
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

$affected = $stmt->affected_rows;
$system_callback['affected'] = $affected;
$system_callback['datos'] = $_POST;

if ($affected == 0) {
  $system_callback['code'] = 2;
  $system_callback['message'] = "El query no hizo ningún cambio a la base de datos";
  exit_script($system_callback);
}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);




?>
