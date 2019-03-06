<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$data = $_POST;

$query = "SELECT * FROM ct_program_copy1 WHERE pk_programacion = ?";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('s', $data['dbid']);
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
$rows = $rslt->num_rows;

if ($rows == 0) {
  $system_callback['code'] = 2;
  $system_callback['data'] = $_POST;
  exit_script($system_callback);
} elseif ($rows == 1) {
  $system_callback['code'] = 1;
  $system_callback['data'] = $rslt->fetch_assoc();
  $fecha_var = $system_callback['data']['end'];
  $fecha_end = date_create($fecha_var);
  $hora_end = date_create($fecha_var);
  $fecha_end = date_format($fecha_end, 'Y-m-d');
  $hora_end = date_format($hora_end, 'H:i:s');
  $system_callback['data']['check_fecha'] = $fecha_var;
  $system_callback['data']['end'] = $fecha_end;
  $system_callback['data']['HoraEnd'] = $hora_end;



  $var_start = $system_callback['data']['start'];
  $fecha_start = date_create($var_start);
  $hora_start = date_create($var_start);
  $fecha_start = date_format($fecha_start, 'Y-m-d');
  $hora_start = date_format($hora_start, 'H:i:s');
  $system_callback['data']['check_fecha'] = $var_start;
  $system_callback['data']['start'] = $fecha_start;
  $system_callback['data']['HoraStart'] = $hora_start;

  $system_callback['message'] = "Script called successfully!";
  exit_script($system_callback);
} else {
  $system_callback = 3;
  exit_script($system_callback);
}



 ?>
