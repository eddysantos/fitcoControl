<?php
  session_start();

  if (!isset($_SESSION['user'])) {
    header("Location: /fitcoControl/index.php");
  }
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
  $fecha_reg =  date("Y-m-d h:i:s");
?>

<?php if ($pro_invVer == 1 || $admin): ?>
<div class="container-fluid pl-75 pr-57">
  <div class="row clt_usr mt-4">


    <div class="col align-self-end">
      <a id="addcliente" class="rotate-link consultar ancla" accion="ainventario" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/clientes.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanA">Agregar</span>
      </a>

      <a class="rotate-link buscador ancla"  accion="busc" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="effect-17 real-time-search" type="text" id="busqueda" name="search"  placeholder="Buscar..." table-body="#tablaInventario" action="mostrar"></span>
      </a>
    </div>
  </div>
</div>


  <!--MOSTRAR TABLA  -->
  <form id='inventario' class='page p-0'>
    <table class='table table-hover fixed-table'>
      <thead>
        <tr class='row m-0 encabezado text-center font12'>
          <td class='col-md-3'>PROVEEDOR -- CODIGO</td>
          <td class='col-md-3'>INFO DE TELA</td>
          <td class='col-md-1'>METROS</td>
          <td class='col-md-1'>UTILIZADO</td>
          <td class='col-md-1'>RESTANTE</td>
          <td class='col-md-2'>FOLIO CORTE</td>
          <td class='col-md-1'></td>
        </tr>
      </thead>
      <tbody id="tablaInventario" class="font12">
        <tr>
          <td colspan="9">No hay resultados</td>
        </tr>
      </tbody>
    </table>
  </form>

  <form  id="NuevoRegistro" class="agregarnuevo" style="margin-bottom:80px;display:none">
    <table class="table">
      <tbody>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input type="hidden" id="_usuario_reg" value="<?php echo $_SESSION['user']['nombreUsuario']; ?>">
            <input type="hidden" id="_fecha_reg" value="<?php echo $fecha_reg; ?>">
            <input id="_cod_proveedor" class="effect-17" type="text" required>
              <label>Codigo Proveedor</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="_proveedor" class="effect-17" type="text" required>
              <label>Proveedor</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="_color" class="effect-17" type="text" required>
              <label>Color</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-6 input-effect p-0">
            <input id="_composicion" class="effect-17" type="text" required>
              <label>Composición</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-1"></td>
          <td class="col-md-5 input-effect p-0">
            <input id="_ancho" class="effect-17" type="text" required>
              <label>Ancho</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-6 input-effect p-0">
            <input id="_precio" class="effect-17 importeClass" type="text" required>
              <label>Precio</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-1"></td>
          <td class="col-md-5 input-effect p-0">
            <input id="_metros" class="effect-17" type="text" required>
              <label>Metros</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="_folio_corte" class="effect-17" type="text" required>
              <label>Folio Corte</label>
              <span class="focus-border"></span>
          </td>
        </tr>

        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="_fecha" class="effect-17 has-content" type="date">
              <label>Fecha</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row justify-content-center">
          <td class="col-md-4">
            <button type="submit" id="agregar" class="btnsub btn boton btn-block">AGREGAR</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>


<?php else:?>
  <div id='SinRegistros' class='container-fluid pantallaRegistros'>
    <div class='tituloSinRegistros' style="font-size:25px; color:red">SOLICITA PERMISO PARA ENTRAR EN ESTA SECCIÓN</div>
  </div>
<?php endif; ?>



<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/inventario/modales/inventario.php';
  require $root . '/fitcoControl/Ubicaciones/inventario/actions/footer.php';
?>
