
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/DataBases/ConexionDataTables.php';
$datos['data'] = [];
$cn = getConexion();
$sql = "SELECT
  *
  FROM ct_cobranza co

  LEFT JOIN ct_cliente ct ON co.fk_cliente = ct.pk_cliente
  LEFT JOIN ct_pagos pg ON co.pk_cobranza = pg.fk_cobranza

  WHERE co.pk_cobranza ='".$_POST['pk_cobranza']. "'";
$res = $cn->query($sql);
$data = $res->fetch_array();
echo json_encode($data);
?>
