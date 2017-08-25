<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<link  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/img/bootstrap-colorpicker/alpha.png">

  <div class="mt-100 pr-50">
    <div class="functions">
      <div class="add">
        <div class="icon">
          <i class="fa fa-plus fa-3x"></i>
        </div>
        <a id="addcliente" class="ancla"><span class="span">Agregar Cliente</span></a>
      </div>
    </div>

  </div>

  <form id="clientes" class="page p-0"><!--se quito container fluid-->
    <table class="table table-hover">
      <tbody>
        <tr class="row bordelateral m-0" id="item">
          <td class="col-md-1">
            <img src="/fitcoControl/Resources/iconos/006-team.svg" class="icono">
          </td>
          <td class="col-md-3">
            <h2><b>Liberty</b></h2>
            <a class="visibilidad" href="mailto:liberty@hotmail.com">liberty@hotmail.com</a>
          </td>
          <td class="col-md-3">
            <input type="color" class="form-control p-0" name="" value="">
            <p class="visibilidad">Ingreso : 12/09/2014</p>
          </td>
          <td class="col-md-3"></td>
          <td class="col-1 text-center">
            <div class="funcion">
              <div class="add">
                <div class="rotar">
                  <a href="#EditarCliente" data-toggle="modal"><img src="/fitcoControl/Resources/iconos/edit1.svg" style="width:30px"></i></a>
                </div>
              </div>
            </div>
          </td>
          <td class="col-1 text-center">
            <div class="funcion">
              <div class="add">
                <div class="rotar">
                  <a href="#"><img src="/fitcoControl/Resources/iconos/trash1.svg" style="width:30px"></a>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <tr class="row bordelateral m-0" id="item">
          <td class="col-md-1">
            <img src="/fitcoControl/Resources/iconos/006-team.svg" class="icono">
          </td>
          <td class="col-md-3">
            <h2><b>Privilegio</b></h2>
            <a class="visibilidad" href="mailto:privilegio@gmail.com">privilegio@gmail.com</a>
          </td>
          <td class="col-md-3">
            <input type="color" class="form-control p-0" >
            <p class="visibilidad">Ingreso : 12/03/2010</p>
          </td>
          <td class="col-md-3"></td>
          <td class="col-1 text-center">
            <div class="funcion">
              <div class="add">
                <div class="rotar">
                  <a href="#EditarCliente" data-toggle="modal"><img src="/fitcoControl/Resources/iconos/edit1.svg" style="width:30px"></a>
                </div>
              </div>
            </div>
          </td>
          <td class="col-1 text-center">
            <div class="funcion">
              <div class="add">
                <div class="rotar">
                  <a href="#"><img src="/fitcoControl/Resources/iconos/trash1.svg" style="width:30px"></a>
                </div>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </form>

  <form id="NuevoCliente" class="agregarnuevo" style="display:none"><!--se quito container fluid-->
    <table class="table">
      <tbody>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input class="effect-17" type="text" required>
              <label>Nombre Cliente</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-6 input-effect p-0">
            <input class="effect-17 has-content" type="date" required>
              <label>Fecha Ingreso</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-6 input-effect p-0">
            <input class="effect-17 has-content form-control" type="color" style="border:0px;height:34px" required>
              <label>Color Cliente:</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input class="effect-17" type="text">
              <label>Prendas Solicitadas por Mes</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input class="w-100 effect-17" list="ingr">
            <datalist id="ingr">
              <option value="Referido"></option>
              <option value="Asesor de Ventas"></option>
              <option value="Medios Publicitarios"></option>
            </datalist>
              <label>Como supo de Nosotros?</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row justify-content-center">
          <td class="col-4">
            <button type="button" name="button" class="btn boton btn-block">AGREGAR</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>



  <?php
    $root = $_SERVER['DOCUMENT_ROOT'];
    require $root . '/fitcoControl/Ubicaciones/footer.php';
    require $root . '/fitcoControl/Ubicaciones/Modales/Clientes/EditarCliente.php';
  ?>
