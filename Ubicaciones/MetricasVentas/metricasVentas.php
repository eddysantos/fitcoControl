<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}

  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';

  $fecha_reg =  date("Y-m-d h:i:s");
?>



<div class="container-fluid pl-75 pr-57">
  <div class="row clt_usr mt-5 mb-5">
    <div class="col align-self-end">
      <a href="#agregarVendedor" data-toggle="modal" class="rotate-link consultar ancla" style="font-size: larger;text-decoration: none;">
        <img src="/fitcoControl/Resources/iconos/venta.svg" class="icon rotate-icon" style="width:30px;">
        <span class="spanB">Agregar Vendedor</span>
      </a>

      <!-- <a href="#ModalGraficaVentas" class="rotate-link consultar ancla graficaVentas" data-toggle='modal' style="text-decoration:none">
        <img src="/fitcoControl/Resources/iconos/grafica2.svg" class="icon rotate-icon" style="width:30px;">
        <span class="spanE">Grafica Metrica</span>
      </a> -->

      <!-- <a class="rotate-link buscador ancla"  accion="msearch" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="effect-17 real-time-search" type="text" name="search"  placeholder="Buscar..." table-body="#tabla_metrica" action="mostrar"></span>
      </a> -->


    </div>
  </div>
</div>

  <!--MOSTRAR TABLA  -->
  <form class="dt-page p-0" id="tablaMetrica" style="margin-bottom: 80px;">
    <div id="tabla_metrica" class="font12"></div>
  </form>


<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/MetricasVentas/actions/footer.php';
  require $root . '/fitcoControl/Ubicaciones/MetricasVentas/modales/modal.php';
  require $root . '/fitcoControl/Ubicaciones/MetricasVentas/modales/grafica.php';
?>
