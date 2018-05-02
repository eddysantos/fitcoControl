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
        <img class="w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/001-cobranza.svg">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Cobranza/cobranza.php" class="linkboton btn-block">Departamento de Cobranza
            <span class="a top"></span>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/002-cuentasxpagar.svg">
        <div class="card-body">
          <a href="#" class="bloqueo linkboton btn-block">Departamento Cuentas x pagar
            <span class="top"></span>
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/006-materiales.svg">
        <div class="card-body">
          <a href="#" accion="produccionLink" status="cerrado" class="consultar linkboton btn-block">Materiales y Records <img style="width:20px" src="/fitcoControl/Resources/iconos/arrowdown.svg">
            <span class="top"></span>
          </a>
        </div>
      </div>

      <div id="dropProduccion" style="display:none" class="mt-3 text-left">
        <a href="/fitcoControl/Ubicaciones/Materiales/Materiales.php" class="linkboton  btn-block">
          <img style="width:30px" src="/fitcoControl/Resources/iconos/006-materiales.svg"> Materiales
          <span class="a top"></span>
        </a>

        <a href="/fitcoControl/Ubicaciones/Nomina/nomina.php" class="linkboton  btn-block">
          <img style="width:30px" src="/fitcoControl/Resources/iconos/money.svg"> Nomina
          <span class="top"></span>
        </a>
      </div>
    </div>
  </div>
</div>


<footer class="footer">
  <li class="nav-item"><a  class="noborder w-100" href="/fitcoControl/Resources/PHP/Login/CerrarSesion.php" >
    <div class="row justify-content-center">
      <div class="col-md-3">
        Cerrar <img class="m-3" style="width:30px" src="/fitcoControl/Resources/iconos/001-close-1.svg"> Sesión</a>
      </div>
    </div>
  </li>
  <script type="text/javascript" src="/fitcoControl/Resources/js/MostrarDivsAgregar.js"></script>
</footer>
