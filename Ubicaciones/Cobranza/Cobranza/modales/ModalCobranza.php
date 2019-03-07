
<div class="modal fade" id="DetCobranza">
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
                <input type="hidden" id="pk_cobranza">
                <input type="hidden" id="pk_cliente">
                <input class="modal-efecto-17 popup-input w-100 border-0" id="nombreCliente" type="text" id-display="#popup-display-clt-cobranza" action="listaClientes" db-id="" autocomplete="off" >
                <div class="popup-list" id="popup-display-clt-cobranza" style="display:none"></div>
                <label for="nombrecliente">Cliente</label>
                <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="conceptoPago" class="w-100 effect-17 has-content" list="conc" required>
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
                <input class="modal-efecto-17 has-content" id="facturaCobranza" type="text">
                  <label>Factura</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="importeCobranza" type="text">
                  <label>Importe</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content" id="fechaEntrega" type="date">
                  <label>Fecha Entrega</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content" id="vencimientoCobranza" type="date">
                  <label>Día Vencimiento</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button   type="submit" class="ActualizarDcobranza w-50 btnsub btn boton btn-block ">ACTUALIZAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
