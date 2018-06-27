<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

  google.charts.load('current', {'packages':['corechart', 'controls']});
  google.charts.setOnLoadCallback(drawStuff);

  function drawStuff() {
    var data = new google.visualization.DataTable();
    data.addColumn('date', 'Date');
    data.addColumn('number', 'Value');



    // add 100 rows of pseudo-random-walk data
    for (var i = 0, val = 50; i < 100; i++) {
      val += ~~(Math.random() * 5) * Math.pow(-1, ~~(Math.random() * 2));
      if (val < 0) {
        val += 5;
      }
      if (val > 100) {
        val -= 5;
      }
      data.addRow([new Date(2014, 0, i + 1), val]);
    }


    var chart = new google.visualization.ChartWrapper({
      chartType: 'LineChart',
      containerId: 'chart_div',
      options: {
        height: 400,

        // omit width, since we set this in CSS
        chartArea: {
          width: '75%' // this should be the same as the ChartRangeFilter
        }
      }
    });

    var control = new google.visualization.ControlWrapper({
      controlType: 'ChartRangeFilter',
      containerId: 'control_div',
      options: {
        filterColumnIndex: 0,
        ui: {
          chartOptions: {
            height: 50,
            // omit width, since we set this in CSS
            chartArea: {
              width: '75%' // this should be the same as the ChartRangeFilter
            }
          }
        }
      }
    });

    var dashboard = new google.visualization.Dashboard(document.querySelector('#dashboard_div'));
    dashboard.bind([control], [chart]);
    dashboard.draw(data);

    function zoomLastDay () {
      var range = data.getColumnRange(0);
      control.setState({
        range: {
          start: new Date(range.max.getFullYear(), range.max.getMonth(), range.max.getDate() - 1),
          end: range.max
        }
      });
      control.draw();
    }
    function zoomLastWeek () {
      var range = data.getColumnRange(0);
      control.setState({
        range: {
          start: new Date(range.max.getFullYear(), range.max.getMonth(), range.max.getDate() - 7),
          end: range.max
        }
      });
      control.draw();
    }
    function zoomLastMonth () {
        var range = data.getColumnRange(0);
        control.setState({
          range: {
            start: new Date(range.max.getFullYear(), range.max.getMonth() - 1, range.max.getDate()),
            end: range.max
          }
        });
        control.draw();
      }

      var runOnce = google.visualization.events.addListener(dashboard, 'ready', function () {
        google.visualization.events.removeListener(runOnce);

        if (document.addEventListener) {
          document.querySelector('#lastDay').addEventListener('click', zoomLastDay);
          document.querySelector('#lastWeek').addEventListener('click', zoomLastWeek);
          document.querySelector('#lastMonth').addEventListener('click', zoomLastMonth);
        }
        else if (document.attachEvent) {
          document.querySelector('#lastDay').attachEvent('onclick', zoomLastDay);
          document.querySelector('#lastWeek').attachEvent('onclick', zoomLastWeek);
          document.querySelector('#lastMonth').attachEvent('onclick', zoomLastMonth);
        }
        else {
          document.querySelector('#lastDay').onclick = zoomLastDay;
          document.querySelector('#lastWeek').onclick = zoomLastWeek;
          document.querySelector('#lastMonth').onclick = zoomLastMonth;
        }
      });
    }
  </script>


<div class="modal fade" id="PruebaZoom">
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
          <div id="dashboard_div">
            Zoom<br/>
            <input id="lastDay" type="button" value="Last Day" >
            <input id="lastWeek" type="button" value="Last Week" />
            <input id="lastMonth" type="button" value="Last Month" />
            <div id="chart_div"></div>
            <div id="control_div"></div>
          </div>
        </div>
    </div>
  </div>
</div>
