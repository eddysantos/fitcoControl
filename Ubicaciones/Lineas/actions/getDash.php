<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);


// ********************************//
//  G R A F I C A     D I A R I A  //
// ********************************//
if ($_POST['request']) {
  $data = $_POST;
  $request = $data['request'];

  $queryDiaria = "SELECT
  DAYOFWEEK(li.fecha) dia;
  DATE_FORMAT(li.fecha, ' %d/%m') AS fechaX,
  -- pr.cantidadProduccion AS produccion,
  li.meta AS meta,
  li.fecha AS fecha,
  li.operacion,
  li.pk_linea,
  li.linea,
  li.nombre,
  li.prod1,
  li.prod2,
  li.prod3,
  li.prod4,
  li.prod5,
  li.prod6,
  li.prod7,
  li.prod8,
  li.prod9,
  li.prod10


  FROM ct_linea  li
  -- WHERE linea = 'Linea 1'
  WHERE li.linea = '$request'

  GROUP BY li.pk_linea
  ORDER BY li.fecha ASC";




 ?>
