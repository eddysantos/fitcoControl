<!--GRAFICA PARA VENTAS-->

<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);


$query = "SELECT

CASE WHEN MONTH(v.fechaIngreso) = 1 THEN 'Ene'
WHEN MONTH(v.fechaIngreso) = 2 THEN 'Feb'
WHEN MONTH(v.fechaIngreso) = 3 THEN 'Mar'
WHEN MONTH(v.fechaIngreso) = 4 THEN 'Abr'
WHEN MONTH(v.fechaIngreso) = 5 THEN 'May'
WHEN MONTH(v.fechaIngreso) = 6 THEN 'Jun'
WHEN MONTH(v.fechaIngreso) = 7 THEN 'Jul'
WHEN MONTH(v.fechaIngreso) = 8 THEN 'Ago'
WHEN MONTH(v.fechaIngreso) = 9 THEN 'Sep'
WHEN MONTH(v.fechaIngreso) = 10 THEN 'Oct'
WHEN MONTH(v.fechaIngreso) = 11 THEN 'Nov'
WHEN MONTH(v.fechaIngreso) = 12 THEN 'Dic'
ELSE 'Esto no es mes' END AS mes,

v.nombreVendedor AS vendedor,
year(v.fechaIngreso) AS anio,
-- DATE_FORMAT(v.fechaIngreso,' %M') AS mes,
-- v.fechaIngreso  AS mes,
-- v.numeroPrendas * v.precioXprenda   AS total,
SUM(v.numeroPrendas * v.precioXprenda) AS total
-- v.numeroPrendas AS canprendas

FROM ct_ventas v
GROUP BY MONTH(v.fechaIngreso)";

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
          ["Semana","Ventas"],

          <?php
            $i = 0;
            $n = mysqli_num_rows($r);
            while ($row = mysqli_fetch_assoc($r)) {
              // $ganancias = $row["canprendas"] . $row["precioprenda"] ;
              $gananciasPrueba = $row["total"];
              $anio = $row["anio"];
              $fecha = $row["mes"];
              $mes = date('m',$fecha);

              print "[

                '".$fecha." ".$anio."', ".$gananciasPrueba."

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
          colors:["green"],
          animation:{"startup": true, "duration":2000, easing:'linear'},
          hAxis: {title: 'Mes de Venta',  titleTextStyle: {color: '#FF0000'},slantedText: true,
          slantedTextAngle:20},
          vAxis: {title: 'Ganancias',  titleTextStyle: {color: '#FF0000'}},
          width:1065,
          height: 500,
          legend:{
            alignment:"end",
            position:"top",
            textStyle:{color:"blue",fontSize:20,bold:true,italic:true}
          },
          pointSize: 6,
          pointShape: 'diamond',
          pointsVisible: true
        };


        var chart = new google.visualization.AreaChart(document.getElementById('grafica'));
        chart.draw(data, options);
      }
    </script>
  </head>
</html>

<div class="modal fade" id="ModalGraficaVentas">
  <div class="modal-dialog modal-grande">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">GRAFICO GANANCIAS POR MES</h5>
      </div>
      <div class="modal-body">
        <div id="grafica" class=""></div>
      </div><!--termina el Cuerpo del Modal-->
    </div><!--termina el COntenido del Modal-->
  </div>
</div>



<div class="modal fade" id="EditarVentas">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR DATOS VENTA</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input type="hidden" name="mvts_id" id="mvts_id">
                  <input class="modal-efecto-17 has-content" name="mvts_nombreCliente" id="mvts_nombreCliente" type="text">
                    <label>Nombre Cliente</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" name="mvts_vendedor" id="mvts_vendedor" type="text">
                    <label>Nombre Vendedor</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" name="mvts_nprendas" id="mvts_nprendas" type="text">
                    <label>No. de Prendas</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" name="mvts_precio" id="mvts_precio" type="text">
                    <label>Precio por Prenda</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" name="mvts_Apago" id="mvts_Apago" type="text">
                    <label>Acuerdo de Pago</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" name="mvts_fingreso" id="mvts_fingreso" type="date">
                    <label>Fecha de Ingreso</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content w-100" name="mvts_fbaja" id="mvts_fbaja" type="date">
                    <label>Fecha de Baja</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>

        </div><!--termina el Container-Fluid-->
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button id="ActualizarVenta" type="submit" class="ActualizarVenta w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
