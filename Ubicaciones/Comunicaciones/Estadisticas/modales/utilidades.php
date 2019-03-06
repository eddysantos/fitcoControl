<div class="modal fade" id="mostrar_utilidades">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Utilidades de la Empresa</h5>
      </div>
      <div class="modal-body">
        <form onsubmit="return false">
          <table class="table">
            <tr class="row m-0 justify-content-center">
              <td class="col-md-5">
                <input class="efecto" type="date" id="_fecha">
              </td>
              <td class="col-md-3">
                <input class="efecto importeClass" type="text" id="_ingresos" placeholder="Ingresos">
              </td>
              <td class="col-md-3">
                <input class="efecto importeClass" type="text" id="_egresos" placeholder="Egresos">
              </td>
              <td class="col-md-1 text-left">
                <a href="#" id="add_utilidades" class="rotate-link consultar ancla" style="font-size: larger; text-decoration:none">
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
                <td class='col-md-3 pl-0 pr-0'><p>Ingresos</p></td>
                <td class='col-md-3 pl-0 pr-0'><p>Egresos</p></td>
                <td class='col-md-2'></td>
              </tr>
            </thead>
            <tbody id="tabla_utilidades" class="font12">
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

<div class="modal fade" id="editar_utilidades">
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
                <input type="hidden" id="pk_utilidad" db-id="">
                <input id="fecha" class="modal-efecto-17" type="date" required>
                  <label>Fecha</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="ingresos" class="modal-efecto-17 importeClass" type="text" required>
                  <label>Ingresos</label>
                  <span class="focus-border"></span>
              </td>
            </tr>
            <tr class="row m20">
              <td class="col-md-12 input-effect p-0">
                <input id="egresos" class="modal-efecto-17 importeClass" type="text" required>
                  <label>Egresos</label>
                  <span class="focus-border"></span>
              </td>
            </tr>

          </table>
        </form>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="act_utilidad" type="submit" class="act_utilidad w-50 btnsub btn boton btn-block" db-id="">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
