
<div class="modal fade" id="coment">
  <div class="modal-dialog modal-med1">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">COMENTARIOS</h5>
      </div>
      <div class="modal-body">

        <table class="table">
          <tr class="row m20">
            <td class="col-md-3 input-effect p-0">
              <input type="hidden"  id="com_id">
              <input class="modal-efecto-17 has-content" id="com_fecha" type="date">
                <label for="com_fecha">Fecha</label>
                <span class="focus-border"></span>
            </td>
            <td class="col"></td>
            <td class="col-md-7 input-effect p-0">
              <input class="modal-efecto-17 has-content" id="com_comentario" type="text">
                <label for="com_comentario">Comentario</label>
                <span class="focus-border"></span>
            </td>
            <td class="col-md-1 p-0">
              <a href='' id="comCobranza" class='comCobranza'><img src='/fitcoControl/Resources/iconos/003-add.svg' class='w-50 spand-icon'></a>
            </td>
          </tr>
        </table>

        <div class="mt-5" style="border: 1px solid #ccc;border-radius: 9px;">
          <table class="table">
            <thead>
              <tr class="row encabezado m-0">
                <td class='col-md-3 text-center'>
                  <h4><b>FECHA</h4>
                </td>
                <td class='col-md-8 text-center'>
                  <h4><b>COMENTARIOS</b></h4>
                </td>
                <td class='col-md-1 text-center'></td>
              </tr>
            </thead>
            <tbody id="comentariosCobranza"></tbody>
          </table>
        </div>
      </div><!--termina el Cuerpo del Modal-->
      <!-- <div class="justify-content-center modal-footer">
        <button  id="comCobranza" type="submit" class="comCobranza w-50 btnsub btn boton btn-block ">AGREGAR</button>
      </div> -->
    </div><!--termina el COntenido del Modal-->
  </div>
</div>




<div class="modal fade" id="edit_coment">
  <div class="modal-dialog modal-med1">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">COMENTARIOS</h5>
      </div>
      <div class="modal-body">

        <table class="table">
          <tr class="row m20">
            <td class="col-md-3 input-effect p-0">
              <input type="hidden"  id="ed_com_id">
              <input class="modal-efecto-17 has-content" id="ed_com_fecha" type="date">
                <label for="ed_com_fecha">Fecha</label>
                <span class="focus-border"></span>
            </td>
            <td class="col"></td>
            <td class="col-md-7 input-effect p-0">
              <input class="modal-efecto-17 has-content" id="ed_com_comentario" type="text">
                <label for="ed_com_comentario">Comentario</label>
                <span class="focus-border"></span>
            </td>
          </tr>
        </table>

      </div><!--termina el Cuerpo del Modal-->
      <div class="justify-content-center modal-footer">
        <button  id="EditcomCobranza" type="submit" class="EditComCobranza w-50 btnsub btn boton btn-block ">ACTUALIZAR</button>
      </div>
    </div><!--termina el COntenido del Modal-->
  </div>
</div>
