
<div class="modal fade" id="EditarProduccion">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR PROGRAMACIÓN</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input type="hidden" name="mpgr_id" id="mpgr_id">
                  <input class="modal-efecto-17 w-100 has-content" name="mpgr_cliente" id="mpgr_cliente" list="clientes">
                  <label>Cliente</label>
                  <span class="focus-border"></span>
                  <div class="client-list" id="mpgr_ClientList" style="display: none">
                  </div>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content" name="mpgr_fini" id="mpgr_fini" type="date">
                    <label>Fecha de Inicio</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content" name="mpgr_ffin" id="mpgr_ffin" type="date">
                    <label>Fecha Final</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content" name="mpgr_hora" id="mpgr_hora" type="time">
                    <label>Meta Diaria</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content" name="mpgr_piezas" id="mpgr_piezas" type="text">
                    <label>Piezas Requeridas</label>
                    <span class="focus-border"></span>
                </td>
            </tbody>
          </table>

        </div><!--termina el Container-Fluid-->
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button id="ActualizarProgram" type="submit" class="ActualizarProgram w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
