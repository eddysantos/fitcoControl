<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

    $id = $_REQUEST['pk_cobranza'];

    $query = "DELETE FROM ct_cobranza WHERE pk_cobranza ='$id'";
    $resultado = $conn->query($query);


    if ($resultado) {
      header("Location: /fitcoControl/Ubicaciones/Cobranza/cobranza.php");
    }else {
      echo "No se pudo eliminar";
    }
?>
