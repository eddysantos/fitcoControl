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
// if ($_POST['request']) {
//   $data = $_POST;
//   $request = $data['request'];

  $queryDiaria = "SELECT
  CASE WHEN DAYOFWEEK(li.fecha) = 2 THEN 'Lun'
  WHEN DAYOFWEEK(li.fecha) = 3 THEN 'Mar'
  WHEN DAYOFWEEK(li.fecha) = 4 THEN 'Mie'
  WHEN DAYOFWEEK(li.fecha) = 5 THEN 'Jue'
  WHEN DAYOFWEEK(li.fecha) = 6 THEN 'Vie'
  WHEN DAYOFWEEK(li.fecha) = 7 THEN 'Sab'
  WHEN DAYOFWEEK(li.fecha) = 1 THEN 'Dom'
  ELSE '' END AS dia,
  DATE_FORMAT(li.fecha, ' %d/%m') AS fechaX,
  -- pr.cantidadProduccion AS produccion,
  li.meta AS meta,
  li.fecha AS fecha,
  li.operacion,
  li.pk_linea,
  li.linea,
  li.nombre,
  li.prod1,
  li.prod2,
  li.prod3,
  li.prod4,
  li.prod5,
  li.prod6,
  li.prod7,
  li.prod8,
  li.prod9,
  li.prod10


  FROM ct_linea  li
  -- WHERE linea = 'Linea 1'
  -- WHERE li.linea = '$request'

  GROUP BY li.pk_linea
  ORDER BY li.fecha ASC";


  $result = mysqli_query($conn, $queryDiaria);

  $valuesArray[] = 'Produccion';
  $valuesArray2[] = 'Meta';
  $fechaDia[] = 'x';

  while ($row = $result->fetch_assoc()) {
    $idlinea = $row['pk_linea'];
    $linea = $row['linea'];
    $ope = $row['operacion'];
    $meta = $row['meta'];
    $fecha = $row['fecha'];
    $nombre = $row['nombre'];
    $prod1 = $row['prod1'];
    $prod2 = $row['prod2'];
    $prod3 = $row['prod3'];
    $prod4 = $row['prod4'];
    $prod5 = $row['prod5'];
    $prod6 = $row['prod6'];
    $prod7 = $row['prod7'];
    $prod8 = $row['prod8'];
    $prod9 = $row['prod9'];
    $prod10 = $row['prod10'];

  // sumar progreso
    $sp2 = ($prod1 + $prod2);
    $sp3 = ($sp2 + $prod3);
    $sp4 = ($sp3 + $prod4);
    $sp5 = ($sp4 + $prod5);
    $sp6 = ($sp5 + $prod6);
    $sp7 = ($sp6 + $prod7);
    $sp8 = ($sp7 + $prod8);
    $sp9 = ($sp8 + $prod9);
    $sp10 = ($sp9 + $prod10);

  //calcular avance
    if ($prod1 == 0) {
      $av1 = 0;
    }else {
      $av1 = ($prod1/1 * 10);
      $av1 = number_format($av1,0,',','.');
    }

    if ($prod2 == 0) {
      $av2 = 0;
    }else {
      $av2 = ($sp2/2 * 10);
      $av2 = number_format($av2,0,',','.');
    }

    if ($prod3 == 0) {
      $av3 = 0;
    }else {
      $av3 = ($sp3/3 * 10);
      $av3 = number_format($av3,0,',','.');
    }

    if ($prod4 == 0) {
      $av4 = 0;
    }else {
      $av4 = ($sp4/4 * 10);
      $av4 = number_format($av4,0,',','.');
    }

    if ($prod5 == 0) {
      $av5 = 0;
    }else {
      $av5 = ($sp5/5 * 10);
      $av5 = number_format($av5,0,',','.');
    }

    if ($prod6 == 0) {
      $av6 = 0;
    }else {
      $av6 = ($sp6/6 * 10);
      $av6 = number_format($av6,0,',','.');
    }

    if ($prod7 == 0) {
      $av7 = 0;
    }else {
      $av7 = ($sp7/7 * 10);
      $av7 = number_format($av7,0,',','.');
    }

    if ($prod8 == 0) {
      $av8 = 0;
    }else {
      $av8 = ($sp8/8 * 10);
      $av8 = number_format($av8,0,',','.');
    }

    if ($prod9 == 0) {
      $av9 = 0;
    }else {
      $av9 = ($sp9/9 * 10);
      $av9 = number_format($av9,0,',','.');
    }

    if ($prod10 == 0) {
      $av10 = 0;
    }else {
      $av10 = ($sp10/10 * 10);
      $av10 = number_format($av10,0,',','.');
    }


    //calcular % EFICIENCIA
      $ef1 = ($av1/$meta);
      $efi1 = number_format($ef1 * 100, 2, ",", ".")." %";

      $ef2 = ($av2/$meta);
      $efi2 = number_format($ef2 * 100, 2, ",", ".")." %";

      $ef3 = ($av3/$meta);
      $efi3 = number_format($ef3 * 100, 2, ",", ".")." %";

      $ef4 = ($av4/$meta);
      $efi4 = number_format($ef4 * 100, 2, ",", ".")." %";

      $ef5 = ($av5/$meta);
      $efi5 = number_format($ef5 * 100, 2, ",", ".")." %";

      $ef6 = ($av6/$meta);
      $efi6 = number_format($ef6 * 100, 2, ",", ".")." %";

      $ef7 = ($av7/$meta);
      $efi7 = number_format($ef7 * 100, 2, ",", ".")." %";

      $ef8 = ($av8/$meta);
      $efi8 = number_format($ef8 * 100, 2, ",", ".")." %";

      $ef9 = ($av9/$meta);
      $efi9 = number_format($ef9 * 100, 2, ",", ".")." %";

      $ef10 = ($av10/$meta);
      $efi10 = number_format($ef10 * 100, 2, ",", ".")." %";


   $fechaDia[] = $row['dia'].' '.$row['fechaX'];
   $valuesArray[] = $sp10;
   $valuesArray2[] = $meta;
  }
// }




?>


<link href="/fitcoControl/Resources/c3/c3.css" rel="stylesheet">
<script src="/fitcoControl/Resources/c3/d3.v5.min.js"></script>
<script src="/fitcoControl/Resources/c3/c3.min.js"></script>

<div class="modal fade" id="graficasLineas">
  <div class="modal-dialog modal-grande">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">GRAFICAS LINEAS</h5>
      </div>
      <div class="modal-body pt-0">
        <div class="row submenuMed">
          <ul class="nav nav-pills nav-fill w-100" id="selectGrafica">
            <li class="nav-item">
              <a class="nav-link consultar" id="submenuchico" accion="horaLin" status="cerrado">Grafica por Hora</a>
            </li>
            <li class="nav-item">
              <a class="nav-link consultar" id="submenuchico" accion="diariaLin" status="cerrado">Grafica Diario</a>
            </li>
            <li class="nav-item">
              <a class="nav-link consultar" id="submenuchico" accion="semanalLin" status="cerrado">Grafica Semanal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link consultar" id="submenuchico" accion="mensualLin" status="cerrado">Grafica Mensual</a>
            </li>
          </ul>
        </div>



        <!-- <div class="mt-5" id="graficahoraLin" style="display:none"> -->

          <div class="row">
            <div class="col-md-2 text-left">
              <select id="fetchLinea" class="c-select" style="letter-spacing: 3px;color: rgba(62, 109, 140, 0.85);">
                <option value="">Selecciona Linea</option>
                <option value="Linea 1">Linea 1</option>
                <option value="Linea 2">Linea 2</option>
                <option value="Linea 3">Linea 3</option>
                <option value="Linea 4">Linea 4</option>
                <option value="Linea 5">Linea 5</option>
                <option value="Linea 6">Linea 6</option>
              </select>
            </div>
            <div class="col-md-1 text-left pl-0">
              <a href="#" class="rotate-link ancla" id="filtroLinea">
                <img src="/fitcoControl/Resources/iconos/searchF.svg" class="icon1 rotate-icon" style="width:30px;">
              </a>
            </div>
          </div>
        <!-- </div> -->
        <div class="mt-5" id="graficahoraLin" style="display:none"></div>
        <div class="mt-5" id="graficadiariaLin" style="display:none"></div>
        <div class="mt-5 mb-5" id="graficasemanalLin" style="display:none"></div>
        <div class="mt-5 mb-5" id="graficamensualLin" style="display:none"></div>
      </div>
    </div>
  </div>
</div>



<script>
  var xAxisArr = <?php echo json_encode($fechaDia); ?>;
  var dataArr = <?php echo json_encode($valuesArray, JSON_NUMERIC_CHECK); ?>;
  var dataArr2 = <?php echo json_encode($valuesArray2, JSON_NUMERIC_CHECK); ?>;

  var chart = c3.generate({
    bindto: '#graficahoraLin',
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
