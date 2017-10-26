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

  <div class="clt_usr mt-5 ml-5">
    <a id="addcliente" class="rotate-link consultar ancla" accion="acliente" status="cerrado">
      <img src="/fitcoControl/Resources/iconos/clientes.svg" class="icon1 rotate-icon" style="width:30px">
      <span class="span">Agregar Cliente</span>
    </a>
  </div>


  <form id="Eclientes" class="page p-0">
    <table class="table table-hover table-fixed">
      <thead>
        <tr class="row m-0 encabezado">
          <td class="col-md-1"></td>
          <td class="col-md-3 text-center">
            <h3>CLIENTE</h3>
          </td>
          <td class="col-md-4 text-center">
            <h3>CORREO/CONTACTO</h3>
          </td>
          <td class="col-md-3 text-center">
            <h3>TELEFONO</h3>
          </td>
          <td class="col-md-2 text-center"></td>
        </tr>
      </thead>
      <tbody id="mostrarClientes"></tbody>
    </table>
  </form>


  <form  id="NuevoCliente"  class="agregarnuevo" style="display:none">
    <table class="table">
      <tbody id="AgregarCliente">
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input type="hidden" name="clt_id">
            <input id="clt_nombre" class="effect-17" type="text" required>
              <label>Nombre Cliente</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="clt_contacto" class="effect-17" type="text" required>
              <label>Correo del Cliente</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="clt_telefono" class="effect-17" type="text" required>
              <label>Telefono del Cliente</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="clt_credito" class="effect-17" type="text" required>
              <label>Credito</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-6 input-effect p-0">
            <input id="clt_fingreso" class="effect-17 has-content" type="date" required>
              <label>Fecha Ingreso</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-1"></td>
          <td class="col-md-5 input-effect p-0">
            <input id="clt_color" class="w-100 effect-17 has-content form-control" type="color" style="border:0px;height:34px" required>
              <label>Color Cliente:</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="clt_prendas" class="effect-17" type="text" required>
              <label>Prendas Solicitadas por Mes</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="clt_nosotros" class="w-100 effect-17" list="ingr" required>
            <datalist id="ingr">
              <option value="Referido">Referido</option>
              <option value="Asesor de Ventas">Asesor de Ventas</option>
              <option value="Medios Publicitarios">Medios Publicitarios</option>
            </datalist>
              <label>Como supo de Nosotros?</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="clt_vendedor" class="effect-17" type="text" required>
              <label>Nombre Vendedor</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row justify-content-center">
          <td class="col-md-4">
            <button type="submit" id="NuevoRegistro" class="btnsub btn boton btn-block ">AGREGAR</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>



<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/Clientes/EditarCliente.php';
  require $root . '/fitcoControl/Resources/PHP/Clientes/pieClientes.php';
?>
