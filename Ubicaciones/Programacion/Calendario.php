<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<link rel="stylesheet" href="/fitcoControl/Resources/fullcalendar/fullcalendar.min.css">

<div class="row m-3 clt_usr">
  <div class="col-md-10"></div>
  <div class="col-md-2">
    <a href="/fitcoControl/Ubicaciones/Programacion/Programacion.php" class="rotate-link mod ancla" style="font-size:larger;text-decoration:none;">
      <img src="/fitcoControl/Resources/iconos/003-analytics-2.svg" class="icon1 rotate-icon" style="width:30px;">
      <span class="spanA">Reporte</span>
    </a>
  </div>
</div>


<div class="contorno mt-4" id="calendarioProgram" style="margin-bottom: 100px!important">
  <div class="row">
    <div class="col"></div>
    <div class="col-9"><div id="CalendarioWeb"></div></div>
    <div class="col"></div>
  </div>
</div>



<?php
require $root . '/fitcoControl/Ubicaciones/Programacion/modales/modalCalendario.php';
require $root . '/fitcoControl/Ubicaciones/Programacion/modales/modalReporte.php';
require $root . '/fitcoControl/Ubicaciones/Programacion/actions/footer.php';
?>
