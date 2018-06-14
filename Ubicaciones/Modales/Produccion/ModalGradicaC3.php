<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);

// ********************************//
//  G R A F I C A     D I A R I A  //
// ********************************//
$queryDiaria = "SELECT
CASE WHEN DAYOFWEEK(pr.fechaIntroduccion) = 2 THEN 'Lun'
WHEN DAYOFWEEK(pr.fechaIntroduccion) = 3 THEN 'Mar'
WHEN DAYOFWEEK(pr.fechaIntroduccion) = 4 THEN 'Mie'
WHEN DAYOFWEEK(pr.fechaIntroduccion) = 5 THEN 'Jue'
WHEN DAYOFWEEK(pr.fechaIntroduccion) = 6 THEN 'Vie'
WHEN DAYOFWEEK(pr.fechaIntroduccion) = 7 THEN 'Sab'
WHEN DAYOFWEEK(pr.fechaIntroduccion) = 1 THEN 'Dom'
ELSE '' END AS dia,
DATE_FORMAT(pr.fechaIntroduccion, ' %d/%m') AS fechaX,
pr.cantidadProduccion AS produccion,
pr.metaProduccion AS meta,
pr.fechaIntroduccion AS fecha

FROM ct_program p LEFT JOIN ct_produccion pr ON pr.fk_programacion = p.pk_programacion

GROUP BY fecha
ORDER BY fecha ASC limit 25";


$result = mysqli_query($conn, $queryDiaria);

$valuesArray[] = 'Produccion';
$valuesArray2[] = 'Meta';
$fechaDia[] = 'x';

while ($row = $result->fetch_assoc()) {
 $fechaDia[] = $row['dia'].' '.$row['fechaX'];
 $valuesArray[] = $row['produccion'];
 $valuesArray2[] = $row['meta'];
}

// **********************************//
//  G R A F I C A     S E M A N A L  //
// **********************************//

$querySemanal = "SELECT
WEEK(pr.fechaIntroduccion) AS semana,
year(pr.fechaIntroduccion) AS anio,
SUM(pr.cantidadProduccion) AS produccion,
SUM(pr.metaProduccion) AS meta,
pr.fechaIntroduccion AS fecha

FROM ct_program p

LEFT JOIN ct_produccion pr ON pr.fk_programacion = p.pk_programacion

GROUP BY  semana
ORDER BY fecha ASC LIMIT 12";


$result = mysqli_query($conn, $querySemanal);

$producSemanal[] = 'Produccion';
$metaSemanal[] = 'Meta';
$semana[] = 'x';

while ($row = $result->fetch_assoc()) {
 $semana[] = 'Sem '.$row['semana'].'/'.$row['anio'];
 $producSemanal[] = $row['produccion'];
 $metaSemanal[] = $row['meta'];
}

// **********************************//
//  G R A F I C A     M E N S U A L  //
// **********************************//
$queryMensual = "SELECT
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

LEFT JOIN ct_produccion pr ON pr.fk_programacion = p.pk_programacion

GROUP BY  mes
ORDER BY fecha ASC LIMIT 12";
$result = mysqli_query($conn, $queryMensual);

$producMensual[] = 'Produccion';
$metaMensual[] = 'Meta';
$mes[] = 'x';

while ($row = $result->fetch_assoc()) {
 $mes[] = $row['mes'].' '.$row['anio'];
 $producMensual[] = $row['produccion'];
 $metaMensual[] = $row['meta'];
}

?>

<link href="/fitcoControl/Resources/c3/c3.css" rel="stylesheet">
<script src="/fitcoControl/Resources/c3/d3.v5.min.js"></script>
<script src="/fitcoControl/Resources/c3/c3.min.js"></script>

<div class="modal fade" id="ModalGraficaC3">
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
        <div class="mt-5 mb-5" id="graficasemanal" style="display:none"></div>
        <div class="mt-5 mb-5" id="graficamensual" style="display:none"></div>
      </div>
    </div>
  </div>
</div>

<!-- // ********************************//
    //  G R A F I C A     D I A R I A  //
   // ********************************// -->
<script>
  var xAxisArr = <?php echo json_encode($fechaDia); ?>;
  var dataArr = <?php echo json_encode($valuesArray, JSON_NUMERIC_CHECK); ?>;
  var dataArr2 = <?php echo json_encode($valuesArray2, JSON_NUMERIC_CHECK); ?>;

  var chart = c3.generate({
    bindto: '#graficadiaria',
    data: {
      x: 'x',
      columns: [
        xAxisArr,
        dataArr,
        dataArr2
      ],
    },


    size: {
      width: 1280,
      height: 480
    },
    legend: {
        position: 'right'
    },

    axis: {
      x: {
        type: 'category',
       // type: 'timeseries',
       //
       // tick: {
       //   format: '%Y-%m-%d'
       // }
      }
    },
    subchart: {
      show: true,
    }
  });
</script>

<!-- // **********************************//
    //  G R A F I C A     M E N S U A L  //
   // **********************************// -->
<script>
    var Mes = <?php echo json_encode($mes); ?>;
    var produccion = <?php echo json_encode($producMensual, JSON_NUMERIC_CHECK); ?>;
    var meta = <?php echo json_encode($metaMensual, JSON_NUMERIC_CHECK); ?>;

    var chart = c3.generate({
      bindto: '#graficamensual',
      data: {
        x: 'x',
        columns: [
          Mes,
          produccion,
          meta
        ],
      },

      size: {
        width: 1250,
        height: 480

      },
      legend: {
          position: 'right'
      },

      axis: {
        x: {
         type: 'category'
        }
      },
      subchart: {
        show: true,
      }
    });
</script>

<!-- // **********************************//
    //  G R A F I C A     M E N S U A L  //
   // **********************************// -->
<script>
    var semana = <?php echo json_encode($semana); ?>;
    var producSemanal = <?php echo json_encode($producSemanal, JSON_NUMERIC_CHECK); ?>;
    var metaSemanal = <?php echo json_encode($metaSemanal, JSON_NUMERIC_CHECK); ?>;

    var chart = c3.generate({
      bindto: '#graficasemanal',
      data: {
        x: 'x',
        columns: [
          semana,
          producSemanal,
          metaSemanal
        ],
      },
      legend: {
          position: 'right'
      },

      size: {
        width: 1250,
        height: 480

      },

      axis: {
        x: {
         type: 'category'
        }
      },
      subchart: {
        show: true,
      }
    });
</script>
