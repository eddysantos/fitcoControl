<?php
  session_start();

  if (!isset($_SESSION['user'])) {
    header("Location: /fitcoControl/index.php");
  }
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
?>

<?php if ($c_ver == 1 || $admin): ?>
<div class="container-fluid pl-75 pr-57">
  <div class="row clt_usr mt-4">
    <!-- <div class="text-left alert alert-info w-75" role="alert" >
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Nota: </strong> La función de esta sección es llevar el registro de los datos de nuestros clientes para mayor accesibilidad, en el icono <img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='iconoNota'> se podra editar la información del cliente en caso de que asi se requiera.
      En el icono <img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='iconoNota'> se eliminaría la información del cliente de manera permanente.
    </div> -->


    <div class="col align-self-end">
      <a id="addcliente" class="rotate-link consultar ancla" accion="acliente" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/clientes.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanA">Agregar Cliente</span>
      </a>

      <!-- <a class="rotate-link buscador ancla" accion="busc" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="buscar" type="text" name="busqueda"  id="busqueda" placeholder="Buscar"></span>
      </a> -->


      <a class="rotate-link buscador ancla"  accion="busc" status="cerrado">
        <img src="/fitcoControl/Resources/iconos/search.svg" class="icon rotate-icon" style="width:30px">
        <span class="spanB"><input class="effect-17 real-time-search" type="text" id="busqueda" name="search"  placeholder="Buscar..." table-body="#tablaClientes" action="mostrar"></span>
      </a>
    </div>
  </div>
</div>

  <!-- <div class="container-fluid mt-4">
    <section id="mostrarClientes"></section>
  </div> -->


  <!--MOSTRAR TABLA  -->
  <form id='Eclientes' class='page p-0'>
    <table class='table table-hover fixed-table'>
      <thead>
        <tr class='row m-0 encabezado'>
          <td class='col-md-1'></td>
          <td class='col-md-3 text-center'><h3>CLIENTE</h3></td>
          <td class='col-md-4 text-center'><h3>CORREO / CONTACTO</h3></td>
          <td class='col-md-2 text-center'><h3>TELEFONO</h3></td>
          <td class='col-md-2'></td>
        </tr>
      </thead>
      <tbody id="tablaClientes" class="font12">
        <tr>
          <td colspan="9">No hay resultados</td>
        </tr>
      </tbody>
    </table>
  </form>

  <form  id="NuevoCliente" class="agregarnuevo" style="display:none;margin-bottom:80px">
    <table class="table">
      <tbody id="AgregarCliente">
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <!-- <input type="hidden" name="clt_id"> -->
            <input id="clt_nombre" class="effect-17" type="text" required>
              <label>Nombre Cliente</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="clt_ncontacto" class="effect-17" type="text" required>
              <label>Nombre del Contacto</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="clt_contacto" class="effect-17 w-100" type="text" required>
              <label>Correo del Cliente</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-6 input-effect p-0">
            <input id="clt_telefono" class="effect-17 numeroClass" type="text" required>
              <label>Telefono del Cliente</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-1"></td>
          <td class="col-md-5 input-effect p-0">
            <input id="clt_credito" class="effect-17 numeroClass" type="text" required>
              <label>Credito</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-6 input-effect p-0">
            <input id="clt_fingreso" class="effect-17 has-content" type="date" required>
              <label>Fecha Ingreso</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-1"></td>
          <td class="col-md-5 input-effect p-0">
            <input id="clt_color" class="w-100 effect-17 has-content form-control border-0" type="color" style="height:34px" required>
              <label>Color Cliente:</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="clt_prendas" class="effect-17 numeroClass" type="text" required>
              <label>Prendas Solicitadas por Mes</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="clt_precio" class="effect-17 importeClass" type="text" required>
              <label>Precio por prendas sin tela</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="clt_nosotros" class="w-100 effect-17" list="ingr" required>
            <datalist id="ingr">
              <option value="Referido">Referido</option>
              <option value="Asesor de Ventas">Asesor de Ventas</option>
              <option value="Medios Publicitarios">Medios Publicitarios</option>
            </datalist>
              <label>Como supo de Nosotros?</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input id="clt_vendedor" class="effect-17" type="text">
              <label>Nombre Vendedor</label>
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
  require $root . '/fitcoControl/Ubicaciones/Clientes/modales/EditarCliente.php';
  require $root . '/fitcoControl/Ubicaciones/Clientes/actions/pieClientes.php';
?>
