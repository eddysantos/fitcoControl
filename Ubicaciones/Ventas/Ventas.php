<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}

  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<div class="container">
  <div class="clt_usr  mt-5 mb-5">
    <a class="rotate-link vent consultar ancla" style="font-size: larger;" accion="aventas" status="cerrado">
      <img src="/fitcoControl/Resources/iconos/venta.svg" class="icon1 rotate-icon" style="width:30px;">
      <span class="spanV">Nueva Venta</span>
    </a>


    <a class="rotate-link ventGraf consultar ancla" data-toggle='modal' data-target='#ModalGraficaVentas'>
      <img src="/fitcoControl/Resources/iconos/grafica2.svg" class="icon1 rotate-icon" style="width:30px;">
      <span class="spanVG">Grafica Ventas</span>
    </a>

    <form id="Eventas" class="page p-0">
      <table class="table table-hover">
        <thead>
          <tr class="row m-0 encabezado">
            <td class="col-md-1"></td>
            <td class="col-md-3 text-center">
              <h3>NUEVO CLIENTE</h3>
            </td>
            <td class="col-md-3 text-center">
              <h3>VENDEDOR</h3>
            </td>
            <td class="col-md-2 text-center">
              <h3>INGRESO</h3>
            </td>
            <td class="col-md-3"></td>
          </tr>
        </thead>
        <tbody id="mostrarVentas">
        </tbody>
      </table>
    </form>

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
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input id="vts_fbaja" class="effect-17 has-content" type="date" required>
                <label>Fecha de Baja</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row justify-content-center mb-3">
            <td class="col-md-4">
              <button type="submit" id="NuevoRegistroVentas" class="btnsub btn boton btn-block ">AGREGAR</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>

<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/Ventas/Ventas.php';
  require $root . '/fitcoControl/Resources/PHP/Ventas/pieVentas.php';
?>
