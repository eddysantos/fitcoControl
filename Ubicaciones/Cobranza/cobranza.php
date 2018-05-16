<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
  require $root . '/fitcoControl/Resources/PHP/DataBases/Conexion.php';
?>


<div class="container-fluid pl-75 pr-57">
  <div class="row clt_usr mt-4">
    <div class="text-left alert alert-info w-65" role="alert" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Nota: </strong> En esta sección se podran registrar las facturas que nos van a pagar, se podra editar en <img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='iconoNota'> y eliminar registro en <img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='iconoNota'>. Adicional se podra agregar un pago completo de la factura o un abono  en el icono <img src='/fitcoControl/Resources/iconos/003-add.svg' class='iconoNota'> y se podra ver el desglose de pagos que nos ha realizado el cliente en este icono <img src='/fitcoControl/Resources/iconos/magnifier.svg' class='iconoNota'>
    </div>

    <div class="col align-self-end">
      <a class="rotate-link consultar ancla" accion="acobranza" status="cerrado">
        <img  src="/fitcoControl/Resources/iconos/003-analytics-2.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanA">Agregar Factura</span>
      </a>
      <a class="rotate-link consultar ancla" data-toggle='modal' data-target='#ModalGraficaCobranza'>
        <img  src="/fitcoControl/Resources/iconos/grafica2.svg" class=" icon rotate-icon" style="width:30px">
        <span class="spanD">Graficas Cobranza</span>
      </a>

      <a class="rotate-link buscador ancla" accion="busc" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="buscar" type="text" name="busqueda"  id="busqueda" placeholder="Buscar"></span>
      </a>
    </div>
  </div>
</div>



  <div class="container-fluid mt-4">
    <section id="mostrarCobranza"></section>
  </div>


    <form  id="Agregarcobranza" onsubmit="return false" class="agregarnuevo" style="display:none;margin-bottom:80px">
      <table class="table">
        <tbody>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input type="text" id="cbz_id" style="display:none">
              <td class="col-md-12 input-effect p-0">
                <input class="effect-17" type="text" id="npClientName" required autocomplete="off">
                  <label>Cliente</label>
                  <span class="focus-border"></span>
                  <div class="client-list" id="npClientList" style="display: none">
                  </div>
              </td>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input id="cbz_concepto" class="w-100 effect-17" list="conc" required>
              <datalist id="conc">
                <option value="Maquila">Maquila</option>
                <option value="Bordado">Bordado</option>
                <option value="Flete">Flete</option>
              </datalist>
              <label>Concepto</label>
              <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input id="cbz_factura" class="effect-17" type="text" required>
                <label>No. Factura</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input id="cbz_importe" class="effect-17" type="text" required>
                <label>$ Importe</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input id="cbz_entrega" class="effect-17 has-content" type="date" required>
                <label>Fecha de Entrega</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input id="cbz_dvencimiento" class="effect-17 has-content" type="date" required>
                <label>Vencimiento de factura</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row justify-content-center m-0 mb-2 mt-5">
            <td class="col-md-4">
              <button type="submit" id="NuevoRegistroCobranza" class="btnsub btn boton btn-block ">AGREGAR</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>


<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . '/fitcoControl/Resources/PHP/Cobranza/pieCobranza.php';
  require $root . '/fitcoControl/Ubicaciones/Modales/Cobranza/ModalGraficaCobranza.php';
  require $root . '/fitcoControl/Ubicaciones/Modales/Cobranza/ModalCobranza.php';
  require $root . '/fitcoControl/Ubicaciones/Modales/Cobranza/ModalPagos.php';

?>
