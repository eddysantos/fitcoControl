<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>


<?php if ($admin || $pro_corVer == 1): ?>
<div class="container-fluid pl-75 pr-57">


  <div class="row clt_usr mt-5 mb-5">
    <div class="col align-self-end">
      <a class="rotate-link buscador ancla"  accion="msearch" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="effect-17 real-time-search" type="text" name="search"  placeholder="Buscar..." table-body="#mostrarCorte" action="mostrar"></span>
      </a>
    </div>
  </div>

  <form id='ECorte' class='page p-0' onsubmit="return false">
    <table class='table table-hover fixed-table'>
      <thead>
        <tr class='row m-0 encabezado'>
          <td class='col-md-1'></td>
          <td class='col-md-3 text-center'><h3>CORTE</h3></td>
          <td class='col-md-2 text-center'><h3>REQUERIDO</h3></td>
          <td class='col-md-2 text-center'><h3>FABRICADO</h3></td>
          <td class='col-md-2 text-center'><h3>FINALIZAR</h3></td>
          <td class='col-md-2'></td>
        </tr>
      </thead>
      <tbody id="mostrarCorte">
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
<?php endif;

require $root . '/fitcoControl/Ubicaciones/Corte/actions/footer.php';
require $root . '/fitcoControl/Ubicaciones/Corte/modales/corteDiario.php';

?>
