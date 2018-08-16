
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

  </head>
</html>

<div class="modal fade" id="Grafica1">
  <div class="modal-dialog modal-grande">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">GRAFICA PRODUCCION</h5>
      </div>
      <div class="modal-body pt-0">
        <div class="mt-5" id="graficadiaria"></div>
        <!-- <div class="mt-5" id="graficasemanal" style="display:none"></div>
        <div class="mt-5" id="graficamensual" style="display:none"></div> -->

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
          pr.fechaIntroduccion AS semana,
          pr.cantidadProduccion AS produccion,
          pr.metaProduccion AS meta

          FROM ct_program p

          -- LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente
          LEFT JOIN ct_produccion pr ON pr.fk_programacion = p.pk_programacion";

          $r = mysqli_query($conn, $query);
            $i = 0;
            $n = mysqli_num_rows($r);
            while ($row = mysqli_fetch_assoc($r)) {
              $meta = $row['meta'];
              $real = $row['produccion'];
              $anio = $row['anio'];
              $semana = $row['semana'];
              $numerosem = "Sem.";

              if ($meta == null) {
                $meta = 0;
              }

              if ($real == null) {
                  $real = 0;
              }

              print "[
                ".$semana.", ".$real.", ".$meta."
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
          // explorer: {  },
          explorer: {
            actions: ['dragToZoom', 'rightClickToReset']
            // actions: ['dragToZoom', 'dragToPan', 'rightClickToReset'],
            // axis: 'horizontal'


          },
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
