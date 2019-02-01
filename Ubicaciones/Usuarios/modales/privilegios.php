<div class="modal fade" id="priv_privilegios">
  <div class="modal-dialog modal-med1">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">PRIVILEGIOS</h5>
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
                  <input type='checkbox' class='success'>
                  <span class='slider round'></span>
                </label> -->
                <input type="checkbox" class="check" id="priv_e_ventas">Ver Ventas
              </td>
              <td class="col-md-4">
                <input type="checkbox" class="check" id="priv_e_tesoreria">Ver Cobranza
              </td>
              <td class="col-md-4">
                <input type="checkbox" class="check" id="priv_e_produc">Ver Producción
              </td>
            </tr>


            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Recursos Humanos</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_e_rhVer">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_e_rhEditar"> Editar / Eliminar
              </td>
            </tr>

            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Usuarios</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_e_usVer">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_e_usEditar"> Editar / Eliminar
              </td>
            </tr>


            <tr class="row text-center">
              <td class="col-md-12 priv"> **C L I E N T E S** </td>
            </tr>
            <tr class="row">
              <td class="col-md-6 text-center">
                <input type="checkbox" class="check" id="priv_c_ver">Ver y Agregar Datos
              </td>
              <td class="col-md-6 text-center">
                <input type="checkbox" class="check" id="priv_c_editar">Editar / Eliminar
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
                <input type="checkbox" class="check" id="priv_tc_ver">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_tc_editar">Editar / Eliminar
              </td>
            </tr>


            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Departamento Cuentas x Pagar</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_tcxp_ver">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_tcxp_editar">Editar / Eliminar
              </td>
            </tr>


            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Materiales y Records</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_tm_ver">Ver y Agregar Datos Materiales
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_tm_editar">Editar / Eliminar Materiales
              </td>
            </tr>

            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_tr_ver">Ver y Agregar Datos Nomina
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_tr_editar">Editar / Eliminar Nomina
              </td>
            </tr>


            <tr class="row text-center">
              <td class="col-md-12 priv"> **P R O D U C C I O N** </td>
            </tr>
            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Departamento de Preparación</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_pro_pgVer">Ver y Agregar Calendario Producción
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_pro_pgEditar">Editar / Eliminar
              </td>


              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_pro_corVerCal">Ver y Agregar Datos Calendario Corte
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_pro_corEditarCal">Editar / Eliminar
              </td>
            </tr>

            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Producción</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_pro_pdVer">Ver y Agregar Datos Produc.Diaria
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_pro_pdEditar">Editar / Eliminar Produc.Diaria
              </td>
            </tr>

            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_pro_corVer">Ver y Agregar Datos Corte
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_pro_corEditar">Editar / Eliminar Corte
              </td>
            </tr>

            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_pro_liVer">Ver y Agregar Datos Lineas
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_pro_liEditar">Editar / Eliminar Lineas
              </td>
            </tr>

            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_pro_invVer">Ver y Agregar Datos Inventario
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_pro_invEditar">Editar Inventario
              </td>
            </tr>

            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Mantenimineto e Inversiones</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_pro_miVer">Ver y Agregar
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_pro_miEditar">Editar / Eliminar
              </td>
            </tr>


            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Diseño</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_dis_ver">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_dis_editar">Editar / Eliminar
              </td>
            </tr>


            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Materia Prima</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_mat_ver">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_mat_editar">Editar / Eliminar
              </td>
            </tr>



            <tr class="row">
              <td class="col-md-12 text-left privsub">---- Envios</td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_en_ver">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_en_editar">Editar / Eliminar
              </td>
            </tr>


            <tr class="row text-center">
              <td class="col-md-12 priv"> ** CONTROL DE CALIDAD ** </td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_cc_ver">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_cc_editar">Editar / Eliminar
              </td>
            </tr>

            <tr class="row text-center">
              <td class="col-md-12 priv"> **V E N T A S** </td>
            </tr>
            <tr class="row">
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_ve_ver">Ver y Agregar Datos
              </td>
              <td class="col-md-6">
                <input type="checkbox" class="check" id="priv_ve_editar">Editar / Eliminar
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      </tr>
      <div class="row justify-content-center modal-footer m-0">
        <div class="col-md-4">
          <button type="submit" id="priv_NuevoRegistroUsuario" class=" NuevoRegistroUsuario btnsub btn w-100">AGREGAR</button>

        </div>
      </div>
    </div>
  </div>
</div>
