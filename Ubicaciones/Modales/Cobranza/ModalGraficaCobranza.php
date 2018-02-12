
<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);

$query = "SELECT

co.pk_cobranza AS idcobranza,
ct.nombreCliente AS nombre,
SUM(co.importeCobranza) AS totalcobranza,
SUM(pgo.importePago) As totalpagado,
WEEK(co.vencimientoCobranza) AS semana,
ct.colorCliente AS color,
SUM(pgo.importePago) AS pagado

FROM ct_cobranza co

LEFT JOIN ct_cliente ct ON co.fk_cliente = ct.pk_cliente
LEFT JOIN ct_pagos pgo ON  pgo.fk_cobranza = co.pk_cobranza


GROUP BY semana
";

$r = mysqli_query($conn, $query);

?>


<html>

  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(grafica);


      function grafica() {
        var data = google.visualization.arrayToDataTable([
          ["semana", "Pagado", {role: 'style'}],
          <?php
            $i = 0;
            $n = mysqli_num_rows($r);
            while ($row = mysqli_fetch_assoc($r)) {
              print "[
              '".$row["semana"]."',
              ".$row["pagado"].",
              '".$row["color"]."'
              ]";
              $i++;
              if ($i<$n) {
               print ",";
              }
            }

          ?>
        ]);

        var opciones = {
          fontSize : 12,
          fontName: 'Times',
          hAxis: {
            title: 'Semana de pago',
            titleTextStyle: {color: 'blue',bold:true, fontSize:12},
            textPosition:'out',
            textStyle:{color: 'blue', fontSize: 12, fontName:'Times',bold:true}
          },
          vAxis: {
            title: 'Pagado',
            titleTextStyle: {color: '#0000FF', bold:true, fontSize:12, fontName:"Arial"},
            textStyle: {color: '#0000FF', bold:true, fontSize:12, fontName:"Arial"},
            gridlines: {color: 'gray'}
          },
          titleTextStyle:{
            color: "gray",
            fontSize: 12
          },
          bar:{groupWidth: '60%'},
          isStacked: 'absolute',
          animation:{"startup": true, "duration":2000, easing:'linear'},
          height:300,
          width: 750
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('grafica'));
        chart.draw(data, opciones);
      }
    </script>
  </head>
</html>

<div class="modal fade" id="ModalGraficaCobranza">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">DETALLE Y GRAFICO</h5>
      </div>
      <div class="modal-body">
        <div id="grafica" class=""></div>
        <table class="table table-hover table-fixed">
          <thead>
            <tr class="row m-0 encabezado">
              <td class="col-md-1"></td>
              <td class="col-md-2 text-center">
                <h3>CLIENTE</h3>
              </td>
              <td class="col-md-3 text-center">
                <h3>SEMANA</h3>
              </td>
              <td class="col-md-3 text-center">
                <h3>TOTAL</h3>
              </td>
              <td class="col-md-3 text-center">
                <h3>PAGADO</h3>
              </td>
            </tr>
          </thead>
          <tbody id="mostrarTablaGrafica"></tbody>
        </table>
      </div><!--termina el Cuerpo del Modal-->
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
