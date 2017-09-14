<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<div class="container-fluid" style="display: -webkit-box; height: 100%">
  <div class="row align-items-center w-100">
    <div class="col">
      <div class="card">
        <img class=" w-50 align-self-center m-5" src="/fitcoControl/Resources/iconos/programar.svg" alt="Card image cap">
        <div class="card-body">
          <!-- <a href="/fitcoControl/Ubicaciones/Produccion/ProgramacionProduc.php" class="btn btn-outline-info w-100" style="font-size: 2em">Agregar Programación Nueva</a> -->
          <a href="/fitcoControl/Ubicaciones/Produccion/ProgramacionProduc.php" class="linkboton agregar-programacion btn-block">Agregar Programación Nueva<span class="a top"></span></a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <img class="card-img-top w-50 align-self-center m-5" src="/fitcoControl/Resources/iconos/camisacirculo.svg" alt="Card image cap">
        <div class="card-body">
          <!-- <a href="/fitcoControl/Ubicaciones/Produccion/ProduccionDiaria.php" class="btn btn-outline-success w-100" style="font-size: 2em">Introducir Producción</a> -->
          <a href="/fitcoControl/Ubicaciones/Produccion/ProduccionDiaria.php" class="linkboton agregar-programacion btn-block">Introducir Producción<span class="top"></span></a>
        </div>
      </div>
    </div>
  </div>
