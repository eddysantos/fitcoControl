
<?php

// require 'conexion.php';
function conectarBD(){
           $server = "localhost";
           $usuario = "root";
           $pass = "root";
           $BD = "Fitco";
           $port = 8889;

           $conexion = mysqli_connect($server, $usuario, $pass, $BD, $port);
           if(!$conexion){
              echo 'Ha sucedido un error inexperado en la conexion de la base de datos<br>';
           }
           return $conexion;
   }

   function desconectarBD($conexion){
           $close = mysqli_close($conexion);
           if(!$close){
              echo 'Ha sucedido un error inexperado en la desconexion de la base de datos<br>';
           }
           return $close;
   }

   function getArraySQL($sql){

       $conexion = conectarBD();
       if(!$result = mysqli_query($conexion, $sql)) die();

       $rawdata = array();
       $i=0;
       while($row = mysqli_fetch_array($result))
       {
           $rawdata[$i] = $row;
           $i++;
       }
       desconectarBD($conexion);
       return $rawdata;
   }


$sql = "SELECT
        fechaIntroduccion,
        cantidadProduccion,
        metaProduccion
        FROM ct_produccion pr
        LEFT JOIN  ct_program p ON pr.fk_programacion = p.pk_programacion
        ORDER BY fechaIntroduccion ASC";

          $rawdata = getArraySQL($sql);

          for($i=0;$i<count($rawdata);$i++){
              $time = $rawdata[$i]["fechaIntroduccion"];
              $date = new DateTime($time);
              $rawdata[$i]["fechaIntroduccion"]=$date->getTimestamp()*1000;
          }
?>



<div class="modal fade" id="GraficaHigh">
  <div class="modal-dialog modal-grande">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">GRAFICA PRODUCCION</h5>
      </div>
      <div class="modal-body pt-0">
        <div class="mt-5" id="contenedor"></div>
      </div>
    </div>
  </div>
</div>




<script type='text/javascript'>
  Highcharts.setOptions({
    lang: {
      months: [
        'Enero', 'Febrebro', 'Marzo', 'Abril',
        'Mayo', 'Junio', 'Julio', 'Agosto',
        'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
      ],
      weekdays: [
        'Domingo', 'Lunes', 'Martes', 'Miercoles',
        'Jueves', 'Viernes', 'Sabado'
      ]
    }
  });

  Highcharts.dateFormats = {
    W: function (timestamp) {
      var date = new Date(timestamp),
      day = date.getUTCDay() == 0 ? 7 : date.getUTCDay(),
      dayNumber;
      date.setDate(date.getUTCDate() + 4 - day);
      dayNumber = Math.floor((date.getTime() - new Date(date.getUTCFullYear(), 0, 1, -6)) / 86400000);
      return 1 + Math.floor(dayNumber / 7);
    }
  };

  chartCPU = new Highcharts.StockChart({
    chart: {
      renderTo: 'contenedor'
    },

    rangeSelector: {
      buttons: [{

        type: 'month',
        count: 1,
        text: 'Dia',
        dataGrouping: {
          forced: true,
          units: [['day', [1]]]
        }

      },{ //Comienza filtro por semana

        type: 'month',
        count: 1,
        text: 'Semana',
        dataGrouping: {
          forced: true,
          units: [['week', [1]]]
        }
      },{ //Comienza filtro por Mes
        type: 'month',
        count: 4,
        text: 'Mes',
        dataGrouping: {
          forced: true,
          units: [['month', [1]]]
        }
      },{ //Comienza filtro por año
        type: "year",
        count: 1,
        text: "Año",
        dataGrouping: {
          approximation: "sum",
          forced: true,
          units: [ [ "year", [ 1 ] ] ]
        }
      },
    ],

    buttonTheme: {
      width: 60
    },
    selected: 3
  },

  title: { //titulo
    text: 'Produccion'
  },

  subtitle: { //Sub titulo
    text: 'Meta Vs Elaborado'
  },

  xAxis: {
    type: 'datetime',
    dateTimeLabelFormats: {
      // second: '%Y-%m-%d<br/>%H:%M:%S',
      // minute: '%Y-%m-%d<br/>%H:%M',
      // hour: '%Y-%m-%d<br/>%H:%M',
      day: '%m-%d<br/>%Y',
      week: 'Sem %W<br/>%Y',
      month: '%m-%Y',
      year: '%Y'
    }
  },

  yAxis: {
    title: {
      text: 'Valores',
      margin: 10
    }
  },

  legend: {
      enabled: true
  },

  exporting: {
    enabled: false
  },

  series: [{

    name: 'Produccion',
    color: '#a3e3af',
    data: (function() {
      var data = [];
      <?php
      for($i = 0 ;$i<count($rawdata);$i++){
        ?>

        data.push([<?php echo $rawdata[$i]["fechaIntroduccion"];?>,<?php echo $rawdata[$i]["cantidadProduccion"];?>]);
        <?php } ?>

        return data;
      })()
    },{ // comienza la segunda serie

      name: 'Meta',
      color: '#334974',
      data: (function() {
        var data = [];
        <?php
        for($i = 0 ;$i<count($rawdata);$i++){
          ?>

          data.push([<?php echo $rawdata[$i]["fechaIntroduccion"];?>,<?php echo $rawdata[$i]["metaProduccion"];?>]);
          <?php } ?>

          return data;
        })()
      }]
    });
  </script>
