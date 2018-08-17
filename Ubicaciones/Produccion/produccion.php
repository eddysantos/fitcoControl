<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';

?>


<?php if ($admin || $pro_pgVer == 1  || $pro_miVer == 1 || $pro_pdver == 1 || $pro_corVer == 1 || $pro_liVer == 1 || $en_ver == 1): ?>

<div class="container mt-100">
  <div class="row  mb-20 mt-5">
  <?php if ($pro_pgVer == 1 || $admin): ?>
    <div class="col-md-4">
      <div class="card">
        <img class="w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/programar.svg">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Produccion/calendarioProgram.php" class="linkboton btn-block">Departamento de Programación<span class="a top"></span></a>
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="col-md-4">
      <div class="card" style="background-color:rgba(190, 190, 190, 0.28);">
        <img class="w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/programar.svg">
        <div class="card-body">
          <a href="#" class="bn bloqueo linkboton btn-block">Departamento de Programación<span class="a top"></span></a>
        </div>
      </div>
    </div>
  <?php endif; ?>


  <?php if ($pro_pdver == 1 || $pro_corVer == 1 || $pro_liVer == 1 || $admin): ?>
    <div class="col-md-4">
      <div class="card">
        <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/camisarojo.svg">
        <div class="card-body">
          <a href="#" accion="produccionLink" status="cerrado" class="consultar linkboton btn-block">Departamento de Producción <img style="width:20px" src="/fitcoControl/Resources/iconos/arrowdown.svg">
            <span class="top"></span>
          </a>
        </div>
      </div>

      <div id="dropProduccion" style="display:none" class="mt-3 text-left">
        <?php if ($pro_pdver == 1 || $admin): ?>
          <a href="/fitcoControl/Ubicaciones/Produccion/ProduccionDiaria.php" class="linkboton btn-block">
            <img style="width:30px" src="/fitcoControl/Resources/iconos/clothes.svg"> Produccion Diaria
            <span class="a top"></span>
          </a>
        <?php else: ?>
          <a href="#" class="bn bloqueo linkboton btn-block">
            <img style="width:30px" src="/fitcoControl/Resources/iconos/clothes.svg"> Produccion Diaria
            <span class="a top"></span>
          </a>
        <?php endif; ?>


        <?php if ($pro_corVer == 1 || $admin): ?>
          <a href="/fitcoControl/Ubicaciones/Corte/seccionCorte.php" class="linkboton  btn-block">
            <img style="width:30px" src="/fitcoControl/Resources/iconos/002-calendar.svg"> Sección de Corte
            <span class="top"></span>
          </a>
        <?php else: ?>
          <a href="#" class="bn bloqueo linkboton btn-block">
            <img style="width:30px" src="/fitcoControl/Resources/iconos/002-calendar.svg"> Sección de Corte
            <span class="top"></span>
          </a>
        <?php endif; ?>


        <?php if ($pro_liVer == 1 || $admin): ?>
          <a href="/fitcoControl/Ubicaciones/Lineas/pantalla.php" class="linkboton  btn-block">
            <img style="width:30px" src="/fitcoControl/Resources/iconos/clothes.svg"> Lineas
            <span class="top"></span>
          </a>
        <?php else: ?>
          <a href="#" class="bn bloqueo linkboton btn-block">
            <img style="width:30px" src="/fitcoControl/Resources/iconos/clothes.svg"> Sección de Corte
            <span class="top"></span>
          </a>
        <?php endif; ?>
      </div>
    </div>

    <?php else: ?>
      <div class="col-md-4" style="background-color:rgba(190, 190, 190, 0.28);">
        <div class="card">
          <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/camisarojo.svg">
          <div class="card-body">
            <a href="#" class="bn bloqueo linkboton btn-block">Departamento de Producción <img style="width:20px" src="/fitcoControl/Resources/iconos/arrowdown.svg">
              <span class="top"></span>
            </a>
          </div>
        </div>
      </div>
    <?php endif; ?>


  <?php if ($en_ver == 1 || $admin): ?>
    <div class="col-md-4">
      <div class="card">
        <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/010-delivery.svg">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Envios/Envios.php" class="linkboton btn-block">Departamento de Envios<span class="a top"></span></a>
        </div>
      </div>
    </div>
    <?php else: ?>
      <div class="col-md-4">
        <div class="card" style="background-color:rgba(190, 190, 190, 0.28);">
          <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/010-delivery.svg">
          <div class="card-body">
            <a href="#" class="bn bloqueo linkboton btn-block">Departamento de Envios<span class="a top"></span></a>
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
