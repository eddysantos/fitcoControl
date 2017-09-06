<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

    $id = $_REQUEST['pk_usuario'];

    $query = "DELETE FROM usuarios WHERE pk_usuario='$id'";
    $resultado = $conn->query($query);


    if ($resultado) {

      header("Location: /fitcoControl/Ubicaciones/Usuarios/Usuarios.php");
    }else {
      echo "No se pudo eliminar";
    }
?>
