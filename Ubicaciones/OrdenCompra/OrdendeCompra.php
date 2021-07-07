<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require  $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
$fecha_reg =  date("Y-m-d h:i:s");
?>

  <div class="row sub-grafica">
    <div class="col-md-2 text-right pt-1"><h3>ORDEN DE COMPRA :</h3></div>
    <div class="col-md-2 pl-0" id='ordenGenerada'></div>
    <div class="col-md-4"></div>
    <div class="col-md-2 text-right"><h4><b>Fecha de solicitud:</b></h4></div>
    <div class="col-md-2"><h4><b>
      <input id="fecha_sol" type="text" class="bt border-0 h20" value="<?php echo $fecha_reg ?>"> </b></h4></div>
  </div>



  <form id="NuevaOrden" onsubmit="return false" class="m-5" style="margin-bottom:80px;">
    <table class="table">
      <tbody>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="_usuarioSolicitud" class="effect-17" type="text">
              <label>Persona que solicita</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="_item" class="effect-17" type="text">
              <label>Item</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="_descripcion" class="effect-17" type="text">
              <label>Descripción</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-4 input-effect p-0">
            <input id="_vitalDesechable" class="w-100 effect-17" list="importancia" type="text">
            <datalist id="importancia">
              <option value="Vital">Vital</option>
              <option value="Deseable">Deseable</option>
            </datalist>
            <label>Importancia</label>
            <span class="focus-border"></span>
          </td>
          <td class="col-md-1"></td>
          <td class="col-md-3 input-effect p-0">
            <input id="_fechaRequerido" class="effect-17 has-content" type="date">
              <label>Fecha Requerido</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-1"></td>
          <td class="col-md-3 input-effect p-0">
            <input id="_cantidad" class="effect-17 numeroClass" type="text">
              <label>Cantidad</label>
              <span class="focus-border"></span>
          </td>
        </tr>
      </tbody>
    </table>
    <div id="agregarOrden" class="row justify-content-center mt-5">
      <div class="col-md-4">
        <button type="submit" class="generarOrden btnsub btn boton btn-block">SIGUIENTE >></button>
      </div>
    </div>
  </form>




  <form id="NuevaCotizacion" onsubmit="return false" class="m-5" style="margin-bottom:80px!important;display:none">
    <div id="op1" class="row sub-gris m-0">
      <div class="col-md-12 text-left"><h3>OPCION / COTIZACIÓN  #1</h3></div>
    </div>

    <div id="op2" class="row sub-gris m-0" style="display:none">
      <div class="col-md-12 text-left"><h3>OPCION / COTIZACIÓN  #2</h3></div>
    </div>
    <table class="table">
      <tbody>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="_razonSocial" class="effect-17" type="text">
              <label>Razon Social *</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-3 input-effect p-0">
            <input id="_rfc" class="effect-17" type="text">
              <label>RFC</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-1 input-effect p-0"></td>
          <td class="col-md-3 input-effect p-0">
            <input id="_precio" class="effect-17 importeClass" type="text">
              <label>Precio *</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-1 input-effect p-0"></td>

          <td class="col-md-4 input-effect p-0">
            <input id="_iva" class="w-100 effect-17" list="IVA" type="text">
            <datalist id="IVA">
              <option value="Mas IVA">Mas IVA</option>
              <option value="Con IVA">Con IVA</option>
            </datalist>
            <label>IVA *</label>
            <span class="focus-border"></span>
          </td>
        </tr>

        <tr class="row m20">
          <td class="col-md-3 input-effect p-0">
            <input id="_numCuenta" class="effect-17 numeroClass" type="text">
              <label>Numero de Cuenta</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-1"></td>
          <td class="col-md-3 input-effect p-0">
            <input id="_clabe" class="effect-17 numeroClass" type="text">
              <label>CLABE Interbancaria</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-1"></td>

          <td class="col-md-4 input-effect p-0">
            <input id="_nombreBanco" class="effect-17" type="text">
              <label>Nombre del Banco</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-3 input-effect p-0">
            <input id="_condicionPago" class="effect-17" type="text">
              <label>Condicion de Pago</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-1"></td>
          <td class="col-md-3 pr-0 pl-0 pb-0">
            <label>Sugiero que se compre esta opción?</label>
            <select id="_sugerencia" style="width:18%" class='custom-select'>
              <option value="--">--</option>
              <option value="si">Si</option>
            </select>
          </td>
          <td class="col-md-1"></td>
          <td  class="col-md-4 input-effect p-0 razonSugerencia" style="display:none">
            <input id="_razonSugerencia" class="effect-17" type="text">
              <label>Porque? (razones de sugerencia)</label>
              <span class="focus-border"></span>
          </td>
        </tr>
      </tbody>
    </table>
    <div class="row justify-content-center mt-5">
      <div class="col-md-4">
        <button id="cot1" opcion="1" class="nueva_cot btnsub btn btn-block">SIGUIENTE >></button>
        <button id="cot2" style="display:none" opcion="2" class="ultima_cot btnsub btn btn-block">FINALIZAR</button>
      </div>
    </div>
  </form>


<?php
  require $root . '/fitcoControl/Ubicaciones/OrdenCompra/actions/footer.php';
?>
