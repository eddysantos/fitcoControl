<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">


  <div style="margin-top:120px;padding-right:50px">
    <div class="functions">
      <div class="add">
        <div class="icon">
          <i class="fa fa-plus fa-3x"></i>
        </div>
        <span>Agregar Usuario</span>
      </div>
    </div>
  </div>
  <form class="container page" style="padding:0px;width:1350px;margin-left:-10px">
    <table class="table table-hover">
      <tbody>
        <tr class="row bordelateral m0" id="item">
          <td class="col-md-1">
            <img src="/fitcoControl/Resources/iconos/social.svg" class="icono">
          </td>
          <td class="col-md-4">
            <h4><b>Azeneth Estefania Pinales Avalos</b></h4>
            <a class="visibilidad" href="mailto:ae_pinales@hotmail.com">ae_pinales@hotmail.com</a>
          </td>
          <td class="col-md-1">
            <a href="#"><i class="-alt fa fa-2x fa-eye fa-fw"></i></a>
          </td>
          <td class="col-md-3">
            <h4><b>Asistente de sistemas</b></h4>
            <p class="visibilidad">@stefpinales</p>
          </td>
          <td class="col-md-1">
            <div class="functions">
              <div class="add">
                <div class="icon">
                  <i class="fa fa-trash fa-2x"></i>
                </div>
                <span>Eliminar</span>
              </div>
            </div>
          </td>
          <td class="col-md-1">
            <div class="funcion">
              <div class="add">
                <div class="rotar">
                  <i class="fa fa-trash fa-2x"></i>
                </div>
              </div>
            </div>
          </td>
        </tr>
        <tr class="row bordelateral m0" id="item">
          <td class="col-md-1">
            <img src="/fitcoControl/Resources/iconos/social.svg" class="icono">
          </td>
          <td class="col-md-4">
            <h4><b>Juan Jesus Quintero Velazquez</b></h4>
            <a class="visibilidad" href="mailto:claudia@mail.com">claudia@mail.com</a>
          </td>
          <td class="col-md-1">
            <a href="#"><i class="fa fa-2x fa-fw fa-eye-slash"></i></a>
          </td>
          <td class="col-md-3">
            <h4><b>Supervisora</b></h4>
            <p class="visibilidad">@claudiaramos</p>
          </td>
          <td class="col-md-1 offset-md-1 text-center">
            <div class="funcion">
              <div class="add">
                <div class="rotar">
                  <i class="fa fa-trash fa-2x"></i>
                </div>
              </div>
            </div>
          </td>
          <td class="col-md-1 text-center">
            <div class="funcion">
              <div class="add">
                <div class="rotar">
                  <i class="fa fa-trash fa-2x"></i>
                </div>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
