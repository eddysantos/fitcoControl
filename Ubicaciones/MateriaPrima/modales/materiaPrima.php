<div class="modal fade" id="RegistrosMatPrima">
  <div class="modal-dialog modal-med1">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Registros de Materia Prima</h5>
      </div>
      <div class="modal-body">
        <form onsubmit="return false">
          <table class="table">
            <tr class="row m-0 justify-content-center" id="contenido">
              <td class="col-md-4">
                <input class="efecto font12" type="date" id="m_fecha">
              </td>
              <td class="col-md-2">
                <input class="efecto font12 numeroClass" type="text" id="m_entradas" placeholder="Entradas">
              </td>
              <td class="col-md-2" style="display:none">
                <input class="efecto" type="text" id="m_ent_correctas" placeholder="Ent. Correctas" value="0">
              </td>
              <td class="col-md-2" style="display:none">
                <input style="font-size:11px;background-color: #eee;" class="efecto" type="text" id="m_porcentaje" placeholder="Porcentaje" readonly value="0">
              </td>
              <td class="col-md-1 text-left">
                <a href="#" id="nuevo_Reg_Mat" class="rotate-link consultar ancla" style="font-size: larger; text-decoration:none">
                  <img src="/fitcoControl/Resources/iconos/add.svg" class="icon1 rotate-icon" style="width:30px;">
                </a>
              </td>
            </tr>
          </table>
        </form>


        <div class="mt-5" style="border: 1px solid #ccc;border-radius: 9px;">
          <table class="table">
            <thead>
              <tr class='row m-0 encabezado text-center'>
                <td class='col-md-3'><p>Fecha</p></td>
                <td class='col-md-3'><p>Entradas</p></td>
                <td class='col-md-4'><p>Ent. Correctas</p></td>
                <td class='col-md-2'></td>
              </tr>
            </thead>
            <tbody id="tabla_Materia" class="font12">
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




<div class="modal fade" id="edit_registro">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR REGISTRO</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody id="contenidomodal">
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input type="hidden" id="pk_materia" db-id="">
                  <input id="fecha" class="modal-efecto-17" type="date" required>
                    <label>Fecha</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input id="mat_entradas" class="modal-efecto-17 numeroClass" type="text" required>
                    <label>Entradas</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <?php if ($_SESSION['user']['correoUsuario'] == 'epinales@prolog-mex.com' || $_SESSION['user']['correoUsuario'] == 'juan.valenciano@fitco.com.mx' && $_SESSION['user']['usrUsuario'] == 'jvalenciano'): ?>
                <tr class="row m20">
                  <td class="col-md-12 input-effect p-0">
                    <input id="mat_ent_correctas" class="modal-efecto-17 numeroClass" type="text" required>
                      <label>Entradas correctas</label>
                      <span class="focus-border"></span>
                  </td>
                </tr>
              <?php endif; ?>


              <tr class="row m20" style="display:none">
                <td class="col-md-12 input-effect p-0">
                  <input id="porcentaje" class="modal-efecto-17" type="text" required readonly>
                    <label>Porcentaje</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="actualizar" type="submit" class="actualizar w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
