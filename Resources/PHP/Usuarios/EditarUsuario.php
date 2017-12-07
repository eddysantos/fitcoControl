<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"UPDATE usuarios
SET nombreUsuario = ?,
apellidosUsuario = ?,
correoUsuario =?,
departamentoUsuario =?,
puestoUsuario =?,
usrUsuario =?,
contraUsuario =?,
privilegiosUsuario = ?,
cobranza_ver = ?,
cobranza_editar = ?,
produccion_ver = ?,
produccion_editar = ?,
cliente_ver = ?,
cliente_editar = ?,
verVentas = ?,
editarVentas = ?
WHERE pk_usuario = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('sssssssssssssssss',
  $_POST['musr_nombre'],
  $_POST['musr_apellidos'],
  $_POST['musr_correo'],
  $_POST['musr_departamento'],
  $_POST['musr_puesto'],
  $_POST['musr_usuario'],
  $_POST['musr_contra'],
  $_POST['musr_privilegios'],
  $_POST['musr_verCobranza'],
  $_POST['musr_editCobranza'],
  $_POST['musr_verProduccion'],
  $_POST['musr_editProduccion'],
  $_POST['musr_verCliente'],
  $_POST['musr_editCliente'],
  $_POST['vv'],
  $_POST['ev'],
  $_POST['musr_id']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
