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
                  <input class="w-100 modal-efecto-17" name="mpro_meta" id="mpro_meta" type="text">
                    <label>Meta Diaria</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="w-100 modal-efecto-17" name="mpro_cant" id="mpro_cant" type="text">
                    <label>Cantidad Elaborada</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>

        </div><!--termina el Container-Fluid-->
      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button id="AgregarPro" type="submit" class="AgregarPro w-50 btnsub btn boton btn-block">AGREGAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
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
          <table class="table">
            <thead>
              <tr class="row encabezado">
                <td class='col-md-4 text-center'>
                  <h4><b>FECHA</h4>
                </td>
                <td class='col-md-4 text-center'>
                  <h4><b>META</b></h4>
                </td>
                <td class='col-md-4 text-center'>
                  <h4><b>ELABORADO</b></h4>
                </td>
              </tr>
            </thead>
            <tbody id="visualizarProduccion">

            </tbody>
          </table>
        </div><!--termina el Container-Fluid-->
      </div><!--termina el Cuerpo del Modal-->
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
