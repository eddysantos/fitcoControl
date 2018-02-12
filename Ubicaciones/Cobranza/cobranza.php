<?php
session_start();

if (!isset($_SESSION['user'])) {
  header("Location: /fitcoControl/index.php");
}
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
  require $root . '/fitcoControl/Resources/PHP/DataBases/Conexion.php';

?>

<div class="container">

  <div class="clt_usr mt-5 mb-5">
    <a class="rotate-link consultar ancla" accion="acobranza" status="cerrado">
      <img src="/fitcoControl/Resources/iconos/003-analytics-2.svg" class="icon rotate-icon" style="width:30px">
      <span class="spanA">Agregar Factura</span>
    </a>
    <a class="ml-3 rotate-link consultar ancla" data-toggle='modal' data-target='#ModalGraficaCobranza'>
      <img src="/fitcoControl/Resources/iconos/grafica2.svg" class=" icon rotate-icon" style="width:30px">
      <span class="spanD">Grafica Cobranza</span>
    </a>
    <a class="ml-3 rotate-link consultar ancla" accion="btesoreria" status="cerrado">
      <img src="/fitcoControl/Resources/iconos/search.svg" class=" icon rotate-icon" style="width:30px">
      <span class="spanB"><input class="buscar" type="text" name="busqueda"  id="busqueda"></span>
    </a>

    <div class="container-fluid mt-3" style="max-width:1300px">
      <section id="mostrarCobranza"></section>
    </div>




    <form  id="Agregarcobranza"  class="agregarnuevo" style="display:none">
      <table class="table">
        <tbody>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input type="text" id="cbz_id" style="display:none">
              <td class="col-md-12 input-effect p-0">
                <input class="effect-17" type="text" id="npClientName" required autocomplete="off">
                  <label>Cliente</label>
                  <span class="focus-border"></span>
                  <div class="client-list" id="npClientList" style="display: none">
                  </div>
              </td>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input id="cbz_factura" class="effect-17" type="text" required>
                <label>No. Factura</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input id="cbz_importe" class="effect-17" type="text" required>
                <label>$ Importe</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input id="cbz_dvencimiento" class="effect-17 has-content" type="date" required>
                <label>Día Vencimiento</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          </tr>
          <tr class="row justify-content-center m-0 mb-2 mt-5">
            <td class="col-md-4">
              <button type="submit" id="NuevoRegistroCobranza" class="btnsub btn boton btn-block ">AGREGAR</button>
            </td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>

<!-- <script type="text/javascript">
  $(function(){
    $('#cbz_dvencimiento').datetimepicker();
  });
</script> -->
<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/Cobranza/ModalGraficaCobranza.php';
  require $root . '/fitcoControl/Ubicaciones/Modales/Cobranza/ModalCobranza.php';
  require $root . '/fitcoControl/Ubicaciones/Modales/Cobranza/ModalPagos.php';
  require $root . '/fitcoControl/Resources/PHP/Cobranza/pieCobranza.php';
?>
