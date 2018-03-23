<!--AGREGAR PRODUCCION AGREGAR PRODUCCION-->
<div class="modal fade" id="AgregarProduccion">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Agregar Producción</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input type="hidden" id="mpro_idprog">
                  <input class="w-100 modal-efecto-17 has-content" name="mpro_find" id="mpro_fint" type="date">
                  <label>Fecha</label>
                  <span class="focus-border"></span>
                </td>
              </tr>

              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content" name="mpro_meta" id="mpro_meta" type="text">
                  <label>Meta Diaria</label>
                  <span class="focus-border"></span>
                </td>
              </tr>

              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="w-100 modal-efecto-17 has-content" name="mpro_cant" id="mpro_cant" type="text">
                    <label>Cantidad Elaborada</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="AgregarPro" type="submit" class="AgregarPro w-50 btnsub btn boton btn-block">AGREGAR</button>
      </div>
    </div>
  </div>
</div>



<!--VISUALIZAR TABLA PRODUCCION VISUALIZAR TABLA PRODUCCION-->
<div class="modal fade" id="VisualizarTablaProduccion">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Tabla  Produccion</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table table-hover">
            <thead>
              <tr class="row encabezado">
                <td class='col-md-3 text-center'><h4>FECHA</h4></td>
                <td class='col-md-3 text-center'><h4>META</h4></td>
                <td class='col-md-3 text-center'><h4>ELABORADO</h4></td>
                <td class='col-md-3 text-center'></td>
              </tr>
            </thead>
            <tbody id="visualizarProduccion"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- EDITAR PRODUCCION EDITAR PRODUCCION -->
<div class="modal fade" id="EdProd">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input type="hidden" name="mpr_id" id="mpr_id">
                <input class="modal-efecto-17 has-content" name="mpr_fecha" id="mpr_fecha" type="date">
                <label>Fecha</label>
                <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content" name="mpr_meta" id="mpr_meta" type="text">
                <label>Meta</label>
                <span class="focus-border"></span>
              </td>
            </tr>

            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input class="modal-efecto-17 has-content" name="mpr_elaborado" id="mpr_elaborado" type="text">
                <label>Elaborado</label>
                <span class="focus-border"></span>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="justify-content-center modal-footer">
        <button   type="submit" class="ActualizarProd w-50 btnsub btn boton btn-block ">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
