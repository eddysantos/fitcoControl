
<!-- <div class="modal fade" id="PagoFacturas">
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
                <input class="modal-efecto-17 has-content importeClass" name="mpgo_importe" id="mpgo_importe" type="text">
                  <label>Importe</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="justify-content-center modal-footer">
        <button  id="AgregarPgo" type="submit" class="AgregarPgo w-50 btnsub btn boton btn-block ">AGREGAR</button>
      </div>
    </div>
</div> -->




<div class="modal fade" id="PagoFacturas">
  <div class="modal-dialog modal-med1">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">PAGOS</h5>
      </div>
      <div class="modal-body">

        <table class="table">
          <tr class="row m20">
            <td class="col-md-3 input-effect p-0">
              <input type="hidden" id="mpgo_id">
              <input class="modal-efecto-17 has-content" id="mpgo_fpago" type="date">
                <label>Fecha Pago</label>
                <span class="focus-border"></span>
            </td>
            <td class="col"></td>
            <td class="col-md-7 input-effect p-0">
              <input class="modal-efecto-17 has-content importeClass" id="mpgo_importe" type="text">
                <label>Importe</label>
                <span class="focus-border"></span>
            </td>
            <td class="col-md-1 p-0">
              <a href='#' id="AgregarPgo" class='nuevoPago'><img src='/fitcoControl/Resources/iconos/003-add.svg' class='w-50 spand-icon'></a>
            </td>
          </tr>
        </table>

        <div class="mt-5" style="border: 1px solid #ccc;border-radius: 9px;">
          <table class="table">
            <thead>
              <tr class="row encabezado m-0">
                <td class='col-md-5 text-center'>
                  <h4><b>FECHA</h4>
                </td>
                <td class='col-md-5 text-center'>
                  <h4><b>PAGADO</b></h4>
                </td>
                <td class='col-md-2 text-center'></td>
              </tr>
            </thead>
            <tbody id="mostrarPagos"></tbody>
          </table>
        </div>
      </div>
    </div>
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
                <input type="hidden" id="pk_pagos">
                <input class="modal-efecto-17 has-content" id="fechaPago" type="date">
                  <label>Fecha</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content importeClass" id="importePago" type="text">
                  <label>Pagado</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="justify-content-center modal-footer">
        <button   type="submit" class="ActualizarPago w-50 btnsub btn boton btn-block ">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
