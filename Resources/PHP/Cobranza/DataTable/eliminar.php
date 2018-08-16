<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/DataBases/ConexionDataTables.php';

$cn = getConexion();
$sql = "DELETE  FROM ct_cobranza WHERE pk_cobranza='" . $_POST['pk_cobranza'] . "'";
$res = $cn->query($sql);
if($res){
    echo 'ok';
}else{
    echo 'no';
}

 ?>
