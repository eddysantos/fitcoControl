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
privilegiosUsuario = ?
WHERE pk_usuario = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('sssssssss',
  $_POST['musr_nombre'],
  $_POST['musr_apellidos'],
  $_POST['musr_correo'],
  $_POST['musr_departamento'],
  $_POST['musr_puesto'],
  $_POST['musr_usuario'],
  $_POST['musr_contra'],
  $_POST['musr_privilegios'],
  $_POST['musr_id']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
