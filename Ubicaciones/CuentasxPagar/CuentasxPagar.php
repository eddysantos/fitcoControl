<?php
  session_start();

  if (!isset($_SESSION['user'])) {
    header("Location: /fitcoControl/index.php");
  }
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>


<div class="container-fluid pl-75 pr-57">
  <div class="row clt_usr mt-4">
    <!-- <div class="text-left alert alert-info w-75" role="alert" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Nota: </strong> La función de esta sección es llevar el registro de los datos de nuestros clientes para mayor accesibilidad, en el icono <img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='iconoNota'> se podra editar la información del cliente en caso de que asi se requiera.
      En el icono <img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='iconoNota'> se eliminaría la información del cliente de manera permanente.
    </div> -->
    <div class="col align-self-end">
      <a id="addcliente" class="rotate-link consultar ancla" accion="acuentas" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/004-pago.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanM">Agregar</span>
      </a>

      <a href="/fitcoControl/Ubicaciones/CuentasxPagar/VencidoCtasxPagar.php" class="consultar rotate-link ancla" style="text-decoration:none;">
        <img  src="/fitcoControl/Resources/iconos/money.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanM">Vencido</span>
      </a>

      <a class="rotate-link buscador ancla" accion="busc" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="buscar" type="text" name="busqueda"  id="busqueda" placeholder="Buscar"></span>
      </a>
    </div>
  </div>
</div>

  <div class="container-fluid mt-4">
    <section id="mostrarCuentas"></section>
  </div>

  <form  id="NuevaCuenta" class="agregarnuevo" onsubmit="return false" style="display:none;margin-bottom:80px">
    <table class="table">
      <tbody id="AgregarCliente">
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input type="hidden" id="cxp_id">
            <input id="cxp_proveedor" class="effect-17" type="text" required>
              <label>Proveedor</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="cxp_desc" class="effect-17" type="text" required>
              <label>Descripción de Servicio</label>
              <span class="focus-border"></span>
          </td>
        </tr>

        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="cxp_factura" class="effect-17 w-100" type="text" required>
              <label>Factura</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="cxp_total" class="effect-17 w-100" type="text" required>
              <label>Monto a Pagar</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="cxp_vencimiento" class="effect-17 has-content w-100" type="date" required>
              <label>Fecha Vencimiento</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="cxp_pagado" class="effect-17 w-100" type="text" required>
              <label>Pagado</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row justify-content-center">
          <td class="col-md-4">
            <button type="submit" id="NuevoRegistro" class="btnsub btn boton btn-block">AGREGAR</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>



<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/CuentasxPagar/modalCuentas.php';
  require $root . '/fitcoControl/Resources/PHP/CuentasxPagar/pieCuentas.php';
?>
