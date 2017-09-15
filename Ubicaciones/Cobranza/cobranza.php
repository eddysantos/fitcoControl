<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
  require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
?>

<div class="container">

  <div class="links mt-5 mb-5">
    <a class="rotate-link  ver ancla" accion="acobranza" status="cerrado">
      <img src="/fitcoControl/Resources/iconos/003-analytics-2.svg" class="icon rotate-icon" style="width:30px">
      <span class="spanA">Agregar Cobranza</span>
    </a>

    <a class="ml-3 rotate-link  ver ancla" accion="dcobranza" status="cerrado"  data-toggle='modal' data-target='#ModalGraficaCobranza'>
      <img src="/fitcoControl/Resources/iconos/grafica2.svg" class=" icon rotate-icon" style="width:30px">
      <span class="spanD">Detalle de Cobranza</span>
    </a>



    <form id="Ecobranza" class="page p-0">
      <table class="table table-hover table-fixed">
        <thead>
          <tr class="row m-0 encabezado">
            <td class="col-md-1"></td>
            <td class="col-md-3 text-center">
              <h3>CLIENTE</h3>
            </td>
            <td class="col-md-2 text-center">
              <h3>FACTURA</h3>
            </td>
            <td class="col-md-2 text-center">
              <h3>IMPORTE</h3>
            </td>
            <td class="col-md-2 text-center">
              <h3>VENCIMIENTO</h3>
            </td>
          </tr>
        </thead>
        <tbody id="mostrarCobranza"></tbody>
      </table>
    </form>

    <!-- <form id="cobranza" class="page p-0" style="display:none">
      <table class="table table-hover table-fixed">

      </table>
    </form> -->


    <form  id="Agregarcobranza"  class="agregarnuevo" style="display:none">
      <table class="table">
        <tbody>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input type="text" id="cbz_id" style="display:none">
              <input id="cbz_cliente" class="w-100 effect-17" list="clientes" required autocomplete="off">
              <datalist id="clientes">
                <?php
                  $query = "SELECT * FROM ct_cliente";
                  $resulclientes = $conn->query($query);
                  while ($row = $resulclientes->fetch_array()) {
                 ?>
                <option value="<?php echo $row['pk_cliente']; ?> ">
                  <?php echo $row['nombreCliente']; ?>
                </option>

                <?php } ?>

              </datalist>
                <label>Cliente</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input id="cbz_factura" class="effect-17" type="text" required>
                <label>Factura</label>
                <span class="focus-border"></span>
            </td>
          </tr>
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input id="cbz_importe" class="effect-17" type="text" required>
                <label>Importe</label>
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




<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/Cobranza/ModalGraficaCobranza.php';
  require $root . '/fitcoControl/Ubicaciones/Modales/Cobranza/ModalCobranza.php';
  require $root . '/fitcoControl/Resources/PHP/Cobranza/pieCobranza.php';
?>
