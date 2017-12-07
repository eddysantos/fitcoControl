<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<div class="container mt-100">
  <div class="row align-items-center mb-5 mt-5">
    <div class="col-md-4">
      <div class="card">
        <img class="w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/programar.svg">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Produccion/ProgramacionProduc.php" class="linkboton agregar-programacion btn-block">Departamento de Programación<span class="a top"></span></a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/camisarojo.svg">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Produccion/ProduccionDiaria.php" class="linkboton agregar-programacion btn-block">Departamento de Producción<span class="top"></span></a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card">
        <img class="card-img-top w-35 align-self-center m-5" src="/fitcoControl/Resources/iconos/010-delivery.svg">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Envios/Envios.php" class="linkboton btn-block">Departamento de Envios<span class="top"></span></a>
        </div>
      </div>
    </div>

<!--
  <div class="row align-items-center">

    <div class="col-md-6">
      <div class="card">
        <img class="w-35 align-self-center m-3" src="/fitcoControl/Resources/iconos/002-calendar.svg">
        <div class="card-body">
          <a href="/fitcoControl/Ubicaciones/Corte/ProgramacionCorte.php" class="linkboton btn-block">Departamento de Corte<span class="a top"></span></a>
        </div>
      </div>
    </div>
  </div> -->
</div>
