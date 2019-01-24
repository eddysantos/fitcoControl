<?php
// $root = $_SERVER['DOCUMENT_ROOT'];
// require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';
//
// $linea = trim($_POST['linea']);
// $fecha = trim($_POST['fecha']);
// $ope = trim($_POST['ope']);
// $emp = trim($_POST['emp']);
// $meta = trim($_POST['meta']);
// $produc = trim($_POST['produc']);
//
//
// $query = "INSERT INTO ct_linea (linea,operacion,nombre,fecha,meta,prod1) VALUES (?,?,?,?,?,?)";
//
// $stmt = $conn->prepare($query);
// if (!($stmt)) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
//   exit_script($system_callback);
// }
//
// $stmt->bind_param('ssssss',$linea,$ope,$emp,$fecha,$meta,$produc);
// if (!($stmt)) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
//   exit_script($system_callback);
// }
//
// if (!($stmt->execute())) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error durante la ejecucion [$stmt->errno]: $stmt->error";
//   exit_script($system_callback);
// }
//
// $affected = $stmt->affected_rows;
// $system_callback['affected'] = $affected;
// $system_callback['datos'] = $_POST;
//
// if ($affected == 0) {
//   $system_callback['code'] = 2;
//   $system_callback['message'] = "El query no hizo ningún cambio a la base de datos";
//   exit_script($system_callback);
// }
//
// $system_callback['code'] = 1;
// $system_callback['message'] = "Script called successfully!";
// exit_script($system_callback);

?>
