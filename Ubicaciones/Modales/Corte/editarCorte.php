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
                <input type="text" id="mcor_id" style="display:none">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" type="text" id="mcor_cliente" required autocomplete="off">
                    <label>Cliente</label>
                    <span class="focus-border"></span>
                    <div class="client-list" id="mcor_ClientList" style="display: none">
                    </div>
                </td>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="mcor_fcorte" class="modal-efecto-17 has-content w-100" type="date" required>
                  <label>Fecha de Corte</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 mb-5 text-center w-100 p-0">Horas Proyectadas de Corte</td>
              <td class="col-md-5 input-effect p-0">
                <input id="mcor_hpinicio" class="modal-efecto-17 has-content w-100" type="time" required>
                  <label>Hora de Inicio</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-2"></td>
              <td class="col-md-5 input-effect p-0">
                <input id="mcor_hpfinal" class="modal-efecto-17 has-content w-100" type="time" required>
                  <label>Hora Final</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 mb-5 text-center w-100 p-0">Horas Reales de Corte</td>
              <td class="col-md-5 input-effect p-0">
                <input id="mcor_hrinicio" class="modal-efecto-17 has-content w-100" type="time" required>
                  <label>Hora de Inicio</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-2"></td>
              <td class="col-md-5 input-effect p-0">
                <input id="mcor_hrfinal" class="modal-efecto-17 has-content w-100" type="time" required>
                  <label>Hora Final</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="mcor_notas" class="modal-efecto-17 has-content w-100" type="text" required>
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
