<!--MODAL AGREGAR EN DATA TABLES  -->


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



<!--MODAL EDITAR EN DATA TABLES  -->
<?php
// $root = $_SERVER['DOCUMENT_ROOT'];
// require $root . '/fitcoControl/Resources/PHP/DataBases/ConexionDataTables.php';
// $cn = getConexion();
// $sql = "SELECT *  FROM ct_cobranza";
// $res = $cn->query($sql);
// $id = $POST['pk_cobranza'];
?>

<div class="modal fade" id="editarCobranza">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input type="hidden" name="mcbz_id" id="mcbz_id">
                <input class="modal-efecto-17 has-content w-100" name="mcbz_cliente" id="mcbz_cliente" required autocomplete="off" client-id="">

                <span class="focus-border"></span>
                <div class="client-list" id="mcbz_ClientList" style="display: none">
                </div>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input name="mcbz_concepto" id="mcbz_concepto" class="modal-efecto-17 has-content w-100" list="conc" required>
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
                <input class="modal-efecto-17 has-content" name="mcbz_factura" id="mcbz_factura" type="text">
                  <label>Factura</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content" name="mcbz_importe" id="mcbz_importe" type="text">
                  <label>Importe</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content" name="mcbz_entrega" id="mcbz_entrega" type="date">
                  <label>Fecha Entrega</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content" name="mcbz_vencimiento" id="mcbz_vencimiento" type="date">
                  <label>Día Vencimiento</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button type="submit"  class="ActualizarDcobranza w-50 btnsub btn boton btn-block ">ACTUALIZAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>




<!-- AGREGAR PAGO  -->
<div class="modal fade" id="PagoFacturas">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">AGREGAR PAGO</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input type="hidden" name="mpgo_id" id="mpgo_id">
                <input class="modal-efecto-17 has-content" name="mpgo_fpago" id="mpgo_fpago" type="date">
                  <label>Fecha Pago</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content" name="mpgo_importe" id="mpgo_importe" type="text">
                  <label>Importe</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button  id="AgregarPgo" type="submit" class="AgregarPgo w-50 btnsub btn boton btn-block ">AGREGAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
