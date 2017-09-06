
<div class="modal fade" id="DetCobranza">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">DETALLE DE COBRANZA</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input type="hidden" name="mcbz_id" id="mcbz_id">
                <input class="modal-efecto-17 has-content w-100" name="mcbz_cliente" id="mcbz_cliente" list="clientes" required autocomplete="off">
                <datalist id="clientes"></datalist>
                  <label>Cliente</label>
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
                <input class="modal-efecto-17 has-content" name="mcbz_vencimiento" id="mcbz_vencimiento" type="date">
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
