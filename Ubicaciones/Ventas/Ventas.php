<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}

  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<div class="container-fluid pl-75 pr-57">
  <div class="row clt_usr mt-5 mb-5">

    <div class="text-left alert alert-info w-65" role="alert" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Nota: </strong> En esta sección se podran registrar las nuevas ventas, editar en el icono <img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='iconoNota'> y eliminar registro en <img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='iconoNota'>.
    </div>


    <div class="col align-self-end">
      <a class="rotate-link vent consultar ancla" style="font-size: larger;" accion="aventas" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/venta.svg" class="icon rotate-icon" style="width:30px;">
        <span class="spanA">Nueva Venta</span>
      </a>

      <a class="rotate-link consultar ancla" data-toggle='modal' data-target='#ModalGraficaVentas'>
        <img src="/fitcoControl/Resources/iconos/grafica2.svg" class="icon rotate-icon" style="width:30px;">
        <span class="spanA">Grafica Ventas</span>
      </a>

      <!-- <a class="rotate-link consultar ancla">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="buscar" type="text" id="busquedaVenta" placeholder="Buscar"></span>
      </a> -->

      <a class="rotate-link buscador ancla" accion="busc" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="buscar" type="text" name="busqueda"  id="busqueda" placeholder="Buscar"></span>
      </a>
    </div>
  </div>
</div>

<!-- <div class="container-fluid mt-3" style="max-width:1300px"> -->
  <div class="container-fluid mt-3">
    <section id="mostrarVentas"></section>
  </div>



  <form id="NuevaVenta" class="agregarnuevo" style="display:none">
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
          <td class="col-md-12 input-effect p-0">
            <input  id="vts_vendedor" class="effect-17" type="text" required>
              <label>Nombre del Vendedor</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="vts_nprendas" class="effect-17" type="text" required>
              <label>Numero de Prendas</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-5 input-effect p-0">
            <input id="vts_precio" class="effect-17" type="text" required>
              <label>Precio por Prendas</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-2"></td>
          <td class="col-md-5 input-effect p-0">
            <input id="vts_Apago" class="effect-17" type="text" required>
              <label>Acuerdo de Pago</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="vts_fingreso" class="effect-17 has-content" type="date" required>
              <label>Fecha de Ingreso</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <!-- <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="vts_fbaja" class="effect-17 has-content" type="date">
              <label>Fecha de Baja</label>
              <span class="focus-border"></span>
          </td>
        </tr> -->
        <tr class="row justify-content-center mb-3">
          <td class="col-md-4">
            <button type="submit" id="NuevoRegistroVentas" class="btnsub btn boton btn-block ">AGREGAR</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>


<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/Ventas/Ventas.php';
  require $root . '/fitcoControl/Resources/PHP/Ventas/pieVentas.php';
?>
