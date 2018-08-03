<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>



<a href="#GraficaVentas" data-toggle="modal"><h1>Grafica de Ventas</h1></a><br>
<a href="#GraficaTesoreria" data-toggle="modal"><h1>Grafica de Tesoreria</h1></a>
<!-- <a href="#GraficaPRUEBA" data-toggle="modal"><h1>Grafica de PRUEBA</h1></a> -->





<link href="/fitcoControl/Resources/c3/c3.css" rel="stylesheet">
<script src="/fitcoControl/Resources/c3/d3.v5.min.js"></script>
<script src="/fitcoControl/Resources/c3/c3.min.js"></script>
<script src="js/estadisticas.js" charset="utf-8"></script>
<?php
  require('modales/GraficaVentas.php');
  require('modales/GraficaTesoreria.php');
  require('modales/graficaPrueba.php');
?>
