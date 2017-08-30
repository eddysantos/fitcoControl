
<div class="modal fade" id="EditarCliente">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Editar Cliente</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input type="hidden" name="clt_id">
                  <input class="modal-efecto-17 has-content" type="text" value="">
                    <label>Nombre del Cliente</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content" type="date">
                    <label>Fecha Ingreso</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" type="color">
                    <label>Color Cliente</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content " type="text" value="">
                    <label>Prendas Solicitadas por Mes</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content " list="priv" value="">
                  <datalist id="priv">
                    <option value="Referido"></option>
                    <option value="Asesor de Ventas"></option>
                    <option value="Medios Publicitarios"></option>
                  </datalist>
                    <label>Cómo supo de Nosotros?</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>

        </div><!--termina el Container-Fluid-->
      </div><!--termina el Cuerpo del Modal-->
      <div class="modal-footer">
        <a href="" id="btn">ACEPTAR <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
