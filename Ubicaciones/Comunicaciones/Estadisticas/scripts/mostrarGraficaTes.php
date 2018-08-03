<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
// $data = array(
//   'code' => "",
//   'response' => "",
//   'infoTabla' => ""
// );


$system_callback = [];
$data = $_POST;

$data['string'];
// $text = "%" . $data['string'] . "%";


$queryTesMensual = "SELECT
MONTH(co.vencimientoCobranza) AS mes,
co.vencimientoCobranza AS vencimiento,
SUM(co.importeCobranza) AS totalcobranza,
SUM(pgo.importePago) AS pagado,
pgo.fechaPago AS fpago,
MONTH(pgo.fechaPago) AS Mesfpago,
year(co.vencimientoCobranza) AS anio


FROM ct_cobranza co
LEFT JOIN ct_pagos pgo ON co.pk_cobranza = pgo.fk_cobranza
GROUP BY mes,anio ORDER BY vencimiento ASC";

// $result = mysqli_query($conn, $queryTesMensual);



// $query = "SELECT
//  *
//  FROM
//  ct_linea  li
//  WHERE (linea LIKE ?)  OR (nombre LIKE ?) OR (fecha LIKE ?) OR (operacion LIKE ?)";

$stmt = $conn->prepare($queryTesMensual);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

// $stmt->bind_param('ssss', $text,$text,$text,$text);
// if (!($stmt)) {
//   $system_callback['code'] = "500";
//   $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
//   exit_script($system_callback);
// }

if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query execution [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

$rslt = $stmt->get_result();

if ($rslt->num_rows == 0) {
  $system_callback['code'] = 1;
  $system_callback['data'] ="<p db-id=''>No se encontraron resultados</p>";
  $system_callback['message'] = "Script called successfully but there are no rows to display.";
  exit_script($system_callback);
}

$facturadoT[] = 'Facturado';
$pagadoT[] = 'Pagado';
$pendientepagoT[] = 'Pendiente';
$mensualT[] = 'x';


while ($row = $result->fetch_assoc()) {
  $numeromesT  = $row['vencimiento'];
  $mensualT[] = strftime("%b %Y", strtotime($numeromesT));
  $facturadoT[] = $row['totalcobranza'];
  $pagadoT[] = $row['pagado'];
  $pendientepagoT[] = ($row['totalcobranza']-$row['pagado']);

}


$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
