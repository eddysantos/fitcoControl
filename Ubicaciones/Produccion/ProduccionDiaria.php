<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
  require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
?>

  <form id="" class="page p-0" style="margin-top:130px">
    <table class="table table-hover">
      <thead>
        <tr class="row m-0 encabezado">
          <td class="col-md-1"></td>
          <td class="col-md-3 text-center">
            <h3>PRODUCCIÓN</h3>
          </td>
          <td class="col-md-3 text-center">
            <h3>REQUERIDO</h3>
          </td>
          <td class="col-md-3 text-center">
            <h3>FINALIZAR</h3>
          </td>
          <td class="col-md-2 text-center"></td>
        </tr>
      </thead>
    </table>
  </form>

  <form id="produccion" class="page p-0" style="margin-top:180px">
    <table class="table table-hover table-fixed">
      <tbody id="mostrarProduccion">

      </tbody>
    </table>
  </form>

  <script src="/fitcoControl/Resources/js/Inputs.js"></script>
  <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . '/fitcoControl/Ubicaciones/Modales/Produccion/PestañaProduccion.php';
  ?>

  <script type="text/javascript" src="/fitcoControl/Resources/js/Produccion/programacionProduccion.js"></script>
