<div class="modal fade" id="mostrar_clientesNuevos">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Clientes Nuevos</h5>
      </div>
      <div class="modal-body">
        <form onsubmit="return false">
          <table class="table">
            <tr class="row m-0 justify-content-center" id="contenido">
              <td class="col-md-6">
                <input class="efecto" type="date" id="_fecha">
              </td>
              <td class="col-md-3">
                <input class="efecto numeroClass" type="text" id="_clientesNuevos" placeholder="#Clientes">
              </td>
              <td class="col-md-2 text-left">
                <a href="#" id="add_cltNuevo" class="rotate-link consultar ancla" style="font-size: larger; text-decoration:none">
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
                <td class='col-md-5 pl-0 pr-0'><p># Clientes Nuevos</p></td>
                <td class='col-md-3'></td>
              </tr>
            </thead>
            <tbody id="tabla_cltNuevos" class="font12">
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

<div class="modal fade" id="editar_clienteNuevo">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Editar</h5>
      </div>
      <div class="modal-body">
        <form onsubmit="return false">
          <table class="table">
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input type="hidden" id="pk_clt_nuevos" db-id="">
                <input id="fecha" class="modal-efecto-17" type="date" required>
                  <label>Fecha</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="clientesNuevos" class="modal-efecto-17 numeroClass" type="text" required>
                  <label># Clientes Nuevos</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

          </table>
        </form>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="act_clienteNuevo" type="submit" class="act_clienteNuevo w-50 btnsub btn boton btn-block" db-id="">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
