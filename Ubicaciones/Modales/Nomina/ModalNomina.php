
<div class="modal fade" id="EditarNomina">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR REGISTRO</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input type="hidden" id="mnom_id">
                <input  id="mnom_fecha" class="modal-efecto-17 has-content" type="date" required>
                  <label>Fecha Nomina</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="mnom_serv" class="modal-efecto-17 has-content" type="text" required>
                  <label>Servicio</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="mnom_nom" class="modal-efecto-17 has-content" type="text" required>
                  <label>Nomina</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="mnom_cantNom" class="modal-efecto-17 has-content" type="text" required>
                  <label>Cantidad Nomina ($)</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="mnom_hrExtras" class="modal-efecto-17 has-content" type="text" required>
                  <label>Horas Extras Laboradas</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="mnom_cantHr" class="modal-efecto-17 has-content" type="text" required>
                  <label>Cantidad de Dinero en horas extras</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button  type="submit" class="ActualizarNom w-50 btnsub btn boton btn-block ">ACTUALIZAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
