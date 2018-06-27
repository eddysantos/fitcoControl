
<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);

// $query = $query = "SELECT
// pr.fechaIntroduccion AS semana,
// pr.cantidadProduccion AS produccion,
// pr.metaProduccion AS meta
//
// FROM ct_program p
//
// LEFT JOIN ct_produccion pr ON pr.fk_programacion = p.pk_programacion";
//
// $result = mysqli_query($conn,$query);

$query = "SELECT
pr.fechaIntroduccion AS semana,
pr.cantidadProduccion AS produccion,
pr.metaProduccion AS meta

FROM ct_program p

-- LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente
LEFT JOIN ct_produccion pr ON pr.fk_programacion = p.pk_programacion";
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart', 'controls']});
      google.charts.setOnLoadCallback(grafica);

      function grafica() {

        var data = new google.visualization.DataTable();
        // data.addColumn('date', 'Fecha');
        data.addColumn('string', 'Fecha');
        data.addColumn('number', 'Fabricado');
        data.addColumn('number', 'Meta');


        data.addRows([
          <?php


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
                '".$semana."', ".$real.", ".$meta."
                ]";

              $i++;
              if ($i<$n) {
               print ",";
              }
            }
          ?>
        ]);

        var graficaLinea  = new google.visualization.ChartWrapper({
          chartType: 'LineChart',
          containerId: 'chart_div',
          options: {

            explorer: {
              actions: ['dragToZoom', 'rightClickToReset'],
              axis: 'horizontal',
              keepInBounds: true,
              maxZoomIn: 4.0
            },
            height: 400,
            width: 750
          }
        });

        var control = new google.visualization.ControlWrapper({
          controlType: 'NumberRangeFilter',
          containerId: 'control_control_div',
          options: {
            filterColumnLabel: 'Fabricado',
            ui: {'labelStacking': 'vertical'}
          }

        });


        // var dashboard = new google.visualization.Dashboard(document.getElementById('programmatic_dashboard_div'));
          var dashboard = new google.visualization.Dashboard(document.querySelector('#programmatic_dashboard_div'));

        dashboard.bind([control], [graficaLinea]);
        dashboard.draw(data);


        // function zoomLastDay () {
        //   var range = data.getColumnRange(0);
        //   control.setState({
        //     range: {
        //       start: new Date(range.max.getFullYear(), range.max.getMonth(), range.max.getDate() - 1),
        //       end: range.max
        //     }
        //   });
        //   control.draw();
        // }
        // function zoomLastWeek () {
        //   var range = data.getColumnRange(0);
        //   control.setState({
        //     range: {
        //       start: new Date(range.max.getFullYear(), range.max.getMonth(), range.max.getDate() - 7),
        //       end: range.max
        //     }
        //   });
        //   control.draw();
        // }
        // function zoomLastMonth () {
        //     var range = data.getColumnRange(0);
        //     control.setState({
        //       range: {
        //         start: new Date(range.max.getFullYear(), range.max.getMonth() - 1, range.max.getDate()),
        //         end: range.max
        //       }
        //     });
        //     control.draw();
        //   }
        //
        //   var runOnce = google.visualization.events.addListener(dashboard, 'ready', function () {
        //     google.visualization.events.removeListener(runOnce);
        //
        //     if (document.addEventListener) {
        //       document.querySelector('#lastDay').addEventListener('click', zoomLastDay);
        //       document.querySelector('#lastWeek').addEventListener('click', zoomLastWeek);
        //       document.querySelector('#lastMonth').addEventListener('click', zoomLastMonth);
        //     }
        //     else if (document.attachEvent) {
        //       document.querySelector('#lastDay').attachEvent('onclick', zoomLastDay);
        //       document.querySelector('#lastWeek').attachEvent('onclick', zoomLastWeek);
        //       document.querySelector('#lastMonth').attachEvent('onclick', zoomLastMonth);
        //     }
        //     else {
        //       document.getElementById('#lastDay').onclick = zoomLastDay;
        //       document.getElementById('#lastWeek').onclick = zoomLastWeek;
        //       document.getElementById('#lastMonth').onclick = zoomLastMonth;
        //     }
        //   });
      }




    </script>
  </head>

</html>

<div class="modal fade" id="ModalPrueba">
  <div class="modal-dialog modal-grande">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">GRAFICAS PRODUCCION</h5>
      </div>
      <div class="modal-body pt-0">
        <div id="programmatic_dashboard_div" style="border: 1px solid #ccc">
          <table class="columns">
            <tr>
              <td>
                <div id="control_control_div"></div>
              </td>
              <td>
                <div id="chart_div"></div>
              </td>
            </tr>
            <!-- <tr>
              <td>
                Zoom<br/>
                <input id="lastDay" type="button" value="Last Day" >
                <input id="lastWeek" type="button" value="Last Week" />
                <input id="lastMonth" type="button" value="Last Month" />
              </td>
            </tr> -->
          </table>

        </div>
    </div>
  </div>
</div>
