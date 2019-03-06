<div class="modal fade" id="editarInventario">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Modal</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input type="hidden" id="pk_inventario" value="" db-id="">
                <input type="hidden" id="_usuario_edit" value="<?php echo $_SESSION['user']['nombreUsuario']; ?>">
                <input type="hidden" id="_fecha_edit" value="<?php echo $fecha_reg; ?>">
                <input id="cod_proveedor" class="modal-efecto-17" type="text" required>
                  <label>Codigo Proveedor</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="proveedor" class="modal-efecto-17" type="text" required>
                  <label>Proveedor</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="color" class="modal-efecto-17" type="text" required>
                  <label>Color</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-6 input-effect p-0">
                <input id="composicion" class="modal-efecto-17" type="text" required>
                  <label>Composición</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>
              <td class="col-md-5 input-effect p-0">
                <input id="ancho" class="modal-efecto-17" type="text" required>
                  <label>Ancho</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-6 input-effect p-0">
                <input id="precio" class="modal-efecto-17 importeClass" type="text" required>
                  <label>Precio</label>
                  <span class="focus-border"></span>
              </td>
              <td class="col-md-1"></td>
              <td class="col-md-5 input-effect p-0">
                <input id="metros" class="modal-efecto-17" type="text" required>
                  <label>Metros</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="folio_corte" class="modal-efecto-17" type="text" required>
                  <label>Folio Corte</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="fecha" class="modal-efecto-17" type="date">
                  <label>Fecha</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="actualizar" type="submit" class="w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>




<!-- MODAL DE AGREGAR INVENTARIO UTILIZADO -->



<!--AGREGAR PRODUCCION AGREGAR PRODUCCION-->
<div class="modal fade" id="mostrar_inv_utilizado">
  <div class="modal-dialog modal-med1">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Inventario Utilizado</h5>
      </div>
      <div class="modal-body">
        <form onsubmit="return false">
          <table class="table">
            <tr class="row m-0 justify-content-center">
              <td class="col-md-4">
                <input type="hidden" id="_fk_inventario">
                <input type="hidden" id="_usuario_reg_ut" value="<?php echo $_SESSION['user']['nombreUsuario']; ?>">
                <input type="hidden" id="_fecha_reg_ut" value="<?php echo $fecha_reg; ?>">
                <input class="efecto" type="date" id="_fecha_ut">
              </td>
              <td class="col-md-4">
                <input class="efecto" type="text" id="_utilizado" placeholder="Utilizado">
              </td>
              <td class="col-md-2 text-left">
                <a href="#" id="add_inv_ut" class="add_inv_ut rotate-link consultar ancla" style="font-size: larger; text-decoration:none">
                  <img src="/fitcoControl/Resources/iconos/add.svg" class="icon1 rotate-icon" style="width:30px;">
                </a>
              </td>
            </tr>
          </table>
        </form>

        <div class="mt-5" style="border: 1px solid #ccc;border-radius: 9px;">
          <table class="table table-fixed">
            <thead>
              <tr class='row m-0 encabezado text-center'>
                <td class='col-md-4'><p>Fecha</p></td>
                <td class='col-md-5 pl-0 pr-0'><p>Inventario Utilizado</p></td>
                <td class='col-md-3'></td>
              </tr>
            </thead>
            <tbody id="tabla_inv_utilizado" class="font12">
              <tr>
                <td colspan="9">No hay resultados</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="editarUtilizado">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Modal</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input type="hidden" id="pk_inv_utilizado" value="" db-id="">
                <input type="hidden" id="fk_inventario" >
                <input type="hidden" id="usuario_reg_ut">
                <input type="hidden" id="fecha_reg_ut">
                <input type="hidden" id="_usuario_edit_ut" value="<?php echo $_SESSION['user']['nombreUsuario']; ?>">
                <input type="hidden" id="_fecha_edit_ut" value="<?php echo $fecha_reg; ?>">
                <input id="fecha_ut" class="modal-efecto-17" type="date" required>
                  <label>Fecha</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="utilizado" class="modal-efecto-17" type="text" required>
                  <label>Utilizado</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="act_utilizado" type="submit" class="act_utilizado w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
