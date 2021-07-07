<div class="modal fade" id="mostrar_cotizaciones">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Opciones (Cotizaciones)</h5>
      </div>
      <div class="modal-body">
        <div class="mt-5" style="border: 1px solid #ccc;border-radius: 9px;">
          <div class='row m-0 encabezado text-center' style="border-bottom:0px">
            <div class='col-md-6'><p>Proveedor</p></div>
            <div class='col-md-5'><p>Datos Bancarios</p></div>
            <div class='col-md-1'></div>
          </div>
          <div id="tabla_cotizaciones" class="font12"></div>
        </div>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="actualizarCot">
  <div class="modal-dialog modal-med1">
    <div class="modal-content">
      <div class="modal-header">
        <a href="#" class="actualizarAprob"><img src='/fitcoControl/Resources/iconos/checked.svg' class='spand-icon w-25'></a>
        <h5 class="modal-tittle">Autorización</h5>
      </div>
      <div class="modal-body">
        <div class="mt-5" style="border: 1px solid #ccc;border-radius: 9px;">
          <table class="table text-center">
            <tbody>
              <tr class="row m20">
                <input type="hidden" id="add_opcion" value="">
                <input type="hidden" id="add_pk_orden" value="">
                <input type="hidden" id="add_pk_cotizacion" value="">
                <td class="col-md-1"></td>
                <td class="col-md-7 input-effect p-0">
                  <input id="add_notaAprobado" class="modal-efecto-17 has-content" type="text">
                    <label for="add_notaAprobado">Comentario de Aprobación</label>
                    <span class="focus-border"></span>
                </td>

                <?php if ( $_SESSION['user']['correoUsuario'] == 'mariela@villaverde.com'  || $_SESSION['user']['correoUsuario'] == 'epinales@prolog-mex.com'): ?>
                    <td class="col-md-1  p-0 pt-2">
                      <label class='switch'>
                        <input id="add_aprobado" type='checkbox' class='success'>
                        <span class='slider round'></span>
                      </label>
                    </td>
                    <td class="col-md-2">Autorizado</td>
                  <?php else: ?>
                <?php endif; ?>
              </tr>


            </tbody>
          </table>
        </div>
      </div>
      <!-- <div class="row justify-content-center modal-footer m-0">
        <div class="col-md-3">
          <a href='#actualizarCot' class="actualizarCot btnsub btn boton btn-block ">AUTORIZAR</a>
        </div>
      </div> -->
    </div>
  </div>
</div>































<div class="modal fade" id="mostrar_cot_autorizada">
  <div class="modal-dialog modal-grande">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Opcion Autoriazada</h5>
      </div>
      <div class="modal-body">
        <div class="mt-5" style="border: 1px solid #ccc;border-radius: 9px;">
          <div class='row m-0 encabezado text-center' style="border-bottom:0px">
            <div class='col-md-6'><p>Proveedor</p></div>
            <div class='col-md-5'><p>Datos Bancarios</p></div>
            <div class='col-md-1'></div>
          </div>
          <div id="tabla_cot_auto" class="font12"></div>
        </div>



      </div>
    </div>
  </div>
</div>







<div class="modal fade" id="editarCot">
  <div class="modal-dialog modal-med1">
    <div class="modal-content">
      <div class="modal-header">
        <a href="#" class="actualizar"><img src='/fitcoControl/Resources/iconos/checked.svg' class='spand-icon w-25'></a>
        <h5 class="modal-tittle">Editar Autorización</h5>
      </div>
      <div class="modal-body">

        <div class="mt-5" style="border: 1px solid #ccc;border-radius: 9px;">
          <div class='row m-0 encabezado text-center' style="border-bottom:0px">
            <div class='col-md-6'><p>Proveedor</p></div>
            <div class='col-md-5'><p>Datos Bancarios</p></div>
            <div class='col-md-1'></div>
          </div>
          <div id="edit_cot_auto" class="font12"></div>
        </div>


        <div class="mt-5" style="border: 1px solid #ccc;border-radius: 9px;">
          <table class="table text-center">
            <tbody>
              <tr class="row m20">
                <td class="col-md-1 input-effect p-0">
                  <select id="opcion" class="w-100 custom-select">
                    <option value="1">1</option>
                    <option value="2">2</option>
                  </select>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-7 input-effect p-0">
                  <input type="hidden" id="pk_orden" db-id="" value="">
                  <input type="hidden" id="pk_cotizacion" db-id="" value="">
                  <input id="notaAprobado" class="modal-efecto-17 has-content" type="text">
                    <label>Comentario de Aprobación</label>
                    <span class="focus-border"></span>
                </td>

                <?php if ( $_SESSION['user']['correoUsuario'] == 'mariela@villaverde.com'  || $_SESSION['user']['correoUsuario'] == 'epinales@prolog-mex.com'): ?>
                    <td class="col-md-1  p-0 pt-2">
                      <label class='switch'>
                        <input id="aprobado" type='checkbox' class='success'>
                        <span class='slider round'></span>
                      </label>
                    </td>
                    <td class="col-md-2">Autorizado</td>
                  <?php else: ?>
                <?php endif; ?>
              </tr>


            </tbody>
          </table>
        </div>
      </div>
      <!-- <div class="row justify-content-center modal-footer m-0">
        <div class="col-md-3">
        </div>
      </div> -->
    </div>
  </div>
</div>
