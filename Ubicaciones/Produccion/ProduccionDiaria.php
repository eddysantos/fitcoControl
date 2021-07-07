<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>


<?php if ($admin || $pro_pdver == 1): ?>
<div class="container-fluid pl-75 pr-57">
  <div class="row clt_usr mt-5 mb-5">
    <!-- <div class="text-left alert alert-info w-75" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Nota: </strong> La función de esta sección es llevar un control de lo fabricado real diario, en el icono <img src='/fitcoControl/Resources/iconos/003-add.svg' class='iconoNota'> se podra agregar la produccion real diaria.
      En el icono <img src='/fitcoControl/Resources/iconos/magnifier.svg' class='iconoNota'> se podra visualizar el desglose de lo fabricado real por cada programación.
    </div> -->

    <div class="col align-self-end">

      <a href="#graficaproduc" class="ml-3 rotate-link consultar ancla"  data-toggle='modal' style="text-decoration: none;">
        <img src="/fitcoControl/Resources/iconos/grafica2.svg" class="icon rotate-icon" style="width:30px">
        <span>Grafica Producción</span>
      </a>

      <a class="rotate-link consultar ancla"  accion="busuario">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="effect-17 real-time-search" type="text" name="search"  placeholder="Buscar..." table-body="#mostrarProduccion" action="mostrar"></span>
      </a>
    </div>
  </div>

  <form class="page p-0" id="tablaVentas">
    <table class="table table-hover fixed-table">
      <thead>
        <tr class='row m-0 encabezado text-center'>
          <td class='col-md-1'></td>
          <td class='col-md-3 text-center'><h3>PRODUCCIÓN</h3></td>
          <td class='col-md-2 text-center'><h3>REQUERIDO</h3></td>
          <td class='col-md-2 text-center'><h3>FABRICADO</h3></td>
          <td class='col-md-2 text-center'><h3>FINALIZAR</h3></td>
          <td class='col-md-2'></td>
        </tr>
      </thead>
      <tbody id="mostrarProduccion" class="font12">
        <tr>
          <td colspan="9">No hay resultados</td>
        </tr>
      </tbody>
    </table>
  </form>
</div>


<?php else: ?>
  <div id='SinRegistros' class='container-fluid pantallaRegistros'>
    <div class='tituloSinRegistros' style="font-size:25px; color:red">SOLICITA PERMISO PARA ENTRAR EN ESTA SECCIÓN</div>
  </div>
<?php endif;?>


  <?php
    require $root . '/fitcoControl/Ubicaciones/Produccion/actions/pieProduccion.php';
    require $root . '/fitcoControl/Ubicaciones/Produccion/modales/grafica.php';
    require $root . '/fitcoControl/Ubicaciones/Produccion/modales/Produccion.php';
  ?>
