
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

<!-- GRAFICA SEMANAL -->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(grafica);

      function grafica() {
        var data = google.visualization.arrayToDataTable([
          ["Semana","Fabricado","Meta"],

          <?php
          $query = "SELECT
          WEEK(pr.fechaIntroduccion) AS semana,
          year(pr.fechaIntroduccion) AS anio,
          SUM(pr.cantidadProduccion) AS produccion,
          SUM(pr.metaProduccion) AS meta

          FROM ct_program p

          LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente
          LEFT JOIN ct_produccion pr ON pr.fk_programacion = p.pk_programacion

          GROUP BY anio ASC, semana ASC LIMIT 15";

          $r = mysqli_query($conn, $query);
            $i = 0;
            $n = mysqli_num_rows($r);
            while ($row = mysqli_fetch_assoc($r)) {
              $meta = $row['meta'];
              $real = $row['produccion'];
              $anio = $row['anio'];
              $semana = $row['semana']+1;
              $numerosem = "Sem.";

              if ($meta == null) {
                $meta = 0;
              }

              if ($real == null) {
                  $real = 0;
              }

              print "[
                '".$numerosem." ".$semana." ".$anio."', ".$real.", ".$meta."
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
          vAxis: {title: 'Piezas',  titleTextStyle: {color: '#FF0000'}, format : ""},

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


<!-- GRAFICA MENSUAL -->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(graficaMensual);

      function graficaMensual() {
        var data = google.visualization.arrayToDataTable([
          ["Mes","Fabricado","Meta"],

          <?php
          $query = "SELECT
          CASE WHEN MONTH(pr.fechaIntroduccion) = 1 THEN 'Ene'
          WHEN MONTH(pr.fechaIntroduccion) = 2 THEN 'Feb'
          WHEN MONTH(pr.fechaIntroduccion) = 3 THEN 'Mar'
          WHEN MONTH(pr.fechaIntroduccion) = 4 THEN 'Abr'
          WHEN MONTH(pr.fechaIntroduccion) = 5 THEN 'May'
          WHEN MONTH(pr.fechaIntroduccion) = 6 THEN 'Jun'
          WHEN MONTH(pr.fechaIntroduccion) = 7 THEN 'Jul'
          WHEN MONTH(pr.fechaIntroduccion) = 8 THEN 'Ago'
          WHEN MONTH(pr.fechaIntroduccion) = 9 THEN 'Sep'
          WHEN MONTH(pr.fechaIntroduccion) = 10 THEN 'Oct'
          WHEN MONTH(pr.fechaIntroduccion) = 11 THEN 'Nov'
          WHEN MONTH(pr.fechaIntroduccion) = 12 THEN 'Dic'
          ELSE '' END AS mes,
          year(pr.fechaIntroduccion) AS anio,
          SUM(pr.cantidadProduccion) AS produccion,
          SUM(pr.metaProduccion) AS meta,
          pr.fechaIntroduccion AS fecha

          FROM ct_program p

          LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente
          LEFT JOIN ct_produccion pr ON pr.fk_programacion = p.pk_programacion

          GROUP BY  mes
          ORDER BY fecha ASC LIMIT 6";

          $r = mysqli_query($conn, $query);
            $i = 0;
            $n = mysqli_num_rows($r);
            while ($row = mysqli_fetch_assoc($r)) {
              $meta = $row['meta'];
              $anio = $row['anio'];
              $real = $row['produccion'];
              $mes = $row['mes'];
              $numerosem = "Sem.";

              if ($meta == null) {
                $meta = 0;
              }

              if ($real == null) {
                  $real = 0;
              }

              print "[
                '".$mes." ".$anio."', ".$real.", ".$meta."
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
          vAxis: {title: 'Piezas',  titleTextStyle: {color: '#FF0000'}, format : ""},
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

<div class="modal fade" id="ModalGraficaPRO">
  <div class="modal-dialog modal-grande">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">GRAFICAS PRODUCCION</h5>
      </div>
      <div class="modal-body pt-0">
        <div class="row submenuMed">

          <ul class="nav nav-pills nav-fill w-100" id="selectGrafica">
            <li class="nav-item">
              <a class="nav-link consultar" id="submenuchico" accion="diaria" status="cerrado">Grafica Diario</a>
            </li>
            <li class="nav-item">
              <a class="nav-link consultar" id="submenuchico" accion="semanal" status="cerrado">Grafica Semanal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link consultar" id="submenuchico" accion="mensual" status="cerrado">Grafica Mensual</a>
            </li>
          </ul>
        </div>

        <div class="mt-5" id="graficadiaria" style="display:none"></div>
        <div class="mt-5" id="graficasemanal" style="display:none"></div>
        <div class="mt-5" id="graficamensual" style="display:none"></div>
      </div>
    </div>
  </div>
</div>

<!-- GRAFICA DIARIA -->
    <script type="text/javascript">

      $(function(){

      })
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(graficaDiaria);

      function graficaDiaria() {
        var data = google.visualization.arrayToDataTable([
          ["Dia","Fabricado","Meta"],

          <?php
          $query = "SELECT
          CASE WHEN DAYOFWEEK(pr.fechaIntroduccion) = 2 THEN 'Lun'
          WHEN DAYOFWEEK(pr.fechaIntroduccion) = 3 THEN 'Mar'
          WHEN DAYOFWEEK(pr.fechaIntroduccion) = 4 THEN 'Mie'
          WHEN DAYOFWEEK(pr.fechaIntroduccion) = 5 THEN 'Jue'
          WHEN DAYOFWEEK(pr.fechaIntroduccion) = 6 THEN 'Vie'
          WHEN DAYOFWEEK(pr.fechaIntroduccion) = 7 THEN 'Sab'
          WHEN DAYOFWEEK(pr.fechaIntroduccion) = 1 THEN 'Dom'
          ELSE '' END AS dia,
          pr.pk_produccion AS id,
          year(pr.fechaIntroduccion) AS anio,
          DATE_FORMAT(pr.fechaIntroduccion, '%d-%m-%Y') AS fecha,
          pr.fechaIntroduccion AS fintroduc,
          SUM(pr.cantidadProduccion) AS produccion,
          SUM(pr.metaProduccion) AS meta

          FROM ct_program p

          LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente
          LEFT JOIN ct_produccion pr ON pr.fk_programacion = p.pk_programacion
          GROUP BY fintroduc ASC";

          $r = mysqli_query($conn, $query);
            $i = 0;
            $n = mysqli_num_rows($r);
            while ($row = mysqli_fetch_assoc($r)) {
              $meta = $row['meta'];
              $anio = $row['anio'];
              $fecha = $row['fecha'];
              $real = $row['produccion'];
              $dia = $row['dia'];

              if ($meta == null) {
                $meta = 0;
              }

              if ($real == null) {
                  $real = 0;
              }

              print "[
                '".$dia." ".$fecha."', ".$real.", ".$meta."
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
          hAxis: {title: 'Días',  titleTextStyle: {color: '#FF0000'},slantedText: true,
          slantedTextAngle:40},
          vAxis: {title: 'Piezas',  titleTextStyle: {color: '#FF0000'}, format : ""},
          width:1065,
          height: 500,
          legend:{
            textStyle:{color:"#0056b3",fontSize:16,bold:true}
          },
          pointSize: 6,
          pointShape: 'diamond',
          pointsVisible: true
        };


        var chart = new google.visualization.AreaChart(document.getElementById('graficadiaria'));
        chart.draw(data, options);
      }

    </script>
