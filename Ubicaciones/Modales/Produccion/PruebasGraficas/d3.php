 <?php
 $root = $_SERVER['DOCUMENT_ROOT'];
 require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";


    $queryMensual = "SELECT
    pr.fechaIntroduccion AS dia,
    pr.cantidadProduccion AS produccion,
    pr.metaProduccion AS meta

    FROM ct_program p LEFT JOIN ct_produccion pr ON pr.fk_programacion = p.pk_programacion

    GROUP BY dia ASC limit 30";


  $result = mysqli_query($conn, $queryMensual);

   $valuesArray[] = 'Produccion';
   $valuesArray2[] = 'Meta';
   $fechaDia[] = 'x';

   while ($row = $result->fetch_assoc()) {
     $fechaDia[] = $row['dia'];
     $valuesArray[] = $row['produccion'];
     $valuesArray2[] = $row['meta'];
   }
 ?>


<html>
 <head>
   <title>C3 Liner example</title>
   <link href="/fitcoControl/Resources/c3/c3.css" rel="stylesheet">

   <script src="https://d3js.org/d3.v5.min.js"></script>
   <script src="/fitcoControl/Resources/c3/c3.min.js"></script>
   <script src="/fitcoControl/Resources/jquery/jquery.min.js"></script>

 </head>

 <body>
   <!-- <select class="custom-select" id="filtro">
     <option value="1">Todos</option>
     <option value="2">Ultima Semana</option>
     <option value="3">Ultimo Mes</option>
     <option value="4">6 Meses atras</option>
   </select> -->
   <div id="chart" class="chart"></div>
   <script>
     var xAxisArr = <?php echo json_encode($fechaDia); ?>;
     var dataArr = <?php echo json_encode($valuesArray, JSON_NUMERIC_CHECK); ?>;
     var dataArr2 = <?php echo json_encode($valuesArray2, JSON_NUMERIC_CHECK); ?>;

     var chart = c3.generate({
       bindto: '#chart',
       data: {
         x: 'x',
         columns: [
           xAxisArr,
           dataArr,
           dataArr2
         ],
       },

       axis: {
         x: {
          type: 'category',
          // type: 'timeseries',
          tick: {
            format: '%d-%m-%Y'
          }
         }
       },
       subchart: {
         show: true,
       }
     });
   </script>

 <!-- <script type="text/javascript">
     $('#filtro').change(function() {
         if ($('#filtro').val() == 1){
           $(".chart").css("display","block");
         };

         if ($('#filtro').val() == 2){
           $(".chart").css("display","none");
         };
     });
 </script> -->


</body>
</html>
