<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';

if ($admin || $pro_miVer == 1):
?>


<div class="container-fluid pl-75 pr-57">
  <div class="row clt_usr  mt-5 mb-5">
    <div class="col align-self-end">
      <a href="/fitcoControl/Ubicaciones/OrdenCompra/reporte.php"
       class="consultar rotate-link ancla" style="text-decoration:none;">
        <img  src="/fitcoControl/Resources/iconos/money.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanA">Repo. Pagado</span>
      </a>

      <a id="correo" href="#"
       class="consultar rotate-link ancla" style="text-decoration:none;">
        <img  src="/fitcoControl/Resources/iconos/mail.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanA">Enviar Correo</span>
      </a>

      <a class="rotate-link buscador ancla">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="effect-17 real-time-search" type="text" name="search"  placeholder="Buscar..." table-body="#tabla_OrdenCompra" action="mostrar"></span>
      </a>

<!--
      <button type='button' class='btn btn-secondary' data-toggle='tooltip' data-placement='top' title='Tooltip on top'>
        Tooltip on top
      </button> -->
    </div>
  </div>
</div>


<!--MOSTRAR TABLA  -->
<form class="page p-0" id="tablaOrdenCompra" onsubmit="return false">
  <table class="table table-hover fixed-table">
    <thead>
      <tr class='row m-0 encabezado text-center'>
        <td class='col-md-3'><p>Item</p></td>
        <td class='col-md-4'><p>Descripción</p></td>
        <td class='col-md-2'><p>Requerido</p></td>
        <td class='col-md-1'><p>Cantidad</p></td>
        <td class='col-md-2'></td>
      </tr>
    </thead>
    <tbody id="tabla_OrdenCompra" class="font12">
      <tr>
        <td colspan="9">No hay resultados</td>
      </tr>
    </tbody>
  </table>
</form>

<?php else:?>
  <div id='SinRegistros' class='container-fluid pantallaRegistros'>
    <div class='tituloSinRegistros' style="font-size:25px; color:red">SOLICITA PERMISO PARA ENTRAR EN ESTA SECCIÓN</div>
  </div>
<?php endif; ?>






<?php
  require $root . '/fitcoControl/Ubicaciones/OrdenCompra/modales/ordenCompra.php';
  require $root . '/fitcoControl/Ubicaciones/OrdenCompra/actions/footer.php';
?>
