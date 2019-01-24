<?php

// $root = $_SERVER['DOCUMENT_ROOT'];
// require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';
//
// $pk_id = trim($_POST['id']);
// $prod2 = trim($_POST['prod2']);
// $prod3 = trim($_POST['prod3']);
// $prod4 = trim($_POST['prod4']);
// $prod5 = trim($_POST['prod5']);
// $prod6 = trim($_POST['prod6']);
// $prod7 = trim($_POST['prod7']);
// $prod8 = trim($_POST['prod8']);
// $prod9 = trim($_POST['prod9']);
// $prod10 = trim($_POST['prod10']);
//
//
// $query = "UPDATE ct_linea
// SET prod2 = ?,
// prod3 = ?,
// prod4 = ?,
// prod5 = ?,
// prod6 = ?,
// prod7 = ?,
// prod8 = ?,
// prod9 = ?,
// prod10 = ?
// WHERE pk_linea = ?";
//
//
// $stmt = $conn->prepare($query);
// if (!($stmt)) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
//   exit_script($system_callback);
// }
//
// $stmt->bind_param('ssssssssss',$prod2,$prod3,$prod4,$prod5,$prod6,$prod7,$prod8,$prod9,$prod10,$pk_id);
// if (!($stmt)) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
//   exit_script($system_callback);
// }
//
// if (!($stmt->execute())) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error during query execution [$stmt->errno]: $stmt->error";
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
