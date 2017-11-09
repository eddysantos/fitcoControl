
<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}

  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
  require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
?>



<div class="clt_usr  mr-5 mt-5">
  <a class="rotate-link consultar ancla" style="font-size: larger;" accion="eproduccion" status="cerrado">
    <img src="/fitcoControl/Resources/iconos/pencil1.svg" class="icon rotate-icon" style="width:30px;">
    <span class="spanP">Editar Producción</span>
  </a>
</div>


<div class="p-5" id="visualizarProduccion"></div>

<div class="container align-items-center">

  <div class="colapso p-0" id="tablaProduccion" style="display:none">
    <a class="boton-colapso d-flex p-3" data-toggle="collapse" href="#colapsoTablaProduc">
      <h3>| Tabla de Programación</h3>
    </a>
    <div class="collapse show" id="colapsoTablaProduc">
      <div class="card-1 card-block mt-2">
        <form class="p-0" id="">
          <table class="table table-hover fixed-program">
            <thead>
              <tr class="row m-0 text-center encabezado" style="border-bottom:2px solid #ccc">
              <td class="col-md-1"></td>
              <td class="col-md-3">CLIENTE</td>
              <td class="col-md-2">FECHA INICIO</td>
              <td class="col-md-2">FECHA FINAL</td>
              <td class="col-md-2">PIEZAS REQUERIDAS</td>
              <td class="col-md-1"></td>
              <td class="col-md-1"></td>
              </tr>
            </thead>
            <tbody id="MostrartablaProduccion">

            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>


  <div class="align-items-center">
    <div class="colapso mt-3">
      <a class="boton-colapso d-flex p-2" data-toggle="collapse" href="#colapsoNuevaProduc">
        <h3>| Programar Nueva Producción</h3>
      </a>
      <div class="collapse show" id="colapsoNuevaProduc">
        <div class="card-1 card-block mt-5">
          <form id="NuevaProg">
            <table class="table">
              <tbody>
                <tr class="row m20">
                  <td class="col-md-12 input-effect p-0">
                    <input class="effect-17" type="text" id="npClientName">
                      <label>Cliente</label>
                      <span class="focus-border"></span>
                      <div class="client-list" id="npClientList" style="display: none">
                      </div>
                  </td>
                </tr>
                <tr class="row m20 mt-40">
                  <td class="col-md-3 input-effect p-0">
                    <input class="effect-17 has-content w-100" type="date" required id="produccionFI">
                      <label>Fecha de Inicio</label>
                      <span class="focus-border"></span>
                  </td>
                  <td class="col-md-1"></td>
                  <td class="col-md-3 input-effect p-0">
                    <input class="effect-17 has-content w-100" type="date" required id="produccionFF">
                      <label>Fecha Final</label>
                      <span class="focus-border"></span>
                  </td>
                  <td class="col-md-1"></td>
                  <td class="col-md-2 input-effect p-0">
                    <input class="effect-17" type="text" id="produccionPZ">
                      <label>Piezas Requeridas</label>
                      <span class="focus-border"></span>
                  </td>
                </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
    <div class="mt-5 row justify-content-center">
      <div class="col-md-6 mt-3 mb-2">
        <a class="linkboton agregar-programacion btn-block">AGREGAR<span class="top"></span></a>
      </div>
    </div>
  </div>
</div>


<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/Produccion/EditarProduccion.php';
  require $root . '/fitcoControl/Resources/PHP/Programacion/pieProgramacion.php';
?>
