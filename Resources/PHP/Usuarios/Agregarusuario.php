<?php
// $root = $_SERVER['DOCUMENT_ROOT'];
// $data = array(
//   'code'=>"",
//   'response'=>array()
// );
//
// require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
// $query = "INSERT INTO usuarios(
//   nombreUsuario,
//   apellidosUsuario,
//   correoUsuario,
//   departamentoUsuario,
//   puestoUsuario,
//   usrUsuario,
//   contraUsuario,
//   privilegiosUsuario,
//   cobranza_ver,
//   cobranza_editar,
//   produccion_ver,
//   produccion_editar,
//   cliente_ver,
//   cliente_editar,
//   verVentas,
//   editarVentas)
//   VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
//
// $stmt = $conn->prepare($query);
//
// error_log("Pase por aqui!");
//
// if (!($stmt)) {
//   error_log($conn->$error);
//   }
//
// $stmt->bind_param('ssssssssssssssss',
//   $_POST['usr_nombre'],
//   $_POST['usr_apellidos'],
//   $_POST['usr_correo'],
//   $_POST['usr_departamento'],
//   $_POST['usr_puesto'],
//   $_POST['usr_usuario'],
//   $_POST['usr_contra'],
//   $_POST['usr_privilegios'],
//   $_POST['verCobranza'],
//   $_POST['editCobranza'],
//   $_POST['verProduccion'],
//   $_POST['editProduccion'],
//   $_POST['verCliente'],
//   $_POST['editCliente'],
//   $_POST['verVentas'],
//   $_POST['editVentas']
// );
// $stmt->execute();
//
// $aff_rows = $conn->affected_rows;
//
// if ($aff_rows != 1) {
//   $data['code'] = 2;
//   $data['response'] = $stmt->error;
// } else {
//   $data['code'] = 1;
// }
//
// $json = json_encode($data);
//
// echo $json;

?>
