<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<div class="container">
  <div class="row align-items-center mb-5 mt-5">
    <div class="col-md-6">
      <div class="card">
        <img class="w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/programar.svg" alt="Card image cap">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Produccion/ProgramacionProduc.php" class="linkboton agregar-programacion btn-block">Agregar Programación Nueva<span class="a top"></span></a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/camisarojo.svg" alt="Card image cap">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Produccion/ProduccionDiaria.php" class="linkboton agregar-programacion btn-block">Introducir Producción Diaria<span class="top"></span></a>
        </div>
      </div>
    </div>
  </div>

  <div class="row align-items-center">
    <div class="col-md-6 offset-md-2">
      <div class="card">
        <img class="card-img-top w-35 align-self-center m-3" src="/fitcoControl/Resources/iconos/010-delivery.svg">
        <div class="card-body">
          <a href="" class="linkboton btn-block">Departamento de Envios<span class="top"></span></a>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <img class="w-35 align-self-center m-3" src="/fitcoControl/Resources/iconos/002-calendar.svg">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Corte/ProgramacionCorte.php" class="linkboton btn-block">Programación de Corte<span class="a top"></span></a>
        </div>
      </div>
    </div>
  </div>
</div>
