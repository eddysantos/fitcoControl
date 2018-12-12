
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
                <input type="hidden" name="mcbz_id" id="mcbz_id">
                <input class="modal-efecto-17 has-content w-100" name="mcbz_cliente" id="mcbz_cliente" required autocomplete="off">
                <label>Cliente</label>
                <span class="focus-border"></span>
                <div class="client-list" id="mcbz_ClientList" style="display: none">
                </div>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input name="mcbz_concepto" id="mcbz_concepto" class="w-100 effect-17 has-content" list="conc" required>
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
                <input class="modal-efecto-17 has-content importeClass" name="mcbz_importe" id="mcbz_importe" type="text">
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
        <button   type="submit" class="ActualizarDcobranza w-50 btnsub btn boton btn-block ">ACTUALIZAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>

<!--VISUALIZAR TABLA PRODUCCION VISUALIZAR TABLA PRODUCCION-->

<div class="modal fade" id="VisualizarTablaCobranza">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Tabla de Pagos</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <thead>
              <tr class="row encabezado">
                <td class='col-md-5 text-center'>
                  <h4><b>FECHA</h4>
                </td>
                <td class='col-md-5 text-center'>
                  <h4><b>PAGADO</b></h4>
                </td>
                <td class='col-md-2 text-center'></td>
              </tr>
            </thead>
            <tbody id="visualizarCobranza"></tbody>
          </table>
        </div><!--termina el Container-Fluid-->
      </div><!--termina el Cuerpo del Modal-->
    </div><!--termina el COntenido del Modal-->
  </div>
</div>


<!-- MODAL PARA EDITAR PAGOS -->
<div class="modal fade" id="EdPago">
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
                <input type="hidden" name="pgo_id" id="pgo_id">
                <input class="modal-efecto-17 has-content" id="pgo_fecha" type="date">
                  <label>Fecha</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="pgo_pagado" type="text">
                  <label>Pagado</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button   type="submit" class="ActualizarPago w-50 btnsub btn boton btn-block ">ACTUALIZAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>