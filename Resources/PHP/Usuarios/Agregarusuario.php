<?php
$root = $_SERVER['DOCUMENT_ROOT'];

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

  $usr_id = $conn->real_escape_string($_POST['usr_id']);
  $usr_nombre = $conn->real_escape_string($_POST['usr_nombre']);
  $usr_apellidos = $conn->real_escape_string($_POST['usr_apellidos']);
  $usr_correo = $conn->real_escape_string($_POST['usr_correo']);
  $usr_departamento = $conn->real_escape_string($_POST['usr_departamento']);
  $usr_puesto = $conn->real_escape_string($_POST['usr_puesto']);
  $usr_usuario = $conn->real_escape_string($_POST['usr_usuario']);
  $usr_contra = $conn->real_escape_string($_POST['usr_contra']);
  $usr_privilegios = $conn->real_escape_string($_POST['usr_privilegios']);

  $query = "INSERT INTO usuarios(id,nombre,apellidos,correo,departamento,puesto,usuario,contra,privilegios) VALUES('$usr_id','$usr_nombre','$usr_apellidos','$usr_correo','$usr_departamento','$usr_puesto','$usr_usuario','$usr_contra','$usr_privilegios')";


  $resultado = $conn->query($query);




  if ($resultado) {
    header("Location: /fitcoControl/Ubicaciones/Usuarios/Usuarios.php");
  }else {
    echo "No se pudo Realizar el resistro";
  }

?>
