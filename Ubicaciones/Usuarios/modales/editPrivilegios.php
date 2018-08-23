<div class="modal fade" id="edit_priv_privilegios">
  <div class="modal-dialog modal-med1">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR PROVILEGIOS</h5>
      </div>
      <div class="modal-body p-0">
        <table class="table fixed-table text-center">
          <tbody>
            <tr class="row text-center priv">
              <td class="col-md-12"> **COMUNICACIÓN** </td>
            </tr>
            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Estadisticas</td>
            </tr>
            <tr class="row">
              <td class="col-md-4">

                <!-- <label class='switch ml-3'>
                  <input type='checkbox' class='success' id="e_ventas">Ver Ventas
                  <span class='slider round'></span>
                </label> -->
                <input type="checkbox" class="check" id="e_ventas">Ver Ventas
              </td>
              <td class="col-md-4">
                <input type="checkbox"  id="e_tesoreria">Ver Cobranza
              </td>
              <td class="col-md-4">
                <input type="checkbox"  id="e_produc">Ver Producción
              </td>
            </tr>



            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Recursos Humanos</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox"  id="e_rhVer">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox"  id="e_rhEditar">Editar / Eliminar
              </td>
            </tr>

            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Usuarios</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox"  id="e_usVer">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox"  id="e_usEditar">Editar / Eliminar
              </td>
            </tr>


            <tr class="row text-center">
              <td class="col-md-12 priv"> **C L I E N T E S** </td>
            </tr>
            <tr class="row">
              <td class="col-md-6 text-center">
                <input type="checkbox"  id="c_ver">Ver y Agregar Datos
              </td>
              <td class="col-md-6 text-center">
                <input type="checkbox"  id="c_editar">Editar / Eliminar
              </td>
            </tr>


            <tr class="row">
              <td class="col-md-12 priv"> **T E S O R E R I A** </td>
            </tr>
            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Departamento Cobranza</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="tc_ver">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="tc_editar">Editar / Eliminar
              </td>
            </tr>


            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Departamento Cuentas x Pagar</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="tcxp_ver">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="tcxp_editar">Editar / Eliminar
              </td>
            </tr>


            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Materiales y Records</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="tm_ver">Ver y Agregar Datos Materiales
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="tm_editar">Editar / Eliminar Materiales
              </td>
            </tr>

            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="tr_ver">Ver y Agregar Datos Nomina
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="tr_editar">Editar / Eliminar Nomina
              </td>
            </tr>


            <tr class="row text-center">
              <td class="col-md-12 priv"> **P R O D U C C I O N** </td>
            </tr>
            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Programación</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="pro_pgVer">Ver y Agregar
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="pro_pgEditar">Editar / Eliminar
              </td>
            </tr>


            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Mantenimineto e Inversiones</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="pro_miVer">Ver y Agregar
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="pro_miEditar">Editar / Eliminar
              </td>
            </tr>

            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Producción</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="pro_pdVer">Ver y Agregar Datos Produc.Diaria
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="pro_pdEditar">Editar / Eliminar Produc.Diaria
              </td>
            </tr>

            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="pro_corVer">Ver y Agregar Datos Corte
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="pro_corEditar">Editar / Eliminar Corte
              </td>
            </tr>

            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="pro_liVer">Ver y Agregar Datos Lineas
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="pro_liEditar">Editar / Eliminar Lineas
              </td>
            </tr>

            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Envios</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="en_ver">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="en_editar">Editar / Eliminar
              </td>
            </tr>

            <tr class="row text-center">
              <td class="col-md-12 priv"> ** CONTROL DE CALIDAD ** </td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="cc_ver">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="cc_editar">Editar / Eliminar
              </td>
            </tr>

            <tr class="row text-center">
              <td class="col-md-12 priv"> **V E N T A S** </td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="ve_ver">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="ve_editar">Editar / Eliminar
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      </tr>
      <div class="justify-content-center modal-footer">
        <button type="submit" class="ActualizarUsuario btnsub btn boton btn-block ">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>
