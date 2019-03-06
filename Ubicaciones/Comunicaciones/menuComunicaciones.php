<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>


<?php if ($admin || $e_ventas == 1 || $e_tesoreria == 1 || $e_produc == 1 || $e_rhVer == 1 || $e_usVer == 1): ?>

<div class="container mt-100">
  <div class="row  mb-5 mt-5" style="margin-bottom:100px!important">

    <!-- NUVO DISEÑO -->
      <?php if ($admin || $e_ventas == 1 || $e_tesoreria == 1 || $e_produc == 1): ?>
      <div class="col-md-4">
        <div class="card">
          <img class="w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/003-graphic.svg">
          <div class="card-body">
            <a id="estaLink" href="#" class="consultar linkboton btn-block pl-0 pr-0" accion="estaLink" status="cerrado">Estadisticas
              <img style="width:20px" src="/fitcoControl/Resources/iconos/arrowdown.svg">
              <span class="a top"></span></a>
          </div>
        </div>

      <div id="dropEst" class="mt-3 text-left" style="display:none">
        <?php if ($e_tesoreria == 1 || $admin): ?>
          <a href="/fitcoControl/Ubicaciones/Comunicaciones/Estadisticas/Grafica-Cobranza.php" class="linkboton btn-block p-2"> Tesoreria
            <span class="a top"></span>
          </a>
        <?php else: ?>
          <a href="#" class="bn bloqueo linkboton btn-block p-2">Tesoreria
            <span class="a top"></span>
          </a>
        <?php endif; ?>

        <?php if ($e_produc == 1 || $admin): ?>
          <a href="/fitcoControl/Ubicaciones/Comunicaciones/Estadisticas/Grafica-Produccion.php" class="linkboton btn-block p-2"> Producción
            <span class="top"></span>
          </a>
        <?php else: ?>
          <a href="#" class="bn bloqueo linkboton btn-block p-2">Producción
            <span class="top"></span>
          </a>
        <?php endif; ?>

          <?php if ($e_ventas == 1 || $admin): ?>
          <a href="/fitcoControl/Ubicaciones/Comunicaciones/Estadisticas/Grafica-Ventas.php" class="linkboton btn-block p-2"> Ventas
            <span class="a top"></span>
          </a>
        <?php else: ?>
          <a href="#" class="bn bloqueo linkboton btn-block p-2">Ventas
            <span class="a top"></span>
          </a>
        <?php endif; ?>



<!-- SOLO PARA MARIELA -->
        <?php if ($dejecutivo == 1 || $admonGlobal == 1): ?>
          <a href="/fitcoControl/Ubicaciones/Comunicaciones/Estadisticas/Grafica-ClientesNuevos.php" class="linkboton btn-block p-2"> Clientes Nuevos
            <span class="top"></span>
          </a>
        <?php else: ?>
          <a href="#" class="bn bloqueo linkboton btn-block p-2">Clientes Nuevos
            <span class="top"></span>
          </a>
        <?php endif; ?>


      <?php if ($dejecutivo == 1 || $admonGlobal == 1): ?>
        <a href="/fitcoControl/Ubicaciones/Comunicaciones/Estadisticas/Grafica-Utilidad.php" class="linkboton btn-block p-2"> Utilidad
          <span class="a top"></span>
        </a>
      <?php else: ?>
        <a href="#" class="bn bloqueo linkboton btn-block p-2">Utilidad
          <span class="a top"></span>
        </a>
      <?php endif; ?>

      </div>
    </div>

  <?php else: ?>
    <div class="col-md-4">
      <div class="card" style="background-color:rgba(190, 190, 190, 0.28);">
        <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/003-graphic.svg">
        <div class="card-body">
          <a href="#" class="bn bloqueo linkboton btn-block pl-0 pr-0">Estadisticas <img style="width:20px" src="/fitcoControl/Resources/iconos/arrowdown.svg">
            <span class="a top"></span>
          </a>
        </div>
      </div>
    </div>
  <?php endif; ?>


    <!-- ///NUEVO DISEÑO  -->


    <?php if ($admin || $e_rhVer == 1): ?>
      <!-- <div class="col-md-4">
        <div class="card">
          <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/001-reunion.svg">
          <div class="card-body">
            <a href="/fitcoControl/Ubicaciones/Comunicaciones/RecursosHumanos/Rh.php" class="linkboton btn-block">Recursos Humanos<span class="top"></span></a>
          </div>
        </div>
      </div> -->
      <div class="col-md-4">
        <div class="card" style="background-color:rgba(190, 190, 190, 0.28);">
          <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/001-reunion.svg">
          <div class="card-body">
            <a href="#" class="bn bloqueo linkboton btn-block">Recursos Humanos<span class="top"></span></a>
          </div>
        </div>
      </div>
    <?php else: ?>
      <div class="col-md-4">
        <div class="card" style="background-color:rgba(190, 190, 190, 0.28);">
          <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/001-reunion.svg">
          <div class="card-body">
            <a href="#" class="bn bloqueo linkboton btn-block">Recursos Humanos<span class="top"></span></a>
          </div>
        </div>
      </div>
    <?php endif; ?>


    <?php if ($admin || $e_usVer == 1): ?>
    <div class="col-md-4">
      <div class="card">
        <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/usuario.svg">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Usuarios/Usuarios1.php" class="linkboton btn-block">Usuarios<span class="a top"></span></a>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="col-md-4">
      <div class="card" style="background-color:rgba(190, 190, 190, 0.28);">
        <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/usuario.svg">
        <div class="card-body">
          <a href="#" class="bn bloqueo linkboton btn-block">Usuarios<span class="a top"></span></a>
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
  <li class="nav-item"><a  class="bn noborder w-100" href="/fitcoControl/Resources/PHP/Login/CerrarSesion.php">
    <div class="row justify-content-center">
      <div class="col-md-3">
        Cerrar <img class="m-3" style="width:30px" src="/fitcoControl/Resources/iconos/001-close-1.svg"> Sesión</a>
      </div>
    </div>
  </li>

  <script src="/fitcoControl/Ubicaciones/Comunicaciones/js/Comunicaciones.js"></script>
  <!-- <script src="/fitcoControl/Resources/js/MostrarDivsAgregar.js"></script> -->

</footer>
