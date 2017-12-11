
<div class="modal fade" id="EditarMaterial">
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
                <input type="hidden" id="mmat_id">
                <input class="modal-efecto-17 has-content" id="mmat_material" type="text">
                  <label>Material</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content w-100" id="mmat_fcompra" type="date" style="letter-spacing:3px">
                  <label>Fecha de Compra</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-5 input-effect p-0">
                <input class="modal-efecto-17 has-content" id="mmat_serie" type="text">
                  <label>Numero de Serie</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-2"></td>
              <td class="col-md-5 input-effect p-0">
                <input class="modal-efecto-17 has-content" id="mmat_precio" type="text">
                  <label>Precio</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content" id="mmat_persona" type="text">
                  <label>Se le Entrego a:</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content w-100" id="mmat_fentrega" type="date" style="letter-spacing:3px">
                  <label>Fecha de Entrega</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content" id="mmat_condiciones" type="text">
                  <label>Condiciones del Material</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button  type="submit" class="ActualizarMat w-50 btnsub btn boton btn-block ">ACTUALIZAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
