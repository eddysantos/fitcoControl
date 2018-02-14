
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";


$query =
"INSERT INTO usuarios(nombreUsuario,apellidosUsuario,correoUsuario,departamentoUsuario,puestoUsuario,usrUsuario,contraUsuario,privilegiosUsuario) VALUES(?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($query);
$stmt->bind_param('ssssssss',
  $_POST['usr_nombre'],
  $_POST['usr_apellidos'],
  $_POST['usr_correo'],
  $_POST['usr_departamento'],
  $_POST['usr_puesto'],
  $_POST['usr_usuario'],
  $_POST['usr_contra'],
  $_POST['usr_privilegios']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

if ($aff_rows != 1) {
  $data['code'] = 2;
  $data['response'] = $stmt->error;
} else {
  $data['code'] = 1;
}

$json = json_encode($data);

echo $json;

?>
