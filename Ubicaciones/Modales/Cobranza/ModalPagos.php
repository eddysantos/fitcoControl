
<div class="modal fade" id="PagoFacturas">
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
                <input class="modal-efecto-17 has-content" name="mpgo_importe" id="mpgo_importe" type="text">
                  <label>Importe</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button  id="AgregarPgo" type="submit" class="AgregarPgo w-50 btnsub btn boton btn-block ">AGREGAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
