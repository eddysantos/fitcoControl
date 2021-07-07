<div class="modal fade" id="edit_registro">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR REGISTRO</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody id="contenidomodal">
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input type="hidden" id="pk_diseno" db-id="">
                  <input id="fecha" class="modal-efecto-17" type="date" required>
                    <label>Fecha</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input id="dis_requerido" class="modal-efecto-17 numeroClass" type="text" required>
                    <label>Requerido</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input id="dis_entregados" class="modal-efecto-17 numeroClass" type="text" required>
                    <label>Entregados</label>
                    <span class="focus-border"></span>
                </td>
              </tr>

              <tr class="row m20" style="display:none">
                <td class="col-md-12 input-effect p-0">
                  <input id="porcentaje" class="modal-efecto-17" type="text" required readonly>
                    <label>Porcentaje</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="actualizar" type="submit" class="actualizar w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
