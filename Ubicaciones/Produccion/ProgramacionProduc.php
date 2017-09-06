
<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

  <link rel="stylesheet" href="/fitcoControl/Resources/css/agregarProduccion.css">
</head>

<div class="p-5" id="visualizarProduccion">

</div>

<div class="container-fluid" style="width:1050px">

  <div class="colapso">
    <a class="boton-colapso d-flex p-2" data-toggle="collapse" href="#colapsoNuevaProduc">
      <h3>| Programar Nueva Producción</h3>
    </a>
    <div class="collapse show" id="colapsoNuevaProduc">
      <div class="card-1 card-block mt-5">
        <form>
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="effect-17" type="text" id="npClientName">
                    <label>Cliente</label>
                    <span class="focus-border"></span>
                    <div class="client-list" id="npClientList" style="display: none;">
                    </div>
                </td>
                <!-- <td class="col-md-1"></td>
                <td class="col-md-5 input-effect p-0">
                  <input class="effect-17" type="text">
                    <label>Lider de Producción</label>
                    <span class="focus-border"></span>
                </td> -->
              </tr>
              </tr>
              <tr class="row m20 mt-40">
                <td class="col-md-3 input-effect p-0">
                  <input class="effect-17 has-content w-100" type="date" required id="produccionFI">
                    <label>Fecha de Inicio</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-2"></td>
                <td class="col-md-3 input-effect p-0">
                  <input class="effect-17 has-content w-100" type="date" required id="produccionFF">
                    <label>Fecha Final</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-2"></td>
                <td class="col-md-2 input-effect p-0">
                  <input class="effect-17" type="text" id="produccionMD">
                    <label>Meta Diaria</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </div>

  <!-- <div class="colapso mt-4">
    <a class="boton-colapso d-flex p-2" data-toggle="collapse" href="#colapsodatosCliente">
      <h2 class="dos">| Datos del Cliente</h2>
    </a>
    <div class="collapse show" id="colapsodatosCliente">
      <div class="card-1 card-block mt-5">
        <form>
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-6 input-effect p-0">
                  <input class="effect-17" type="text">
                    <label>Nombre del Cliente</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-2 input-effect p-0">
                  <input class="effect-17" type="text">
                    <label>Prioridad</label>
                    <span class="focus-border"></span>
                </td>
                <td class="col-md-1"></td>
                <td class="col-md-2 input-effect p-0">
                  <input class="effect-17" type="text">
                    <label>Piezas Solicitadas</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              </tr>
            </tbody>
          </table>
        </form>

      </div>
    </div>
  </div> -->
  <div class="mt-5 row justify-content-center">
    <div class="col-md-6 mt-5">
      <a class="linkboton agregar-programacion btn-block">AGREGAR<span class="top"></span></a>
    </div>
    <div class="col-md-6 mt-5">
      <!--a href="/fitcoControl/Ubicaciones/Produccion/ConsultarProgramacion.php" class="linkboton btn-block">VISUALIZAR PROGRAMACIÓN<span class="top"></span></a-->
      <a class="linkboton btn-block" id="previewProgram">VISUALIZAR PROGRAMACIÓN<span class="top"></span></a>
    </div>
  </div>
</div>


<script src="/fitcoControl/Resources/js/Inputs.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="/fitcoControl/Resources/js/Produccion/graficaAgregarProduccion.js"></script>
<script type="text/javascript" src="/fitcoControl/Resources/js/Produccion/programacionProduccion.js"></script>
