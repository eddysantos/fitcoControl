
<!--GRAFICA PARA VENTAS-->
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
          ["Semana","Requerido","Fabricado","Pendiente"],

          <?php
          $query = "SELECT

          p.pk_programacion AS idprogram,
          c.nombreCliente AS cliente,
          WEEK(p.end) AS semana,
          c.colorCliente AS color,
          SUM(pr.cantidadProduccion) AS produccion,
          SUM(p.piezasRequeridas) AS requerido

          FROM ct_program p

          LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente
          LEFT JOIN ct_produccion pr ON p.pk_programacion = pr.fk_programacion

          GROUP BY semana";

          $r = mysqli_query($conn, $query);
            $i = 0;
            $n = mysqli_num_rows($r);
            while ($row = mysqli_fetch_assoc($r)) {
              $requerido = $row["requerido"];
              $produccion = $row["produccion"];
              $semana = $row["semana"];
              $pendientetermino = $row['requerido']-$row['produccion'];
              $numerosem = "Sem.";

              if ($requerido == null) {
                $requerido = 0;
              }elseif ($produccion == null) {
                $produccion = 0;
              }elseif ($pendientetermino == null) {
                $pendientetermino = 0;
              }

              print "[
                '".$numerosem." ".$semana."', ".$requerido.", ".$produccion.", ".$pendientetermino."
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
  </head>
</html>

<div class="modal fade" id="ModalGraficaPRO">
  <div class="modal-dialog modal-grande">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">GRAFICO PRODUCCION POR SEMANA</h5>
      </div>
      <div class="modal-body">
        <div id="graficasemanal" class=""></div>
      </div>
    </div>
  </div>
</div>
