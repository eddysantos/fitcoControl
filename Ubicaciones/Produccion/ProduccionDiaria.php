<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<div class="container-fluid pr-57">
  <div class="clt_usr mt-5 mb-5">
    <a class="ml-3 rotate-link  consultar ancla"  data-toggle='modal' data-target='#ModalGraficaPRO'>
      <img src="/fitcoControl/Resources/iconos/grafica2.svg" class="icon rotate-icon" style="width:30px">
      <span>Grafica Producción</span>
    </a>

    <a class="ml-3 rotate-link consultar ancla" accion="busuario">
      <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
      <span class="spanB"><input class="buscar" type="text" name="busqueda"  id="busqueda" placeholder="Buscar"></span>
    </a>
  </div>

  <div class="container-fluid mt-3" style="max-width:1300px">
    <section id="mostrarProduccion"></section>
  </div>
</div>


  <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . '/fitcoControl/Ubicaciones/Modales/Produccion/ModalGraficaProduccion.php';
    require $root . '/fitcoControl/Ubicaciones/Modales/Produccion/Produccion.php';
    require $root . '/fitcoControl/Resources/PHP/Produccion/pieProduccion.php';
  ?>
