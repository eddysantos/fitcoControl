<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}

  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>


<?php if ($admin || $ve_ver == 1): ?>

<div class="container-fluid pl-75 pr-57">
  <div class="row clt_usr mt-5 mb-5">
    <div class="col align-self-end">
      <a href="#ModalAddVendedor" class="rotate-link consultar ancla" data-toggle='modal' style="text-decoration:none">
        <img src="/fitcoControl/Resources/iconos/add.svg" class="icon rotate-icon" style="width:30px;">
        <span class="spanE">Agregar Vendedor</span>
      </a>

      <a class="rotate-link vent consultar ancla" style="font-size: larger;" accion="aventas" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/venta.svg" class="icon rotate-icon" style="width:30px;">
        <span class="spanA">Nueva Venta</span>
      </a>

      <a href="#ModalGraficaVentas" class="rotate-link consultar ancla graficaVentas" data-toggle='modal' style="text-decoration:none">
        <img src="/fitcoControl/Resources/iconos/grafica2.svg" class="icon rotate-icon" style="width:30px;">
        <span class="spanE">Grafica Ventas</span>
      </a>

      <a class="rotate-link buscador ancla"  accion="msearch" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="effect-17 real-time-search" type="text" name="search"  placeholder="Buscar..." table-body="#tabla_Ventas" action="mostrar"></span>
      </a>
    </div>
  </div>
</div>

  <!--MOSTRAR TABLA  -->
  <form class="page p-0" id="tablaVentas">
    <table class="table table-hover fixed-table">
      <thead>
        <tr class='row m-0 encabezado text-center'>
          <td class="col-md-1"></td>
          <td class='col-md-3'><h3>Nuevo Cliente</h3></td>
          <td class='col-md-3'><h3>Vendedor</h3></td>
          <td class='col-md-2'><h3>Ingreso</h3></td>
          <td class='col-md-3'></td>
        </tr>
      </thead>
      <tbody id="tabla_Ventas" class="font12">
        <tr>
          <td colspan="9">No hay resultados</td>
        </tr>
      </tbody>
    </table>
  </form>


  <form id="NuevaVenta" class="agregarnuevo" style="display:none;margin-bottom:80px" >
    <table class="table">
      <tbody>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input type="text" id="vts_id" style="display:none">
            <input id="vts_nombreCliente" class="effect-17" type="text" required>
              <label>Nombre Cliente</label>
              <span class="focus-border"></span>
          </td>
        </tr>


        <tr class="row m20">
          <td class="col-md-6 input-effect p-0">
            <input id="vts_nprendas" class="effect-17 numeroClass" type="text" required>
              <label>Numero de Prendas **</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-1"></td>
          <td class="col-md-5 input-effect p-0">
            <input id="vts_precio" class="effect-17 importeClass" type="text" required>
              <label>Precio por Prendas **</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-6 input-effect p-0">
            <input id="vts_fingreso" class="effect-17 has-content" type="date" required>
              <label>Fecha de Ingreso **</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-1"></td>
          <td class="col-md-5 input-effect p-0">
            <input id="vts_Apago" class="effect-17" type="text" required>
              <label>Acuerdo de Pago **</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input class="modal-efecto-17 importeClass" id="vts_costoPrenda" type="text">
              <label for="vts_costoPrenda" class="font12">Costo de Prenda (incluye tela,avíos y costo producción) **</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input class="modal-efecto-17 importeClass" id="vts_ingresoBanco" type="text">
              <label for="vts_ingresoBanco">Ingreso en bancos (real por venta)</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input class="effect-17 popup-input" id="vts_vendedor" type="text" id-display="#popup-display-listaVendedor" action="listaVendedor" db-id="" autocomplete="off">
            <div class="popup-list" id="popup-display-listaVendedor" style="display:none"></div>
            <label for="vts_vendedor">Nombre Vendedor **</label>
          </td>
        </tr>
        <tr class="row justify-content-center mb-3">
          <td class="col-md-4">
            <button type="submit" id="agregar" class="btnsub btn boton btn-block ">AGREGAR</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>


<?php else: ?>
  <div id='SinRegistros' class='container-fluid pantallaRegistros'>
    <div class='tituloSinRegistros' style="font-size:25px; color:red">SOLICITA PERMISO PARA ENTRAR EN ESTA SECCIÓN</div>
  </div>
<?php endif;?>



<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Ventas1/actions/pieVentas.php';
  require $root . '/fitcoControl/Ubicaciones/Ventas1/modales/Ventas.php';
?>
