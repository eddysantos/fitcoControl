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

 v.nombreVendedor AS vendedor,
 year(v.fechaIngreso) AS anio,
 month(v.fechaIngreso) AS mes,
 v.precioXprenda AS precioprenda,
 v.numeroPrendas AS canprendas

 FROM ct_ventas v
 GROUP BY anio";

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
           // ['2013',  1000,      400],
           // ['2014',  1170,      460],
           // ['2015',  660,       1120],
           // ['2016',  1030,      540]

           <?php
             $i = 0;
             $n = mysqli_num_rows($r);
             while ($row = mysqli_fetch_assoc($r)) {
               $ganancias = $row["canprendas"] . $row["precioprenda"];
               $anio = $row["anio"];
               $mes = $row["mes"];


               print "[

                 '".$anio." ".$mes."', ".$ganancias."

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
           hAxis: {title: 'AÑO',  titleTextStyle: {color: '#FF0000'},format: ''},
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
