
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
