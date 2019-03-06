<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>



<?php if ($admin || $ve_ver == 1): ?>
<div class="container mt-100">
  <div class="row  mb-20 mt-5">
    <div class="col-md-2"></div>
    <?php if ($admin || $ve_ver == 1): ?>
    <div class="col-md-4">
      <div class="card">
        <img class="w-50 align-self-center m-5" src="/fitcoControl/Resources/iconos/agenda.svg">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Ventas/AgendaVentas.php" class="linkboton btn-block p-1">Agenda Ventas
            <span class="top"></span>
          </a>
        </div>
      </div>
    </div>
    <?php else: ?>
      <div class="col-md-4">
        <div class="card" style="background-color:rgba(190, 190, 190, 0.28);">
          <img class="w-50 align-self-center m-5" src="/fitcoControl/Resources/iconos/agenda.svg">
          <div class="card-body">
            <a href="#" class="bn bloqueo linkboton btn-block p-1">Agenda Ventas
              <span class="top"></span>
            </a>
          </div>
        </div>
      </div>
      <?php endif; ?>



    <?php if ($admin || $ve_ver == 1): ?>
    <div class="col-md-4">
      <div class="card">
        <img class="card-img-top w-50 align-self-center m-5" src="/fitcoControl/Resources/iconos/grafica2.svg">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Ventas/Ventas.php" class="linkboton btn-block p-1">Metricas Ventas
            <span class="a top"></span>
          </a>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="col-md-4">
      <div class="card" style="background-color:rgba(190, 190, 190, 0.28);">
        <img class="w-50 align-self-center m-5" src="/fitcoControl/Resources/iconos/grafica2.svg">
        <div class="card-body">
          <a href="#" class="bn bloqueo linkboton btn-block p-1">Metricas Ventas
            <span class="a top"></span>
          </a>
        </div>
      </div>
    </div>
    <?php endif; ?>

  </div>
</div>

<?php else: ?>
  <div id='SinRegistros' class='container-fluid pantallaRegistros'>
    <div class='tituloSinRegistros' style="font-size:25px; color:red">SOLICITA PERMISO PARA ENTRAR EN ESTA SECCIÓN</div>
  </div>
<?php endif;?>



<footer class="footer">
  <li class="nav-item"><a  class="bn noborder w-100" href="/fitcoControl/Resources/PHP/Login/CerrarSesion.php" >
    <div class="row justify-content-center">
      <div class="col-md-3">
        Cerrar <img class="m-3" style="width:30px" src="/fitcoControl/Resources/iconos/001-close-1.svg"> Sesión</a>
      </div>
    </div>
  </li>
  <script type="text/javascript" src="/fitcoControl/Resources/js/MostrarDivsAgregar.js"></script>
</footer>
