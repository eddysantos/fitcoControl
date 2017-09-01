<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

    $id = $_REQUEST['pk_cliente'];

    $query = "DELETE FROM ct_cliente WHERE pk_cliente='$id'";
    $resultado = $conn->query($query);


    if ($resultado) {
      header("Location: /fitcoControl/Ubicaciones/Clientes/Clientes.php");
    }else {
      echo "No se pudo eliminar";
    }
?>
