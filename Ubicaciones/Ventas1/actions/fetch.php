<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$data = $_POST;

$query = "SELECT * FROM ct_ventas_copy1 WHERE pk_ventas = ?";

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
  $system_callback['message'] = "Script called successfully!";
  exit_script($system_callback);
} else {
  $system_callback = 3;
  exit_script($system_callback);
}



 ?>
