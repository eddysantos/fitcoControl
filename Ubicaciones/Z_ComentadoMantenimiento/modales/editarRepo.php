<!-- <div class="modal fade" id="EditarRepo">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">ACTUALIZAR DATOS</h5>
      </div>
      <div class="modal-body p-0">
        <table class="table fixed-table text-center">
          <tbody>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="r_pk_mantenimiento" type="hidden">
                <input id="r_orden" class="modal-efecto-17 has-content" type="text">
                  <label>Orden de Importancia</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="r_mant_Inv" class="modal-efecto-17 has-content" type="text">
                  <label>Mantenimiento / Inversión</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="r_area" class="modal-efecto-17 has-content" type="text">
                  <label>Area</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="r_descripcion" class="modal-efecto-17 has-content" type="text">
                  <label>Descripción</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="r_proveedor" class="modal-efecto-17 has-content" type="text">
                  <label>Proveedor</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="r_costo" class="modal-efecto-17 has-content" type="text">
                  <label>Costo con IVA</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="r_fechaRequerido" class="modal-efecto-17 has-content has-content" type="date">
                  <label>Fecha Requerido</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20 justify-content-center ">
              <td class="col-md-1 p-0 pt-2">
                <label class='switch'>
                  <input id="r_pagado" type='checkbox' class='success'>
                  <span class='slider round'></span>
                </label>
              </td>
              <td class="col-md-1">Pagado</td>
            </tr>
            <?php if ( $_SESSION['user']['correoUsuario'] == 'mariela@villaverde.com'  || $_SESSION['user']['correoUsuario'] == 'epinales@prolog-mex.com'): ?>
              <tr class="row m20 justify-content-center ">
                <td class="col-md-1  p-0 pt-2">
                  <label class='switch'>
                    <input id="r_autorizacion" type='checkbox' class='success'>
                    <span class='slider round'></span>
                  </label>
                </td>
                <td class="col-md-1">Autorizado</td>
              </tr>
              <?php else: ?>
                <tr class="row"></tr>
            <?php endif; ?>

          </tbody>
        </table>
      </div>
      </tr>
      <div class="justify-content-center modal-footer">
        <button type="submit" class="ActualizarMant btnsub btn boton btn-block ">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div> -->
