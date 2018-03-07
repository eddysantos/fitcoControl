<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);
$query = "SELECT
co.pk_cobranza AS idcobranza,
ct.nombreCliente AS nombre,
SUM(co.importeCobranza) AS totalcobranza,
WEEK(co.vencimientoCobranza) AS semana,
ct.colorCliente AS color,
SUM(pgo.importePago) AS pagado
FROM ct_cobranza co
LEFT JOIN ct_cliente ct ON co.fk_cliente = ct.pk_cliente
LEFT JOIN ct_pagos pgo ON  pgo.fk_cobranza = co.pk_cobranza
GROUP BY semana
";
$r = mysqli_query($conn, $query);
?>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(grafica);

  function grafica() {
    var data = google.visualization.arrayToDataTable([
      ["Semana","Facturado","Pagado","Pendiente"],

      <?php
        $i = 0;
        $n = mysqli_num_rows($r);
        while ($row = mysqli_fetch_assoc($r)) {
          $facturado = $row["totalcobranza"];
          $semana = $row["semana"];
          $pagado = $row["pagado"];
          $pendientepago = $row['totalcobranza']-$row['pagado'];
          $numerosem = "Sem.";

          print "[
            '".$numerosem." ".$semana."', ".$facturado.", ".$pagado.", ".$pendientepago."
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
      vAxis: {title: 'Facturado',  titleTextStyle: {color: '#FF0000'}},
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
