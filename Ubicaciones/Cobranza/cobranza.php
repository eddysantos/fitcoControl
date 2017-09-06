<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
  require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
?>

<div class="mt-100 pr-50" style="padding-right:50px">



  <div class="links  mr-5">
    <a class="rotate-link  ver ancla" accion="acobranza" status="cerrado">
      <img src="/fitcoControl/Resources/iconos/003-add.svg" class="icon rotate-icon"   style="width:30px">
      <span class="spanA">Agregar Cobranza</span>
    </a>

    <a class="ml-3 rotate-link  ver ancla" accion="dcobranza" status="cerrado">
      <img src="/fitcoControl/Resources/iconos/002-user-database.svg" class=" icon rotate-icon"   style="width:30px">
      <span class="spanD">Detalle de Cobranza</span>
    </a>
  </div>

  <form id="Ecobranza" class="page p-0" style="margin-top:130px">
    <table class="table table-hover">
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
    </table>
  </form>

  <form id="cobranza" class="page p-0" style="margin-top:180px">
    <table class="table table-hover table-fixed">
      <tbody id="mostrarCobranza">

      </tbody>
    </table>
  </form>


  <!--form id="Detallecobranza" class="consultarmes" style="display:none">
    <div>
      <div class="card">
        <div class="card-header">
          <div class="mb-0 boton-colapso">

            | <input name="meses" class="listames effect-17" list="meses" required>
            <datalist id="meses">
              <!?php
                while ($row = $resulmeses->fetch_array()) {
               ?>
              <option value="<!?php echo $row['mes']; ?> ">
                <!?php echo $row['id']; ?>
              </option>

              <!?php } ?>

            </datalist>
            <a class="boton-colapso" data-toggle="collapse" data-parent="#accordion" href="#colapsoAgosto">
                ($Total del mes)

            </a>
          </div>
        </div>
        <div id="colapsoAgosto" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
          <div class="card-block">
            <table class="table">
              <tr class="row m-0 semanas">
                <td class="col-md-1"></td>
                <td class="col-md-2">SEMANA 1</td>
                <td class="col-md-2">SEMANA 2</td>
                <td class="col-md-2">SEMANA 3</td>
                <td class="col-md-2">SEMANA 4</td>
                <td class="col-md-2">SEMANA 5</td>
                <td class="col-md-1"></td>
              </tr>
              <tr class="row m-0">
                <td class="col-md-1"></td>
                <td class="col-md-2"><input type="color"> $</td>
                <td class="col-md-2"><input type="color"> $</td>
                <td class="col-md-2"><input type="color"> $</td>
                <td class="col-md-2"><input type="color"> $</td>
                <td class="col-md-2"><input type="color"> $</td>
                <td class="col-md-1"></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </form-->


  <form  id="Agregarcobranza" onsubmit="return false;" class="agregarnuevo" style="display:none">
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


<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/Cobranza/ModalCobranza.php';
  require $root . '/fitcoControl/Resources/PHP/Cobranza/pieCobranza.php';
?>
