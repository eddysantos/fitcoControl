
<div class="modal fade" id="AgregarCorte">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">AGREGAR CORTE</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input type="hidden" name="mcor_id" id="mcor_id">
                <input class="modal-efecto-17 has-content w-100" name="mcor_ffinal" id="mcor_ffinal" type="date">
                <label style="top:-16;font-size: 12px;color: #014c8c;">Fecha de Finalización</label>
                <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input type="time" class="modal-efecto-17 has-content w-100" name="mcor_hfin" id="mcor_hfin">
                  <label style="top:-16;font-size: 12px;color: #014c8c;">Hora de Finalización</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content" name="mcor_notas" id="mcor_notas" type="text">
                  <label>Notas</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button   type="submit" class="AgregarCorte w-50 btnsub btn boton btn-block ">AGREGAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>




<div class="modal fade" id="EditarCorte">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR CORTE</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input type="hidden" id="emcor_id">
                <input class="modal-efecto-17 has-content w-100" id="emcor_ffinal" type="date">
                <label style="top:-16;font-size: 12px;color: #014c8c;">Fecha de Finalización</label>
                <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input type="time" class="modal-efecto-17 has-content w-100" id="emcor_hfin">
                  <label style="top:-16;font-size: 12px;color: #014c8c;">Hora de Finalización</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content" id="emcor_notas" type="text">
                  <label>Notas</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button   type="submit" class="ActualizarCorte w-50 btnsub btn boton btn-block ">ACTUALIZAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
