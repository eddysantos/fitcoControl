<?php

// $root = $_SERVER['DOCUMENT_ROOT'];
// require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';
//
// $id = trim($_POST['idMant']);
// $orden = trim($_POST['orden']);
// $mant_Inv = trim($_POST['mant_Inv']);
// $area = trim($_POST['area']);
// $descripcion = trim($_POST['descripcion']);
// $proveedor = trim($_POST['proveedor']);
// $costo = trim($_POST['costo']);
// $fechaRequerido = trim($_POST['fechaRequerido']);
// $pagado = trim($_POST['pagado']);
// $autorizacion = trim($_POST['autorizacion']);
//
//
// $query = "UPDATE ct_mantenimiento
// SET orden = ?,
// mant_Inv = ?,
// area = ?,
// descripcion = ?,
// proveedor = ?,
// costo = ?,
// fechaRequerido = ?,
// pagado =?,
// autorizacion = ?
// WHERE pk_mantenimiento = ?";
//
//
// $stmt = $conn->prepare($query);
// if (!($stmt)) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
//   exit_script($system_callback);
// }
//
// $stmt->bind_param('ssssssssss',$orden,
//                                $mant_Inv,
//                                $area,
//                                $descripcion,
//                                $proveedor,
//                                $costo,
//                                $fechaRequerido,
//                                $pagado,
//                                $autorizacion,
//                                $id);
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
