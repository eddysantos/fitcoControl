<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<?php if ($admin || $ve_ver == 1): ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/fitcoControl/Resources/fullcalendar/fullcalendar.min.css">
    <script src="/fitcoControl/Resources/fullcalendar/lib/moment.min.js"></script>
    <script src="/fitcoControl/Resources/fullcalendar/fullcalendar.min.js"></script>
    <script src="/fitcoControl/Resources//fullcalendar/locale/es.js"></script>
  </head>
  <body>

    <div class="container-fluid">
      <div class="row mt-5">
        <div class="col"></div>
        <div class="col-9"><div id="AgendaVentas"></div></div>
        <div class="col"></div>
      </div>
    </div>


    <?php
      require $root . '/fitcoControl/Ubicaciones/Ventas/modales/modalCalendario.php';
     ?>
  </body>

<?php else: ?>
  <div id='SinRegistros' class='container-fluid pantallaRegistros'>
    <div class='tituloSinRegistros' style="font-size:25px; color:red">SOLICITA PERMISO PARA ENTRAR EN ESTA SECCIÓN</div>
  </div>
<?php endif;?>

  <footer class="footerCalendar">
    <li class="nav-item">
      <a  class="bn noborder w-100" href="/fitcoControl/Resources/PHP/Login/CerrarSesion.php" >
      <div class="row justify-content-center m-0">
        <div class="col-md-3">
          Cerrar <img class="m-3" style="width:30px" src="/fitcoControl/Resources/iconos/001-close-1.svg"> Sesión</a>
        </div>
      </div>
    </li>

    <script src="/fitcoControl/Ubicaciones/Ventas/js/calendario.js"></script>
    <script src="/fitcoControl/Resources/js/Inputs.js"></script>
    <script src="/fitcoControl/Resources/js/MostrarDivsAgregar.js"></script>
    <script src="/fitcoControl/Resources/js/popup-list-plugin.js"></script>
    <script src="/fitcoControl/Resources/js/table-fetch-plugin.js"></script>
  </footer>
</html>
