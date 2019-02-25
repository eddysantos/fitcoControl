<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$data = $_POST;

$query = "SELECT * FROM ct_ordenCotizaciones ocot LEFT JOIN ct_ordenCompra oc ON oc.pk_orden = ocot.fk_orden
WHERE ocot.fk_orden = ? AND ocot.cot_aut = 1";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la preparacion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('s',$data['dbid']);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error al pasar variables [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

$rslt = $stmt->get_result();

if ($rslt->num_rows == 0) {
  $system_callback['code'] = 1;
  $system_callback['data'] ="<p db-id=''>No se encontraron resultados</p>";
  $system_callback['message'] = "Script called successfully but there are no rows to display.";
  exit_script($system_callback);
}

while ($row = $rslt->fetch_assoc()) {
  $precio = $row['precio'];
  $iva = $row['iva'];
  $razonSocial = $row['razonSocial'];
  $rfc = $row['rfc'];
  $numCuenta = $row['numCuenta'];
  $clabe = $row['clabe'];
  $nombreBanco = $row['nombreBanco'];
  $sugerencia = $row['sugerencia'];
  $condicionPago = $row['condicionPago'];
  $id = $row['pk_cotizacion'];
  // $aprobado = $row['aprobado'];
  $opcion = $row['opcion_cot'];
  $notaAprobado = $row['notaAprobado'];
  $editar = "href='#mostrar_cotizaciones' data-toggle='modal' class='ver_cotizaciones'";



  $system_callback['data'] .="
  <div class='row sub-grafica text-center m-0' style='margin-top:0px!important'>OPCIÓN $opcion</div>
  <div class='row text-center m-0'>
    <div class='col-md-2 text-right'><b>Razon Social :</b></div>
    <div class='col-md-4 text-left'>$razonSocial</div>
    <div class='col-md-2 text-right'><b>Num Cuenta :</b></div>
    <div class='col-md-3 text-left'>$numCuenta</div>
    <div class='col-md-1'></div>
  </div>
  <div class='row text-center m-0'>
    <div class='col-md-2 text-right'><b>RFC :</b></div>
    <div class='col-md-4 text-left'>$rfc</div>
    <div class='col-md-2 text-right'><b>CLABE :</b></div>
    <div class='col-md-3 text-left'>$clabe</div>
    <div class='col-md-1'></div>
  </div>
  <div class='row text-center m-0'>
    <div class='col-md-2 text-right'><b>Condicion de Pago :</b></div>
    <div class='col-md-4 text-left'>$condicionPago</div>
    <div class='col-md-2 text-right'><b>Nombre Banco :</b></div>
    <div class='col-md-3 text-left'>$nombreBanco</div>
    <div class='col-md-1'></div>
  </div>
  <div class='row text-center m-0'>
    <div class='col-md-2 text-right'><b>Precio :</b></div>
    <div class='col-md-4 text-left'>$precio $iva</div>
    <div class='col-md-2 text-right'><b>Sugerencia :</b></div>
    <div class='col-md-3 text-left'>$sugerencia</div>
  </div>
  <div class='row sub-grafica text-center m-0' style='margin-top:0px!important'>COMENTARIOS</div>
  <div class='row m-0'>
    <div class='col-md-12 text-left'><b>$notaAprobado</b></div>
  </div>";

}


$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
