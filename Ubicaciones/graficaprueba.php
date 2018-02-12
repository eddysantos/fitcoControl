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
<style media="screen">

  div{
    height: 500px;
  }
</style>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(grafica);

      function grafica() {
        var data = google.visualization.arrayToDataTable([
          ["Semana","Ganancias"],

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
          title: 'Ventas',
          areaOpacity: 0,
          animation: {"startup": true, "duration":2000, easing:'linear'},
          hAxis: {title: 'Vendedor',  titleTextStyle: {color: '#FF0000'}, format:'decimal'},
          vAxis: {title: 'Ganancias x Mes',  titleTextStyle: {color: '#FF0000'}, format: 'currency'},

        };

        var chart = new google.visualization.AreaChart(document.getElementById('grafica'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="grafica"></div>
  </body>
</html>
