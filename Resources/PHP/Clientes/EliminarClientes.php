<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

    $id = $_REQUEST['pk_cliente'];

    $query = "DELETE FROM ct_cliente WHERE pk_cliente='$id'";
    $resultado = $conn->query($query);


?>
