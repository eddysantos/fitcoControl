<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<link rel="stylesheet" href="/fitcoControl/Resources/fullcalendar/fullcalendar.min.css">


<nav class="w-100 mb-3">
  <ul class="nav nav-pills nav-fill mt-3">
    <li class="nav-item">
      <a href="/fitcoControl/Ubicaciones/Programacion/Programacion.php" class="w-100 border-0 bt">pantalla principal</a>
    </li>
  </ul>
</nav>


<div class="contorno mt-4" id="calendarioProgram" style="margin-bottom: 100px!important">
  <div class="row">
    <div class="col"></div>
    <div class="col-9"><div id="CalendarioWeb"></div></div>
    <div class="col"></div>
  </div>
</div>



<?php
require $root . '/fitcoControl/Ubicaciones/Programacion/modales/modalCalendario.php';
  require $root . '/fitcoControl/Ubicaciones/Programacion/modales/agregarProgram.php';
  require $root . '/fitcoControl/Ubicaciones/Programacion/actions/footer.php';
?>
