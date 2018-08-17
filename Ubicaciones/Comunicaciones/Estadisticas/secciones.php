<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>



<?php if ($admin || $e_ventas == 1): ?>
<a href="#GraficaVentas" data-toggle="modal"><h1>Grafica de Ventas</h1></a><br>
<?php else: ?>
  <a href="#" class="bn bloqueo "><h1>Grafica de Ventas</h1></a><br>
<?php endif;?>

<?php if ($admin || $e_tesoreria == 1): ?>
<a href="#GraficaTesoreria" data-toggle="modal"><h1>Grafica de Tesoreria</h1></a>
<?php else: ?>
  <a href="#" class="bn bloqueo "><h1>Grafica de Tesoreria</h1></a>
<?php endif;?>




<?php if ($admin || $e_produc == 1): ?>
<a href="#GraficaPRUEBA" data-toggle="modal"><h1>Grafica de Produccion</h1></a>
<?php else: ?>
  <a href="#" class="bn bloqueo "><h1>Grafica de Produccion</h1></a>
<?php endif;?>




<link href="/fitcoControl/Resources/c3/c3.css" rel="stylesheet">
<script src="/fitcoControl/Resources/c3/d3.v5.min.js"></script>
<script src="/fitcoControl/Resources/c3/c3.min.js"></script>
<script src="js/estadisticas.js" charset="utf-8"></script>
<?php
  require('modales/GraficaVentas.php');
  require('modales/GraficaTesoreria.php');
  require('modales/graficaPrueba.php');
?>
