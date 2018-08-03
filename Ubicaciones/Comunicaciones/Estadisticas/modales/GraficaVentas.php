<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);


$queryMensualVentas = "SELECT
MONTH(v.fechaIngreso) AS mes,
v.fechaIngreso AS fingreso,
v.nombreVendedor AS vendedor,
year(v.fechaIngreso) AS anio,
SUM(v.numeroPrendas * v.precioXprenda) AS total

FROM ct_ventas v
GROUP BY mes";

$result = mysqli_query($conn, $queryMensualVentas);

$totalVentas[] = 'Total';
$mensualVentas[] = 'x';

while ($row = $result->fetch_assoc()) {
  $numeromesVen  = $row['fingreso'];
  $mensualVentas[] = strftime("%b %Y", strtotime($numeromesVen));
  $totalVentas[] = $row['total'];
}
?>


<div class="modal fade" id="GraficaVentas">
  <div class="modal-dialog modal-grande">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">GRAFICO VENTAS/ GANANCIAS POR MES</h5>
      </div>
      <div class="modal-body">
        <div id="graficasVentas"></div>
      </div>
    </div>
  </div>
</div>


<script>
  var MesVenta = <?php echo json_encode($mensualVentas); ?>;
  var totalVentas = <?php echo json_encode($totalVentas, JSON_NUMERIC_CHECK); ?>;
</script>
