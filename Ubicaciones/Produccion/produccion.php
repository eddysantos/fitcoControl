<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<div class="container mt-100">
  <div class="row  mb-20 mt-5">
    <div class="col-md-4">
      <div class="card">
        <img class="w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/programar.svg">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Produccion/ProgramacionProduc.php" class="linkboton btn-block">Departamento de Programación<span class="a top"></span></a>
        </div>
      </div>
    </div>

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
        <a href="/fitcoControl/Ubicaciones/Produccion/ProduccionDiaria.php" class="linkboton  btn-block">
          <img style="width:30px" src="/fitcoControl/Resources/iconos/clothes.svg"> Produccion Diaria
          <span class="a top"></span>
        </a>

        <a href="/fitcoControl/Ubicaciones/Corte/ProgramacionCorte.php" class="linkboton  btn-block">
          <img style="width:30px" src="/fitcoControl/Resources/iconos/002-calendar.svg"> Sección de Corte
          <span class="top"></span>
        </a>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/010-delivery.svg">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Envios/Envios.php" class="linkboton btn-block">Departamento de Envios<span class="a top"></span></a>
        </div>
      </div>
    </div>
  </div>
</div>


<footer class="footer">
  <li class="nav-item"><a  class="noborder w-100" href="/fitcoControl/Resources/PHP/Login/CerrarSesion.php" >
    Cerrar
    <img class="m-3" style="width:30px" src="/fitcoControl/Resources/iconos/001-close-1.svg"> Sesión</a>
  </li>
  <script type="text/javascript" src="/fitcoControl/Resources/js/MostrarDivsAgregar.js"></script>
</footer>
