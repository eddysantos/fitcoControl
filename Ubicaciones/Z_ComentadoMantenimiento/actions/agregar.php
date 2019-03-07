<?php
// $root = $_SERVER['DOCUMENT_ROOT'];
// require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';
//
// $soloNum = '/^[0-9]+$/';
//
//
// // $orden = preg_match($soloNum, $_POST['orden']);
// $orden = trim($_POST['orden']);
// $mant_Inv = trim($_POST['inv']);
// $area = trim($_POST['area']);
// $desc = trim($_POST['desc']);
// $prov = trim($_POST['prov']);
// $costo = trim($_POST['costo']);
// // $costo = preg_match("/^[0-9]+(\.[0-9]+)?$/", $_POST['costo']);
// $fecha = trim($_POST['fecha']);
// $pagado = trim($_POST['pagado']);
// $aut = trim($_POST['aut']);
//
//
// $query = "INSERT INTO ct_mantenimiento (orden,mant_Inv,area,descripcion,proveedor,costo,fechaRequerido,pagado,autorizacion) VALUES (?,?,?,?,?,?,?,?,?)";
//
// $stmt = $conn->prepare($query);
// if (!($stmt)) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
//   exit_script($system_callback);
// }
//
// $stmt->bind_param('sssssssss',$orden,$mant_Inv,$area,$desc,$prov,$costo,$fecha,$pagado,$aut);
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
