<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

    $id = $_REQUEST['id'];

    $query = "DELETE FROM Clientes WHERE id='$id'";
    $resultado = $conn->query($query);


    if ($resultado) {
      header("Location: /fitcoControl/Ubicaciones/Clientes/Clientes.php");
    }else {
      echo "No se pudo eliminar";
    }
?>
