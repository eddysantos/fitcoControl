<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);

?>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(grafica);

      function grafica() {
        var data = google.visualization.arrayToDataTable([
          ["Semana","Facturado","Pagado","Pendiente"],

          <?php
          $query = "SELECT
          co.pk_cobranza AS idcobranza,
          ct.nombreCliente AS nombre,
          SUM(co.importeCobranza) AS totalcobranza,
          WEEK(co.vencimientoCobranza) AS semana,
          MONTH(co.vencimientoCobranza) AS mes,
          ct.colorCliente AS color,
          SUM(pgo.importePago) AS pagado,
          year(co.vencimientoCobranza) AS anio,
          co.vencimientoCobranza AS vencimiento
          FROM ct_cobranza co
          LEFT JOIN ct_cliente ct ON co.fk_cliente = ct.pk_cliente
          LEFT JOIN ct_pagos pgo ON  pgo.fk_cobranza = co.pk_cobranza
          WHERE co.vencimientoCobranza BETWEEN '2018-01-01' AND '2018-12-31'
          GROUP BY semana,anio ORDER BY vencimiento ASC
          ";
          $r = mysqli_query($conn, $query);
            $i = 0;
            $n = mysqli_num_rows($r);
            while ($row = mysqli_fetch_assoc($r)) {
              $facturado = $row["totalcobranza"];
              $semana = $row["semana"];
              $anio = $row["anio"];
              $pagado = $row["pagado"];
              $pendientepago = $row['totalcobranza']-$row['pagado'];
              $numerosem = "Sem.";

              if ($pagado == null) {
                $pagado = 0;
              }

              print "[
                '".$numerosem." ".$semana." ".$anio."', ".$facturado.", ".$pagado.", ".$pendientepago."
                ]";

              $i++;
              if ($i<$n) {
               print ",";
              }
            }
          ?>
        ]);

        var options = {
          areaOpacity: 0,
          backgroundColor: {stroke: "#0056b3", strokeWidth: 6},
          colors:["blue","green","red"],
          animation:{"startup": true, "duration":2000, easing:'linear'},
          hAxis: {title: 'Semana',  titleTextStyle: {color: '#FF0000'},slantedText: true,
          slantedTextAngle:20},
          // vAxis: {title: 'Facturado',  titleTextStyle: {color: '#FF0000'}},
          width:1065,
          height: 500,
          legend:{
            textStyle:{color:"#0056b3",fontSize:16,bold:true}
          },
          pointSize: 6,
          pointShape: 'diamond',
          pointsVisible: true
        };


        var chart = new google.visualization.AreaChart(document.getElementById('graficasemanal'));
        chart.draw(data, options);
      }

    </script>
    <script type="text/javascript">

    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(graficaMensual);
    function graficaMensual() {
      var data = google.visualization.arrayToDataTable([
        ["Mes","Facturado","Pagado","Pendiente"],

        <?php

        $query = "SELECT
        CASE WHEN MONTH(co.vencimientoCobranza) = 1 THEN 'Ene'
        WHEN MONTH(co.vencimientoCobranza) = 2 THEN 'Feb'
        WHEN MONTH(co.vencimientoCobranza) = 3 THEN 'Mar'
        WHEN MONTH(co.vencimientoCobranza) = 4 THEN 'Abr'
        WHEN MONTH(co.vencimientoCobranza) = 5 THEN 'May'
        WHEN MONTH(co.vencimientoCobranza) = 6 THEN 'Jun'
        WHEN MONTH(co.vencimientoCobranza) = 7 THEN 'Jul'
        WHEN MONTH(co.vencimientoCobranza) = 8 THEN 'Ago'
        WHEN MONTH(co.vencimientoCobranza) = 9 THEN 'Sep'
        WHEN MONTH(co.vencimientoCobranza) = 10 THEN 'Oct'
        WHEN MONTH(co.vencimientoCobranza) = 11 THEN 'Nov'
        WHEN MONTH(co.vencimientoCobranza) = 12 THEN 'Dic'
        ELSE 'Esto no es mes' END AS mes,
        co.pk_cobranza AS idcobranza,
        ct.nombreCliente AS nombre,
        SUM(co.importeCobranza) AS totalcobranza,
        year(co.vencimientoCobranza) AS anio,
        ct.colorCliente AS color,
        SUM(pgo.importePago) AS pagado,
        co.vencimientoCobranza AS vencimiento

        FROM ct_cobranza co
        LEFT JOIN ct_cliente ct ON co.fk_cliente = ct.pk_cliente
        LEFT JOIN ct_pagos pgo ON  pgo.fk_cobranza = co.pk_cobranza
        WHERE co.vencimientoCobranza BETWEEN '2018-01-01' AND '2018-12-31'
        GROUP BY mes ORDER BY vencimiento ASC
        ";
        $r = mysqli_query($conn, $query);
          $i = 0;
          $n = mysqli_num_rows($r);
          while ($row = mysqli_fetch_assoc($r)) {
            $facturado = $row["totalcobranza"];
            $mes = $row["mes"];
            $pagado = $row["pagado"];
            $anio = $row['anio'];
            $pendientepago = $row['totalcobranza']-$row['pagado'];
            $numerosem = "mes";

            if ($pagado == null) {
              $pagado = 0;
            }

            print "[
              ' ".$mes." ".$anio."', ".$facturado.", ".$pagado.", ".$pendientepago."
              ]";

            $i++;
            if ($i<$n) {
             print ",";
            }
          }
        ?>
      ]);

      var options = {
        areaOpacity: 0,
        backgroundColor: {stroke: "#0056b3", strokeWidth: 6},
        colors:["blue","green","red"],
        animation:{"startup": true, "duration":2000, easing:'linear'},
        hAxis: {title: 'Mes',  titleTextStyle: {color: '#FF0000'},slantedText: true,
        slantedTextAngle:20},
        // vAxis: {title: 'Facturado',  titleTextStyle: {color: '#FF0000'}},
        width:1065,
        height: 500,
        legend:{
          textStyle:{color:"#0056b3",fontSize:16,bold:true}
        },
        pointSize: 6,
        pointShape: 'diamond',
        pointsVisible: true
      };


      var chart = new google.visualization.AreaChart(document.getElementById('graficamensual'));
      chart.draw(data, options);
    }
    </script>
  </head>
</html>

<div class="modal fade" id="ModalGraficaCobranza">
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
              <a class="nav-link consultar" id="submenuchico" accion="semanal" status="cerrado">Grafica Semanal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link consultar" id="submenuchico" accion="mensual" status="cerrado">Grafica Mensual</a>
            </li>
          </ul>
        </div>

        <div class="mt-5" id="graficasemanal" style="display:none"></div>
        <div class="mt-5" id="graficamensual" style="display:none"></div>
      </div>
    </div>
  </div>
</div>
