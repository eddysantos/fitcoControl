<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$add_pk_linea = trim($_POST['add_pk_linea']);
$add_operacion = trim($_POST['add_operacion']);
$add_meta = trim($_POST['add_meta']);
$add_prod1 = trim($_POST['add_prod1']);
$add_prod2 = trim($_POST['add_prod2']);
$add_prod3 = trim($_POST['add_prod3']);
$add_prod4 = trim($_POST['add_prod4']);
$add_prod5 = trim($_POST['add_prod5']);
$add_prod6 = trim($_POST['add_prod6']);
$add_prod7 = trim($_POST['add_prod7']);
$add_prod8 = trim($_POST['add_prod8']);
$add_prod9 = trim($_POST['add_prod9']);
$add_prod10 = trim($_POST['add_prod10']);


$query = "INSERT INTO ct_lineaProd (fk_linea,operacion,meta,prod1,prod2,prod3,prod4,prod5,prod6,prod7,prod8,prod9,prod10) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('sssssssssssss',$add_pk_linea,$add_operacion,$add_meta,$add_prod1,$add_prod2,$add_prod3,$add_prod4,$add_prod5,$add_prod6,$add_prod7,$add_prod8,$add_prod9,$add_prod10);
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
