
<div class="modal fade" id="EditarCuenta">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR DATOS</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input type="hidden" id="mcxp_id">
                  <input id="mcxp_proveedor" class="modal-efecto-17 has-content" type="text" required>
                    <label>Proveedor</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input id="mcxp_desc" class="modal-efecto-17 has-content" type="text" required>
                    <label>Descripción de Servicio</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input id="mcxp_factura" class="modal-efecto-17 has-content" type="text" required>
                    <label>Factura</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input id="mcxp_total" class="modal-efecto-17 has-content importeClass" type="text" required>
                    <label>Monto a Pagar</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input id="mcxp_vencimiento" class="modal-efecto-17 has-content" type="date" required>
                    <label>Fecha Vencimiento</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input id="mcxp_pagado" class="modal-efecto-17 has-content importeClass" type="text" required>
                    <label>Pagado</label>
                    <span class="focus-border"></span>
                </td>
              </tr>

            </tbody>
          </table>

        </div><!--termina el Container-Fluid-->
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button id="ActualizarCuenta" type="submit" class="ActualizarCuenta w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
