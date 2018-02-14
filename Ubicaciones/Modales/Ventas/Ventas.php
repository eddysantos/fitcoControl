
<div class="modal fade" id="EditarVentas">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR DATOS VENTA</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input type="hidden" name="mvts_id" id="mvts_id">
                  <input class="modal-efecto-17 has-content" name="mvts_nombreCliente" id="mvts_nombreCliente" type="text">
                    <label>Nombre Cliente</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" name="mvts_vendedor" id="mvts_vendedor" type="text">
                    <label>Nombre Vendedor</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" name="mvts_nprendas" id="mvts_nprendas" type="text">
                    <label>No. de Prendas</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" name="mvts_precio" id="mvts_precio" type="text">
                    <label>Precio por Prenda</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" name="mvts_Apago" id="mvts_Apago" type="text">
                    <label>Acuerdo de Pago</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" name="mvts_fingreso" id="mvts_fingreso" type="date">
                    <label>Fecha de Ingreso</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content w-100" name="mvts_fbaja" id="mvts_fbaja" type="date">
                    <label>Fecha de Baja</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>

        </div><!--termina el Container-Fluid-->
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button id="ActualizarVenta" type="submit" class="ActualizarVenta w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
