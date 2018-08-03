<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);
setlocale(LC_TIME, 'es_ES');
// ******************************** //
//  G R A F I C A    M E N S U A L  //
// ******************************** //
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

$result = mysqli_query($conn, $queryTesMensual);


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



// ******************************** //
//  G R A F I C A    S E M A N A L  //
// ******************************** //
$queryTesSemanal = "SELECT
co.pk_cobranza AS idcobranza,
SUM(co.importeCobranza) AS totalcobranza,
WEEK(co.vencimientoCobranza) AS semana,
SUM(pgo.importePago) AS pagado,
year(co.vencimientoCobranza) AS year,
co.vencimientoCobranza AS vencimiento
FROM ct_cobranza co
LEFT JOIN ct_pagos pgo ON  pgo.fk_cobranza = co.pk_cobranza
WHERE year(co.vencimientoCobranza) = '2018'

GROUP BY semana,year ORDER BY vencimiento ASC";

$resultSem = mysqli_query($conn, $queryTesSemanal);


$facturadoTSem[] = 'Facturado';
$pagadoTSem[] = 'Pagado';
$pendientepagoTSem[] = 'Pendiente';
$semanalT[] = 'x';


while ($row = $resultSem->fetch_assoc()) {
  $numeroSemT  = $row['vencimiento'];
  $semanalT[] = strftime("%W %Y", strtotime($numeroSemT));
  $facturadoTSem[] = $row['totalcobranza'];
  $pagadoTSem[] = $row['pagado'];
  $pendientepagoTSem[] = ($row['totalcobranza']-$row['pagado']);

}
?>

<div class="modal fade" id="GraficaTesoreria">
  <div class="modal-dialog modal-grande mt-3">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">DETALLE Y GRAFICO</h5>
      </div>
      <div class="modal-body pt-0">
        <div class="row submenuMed">
          <ul class="nav nav-pills nav-fill" id="selectGrafica" style="width: 100%;">
            <li class="nav-item">
              <a class="nav-link consultar" id="submenuchico" accion="semanal">Grafica Semanal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link consultar" id="submenuchico" accion="mensual">Grafica Mensual</a>
            </li>
          </ul>
        </div>

        <div class="mt-5" id="graficasemanal" style="display:none"></div>
        <div class="mt-5" id="graficamensual" style="display:none"></div>
      </div>
    </div>
  </div>
</div>



<script>
// Semanal

  var Mes = <?php echo json_encode($mensualT); ?>;
  var facturado = <?php echo json_encode($facturadoT, JSON_NUMERIC_CHECK); ?>;
  var pagado = <?php echo json_encode($pagadoT, JSON_NUMERIC_CHECK); ?>;
  var pendientepago = <?php echo json_encode($pendientepagoT, JSON_NUMERIC_CHECK); ?>;

// Semanal

  var Sem = <?php echo json_encode($semanalT); ?>;
  var facturadoTSem = <?php echo json_encode($facturadoTSem, JSON_NUMERIC_CHECK); ?>;
  var pagadoTSem = <?php echo json_encode($pagadoTSem, JSON_NUMERIC_CHECK); ?>;
  var pendienteTSem = <?php echo json_encode($pendientepagoTSem, JSON_NUMERIC_CHECK); ?>;
</script>
