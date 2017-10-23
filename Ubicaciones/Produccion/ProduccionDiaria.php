<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
  require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
?>

<div class="container">
  <div class="clt_usr mt-5 mb-5">
    <a class="ml-3 rotate-link  consultar ancla"  data-toggle='modal' data-target='#ModalGraficaPRO'>
      <img src="/fitcoControl/Resources/iconos/bars-chart.svg" class=" icon rotate-icon" style="width:30px">
      <span class="spanD">Detalle Producción</span>
    </a>
  </div>
    <form id="" class="page p-0" style="margin-top:130px">
      <table class="table table-hover table-fixed">
        <thead>
          <tr class="row m-0 encabezado">
            <td class="col-md-1"></td>
            <td class="col-md-3 text-center">
              <h3>PRODUCCIÓN</h3>
            </td>
            <td class="col-md-2 text-center">
              <h3>REQUERIDO</h3>
            </td>
            <td class="col-md-2 text-center">
              <h3>FABRICADO</h3>
            </td>
            <td class="col-md-2 text-center">
              <h3>FINALIZAR</h3>
            </td>
            <td class="col-md-2 text-center"></td>
          </tr>
        </thead>
        <tbody id="mostrarProduccion">
        </tbody>
      </table>
    </form>
  </div>



  <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . '/fitcoControl/Ubicaciones/Modales/Produccion/ModalGraficaProduccion.php';
    require $root . '/fitcoControl/Ubicaciones/Modales/Produccion/PestañaProduccion.php';
    require $root . '/fitcoControl/Resources/PHP/Produccion/pieProduccion.php';
  ?>
