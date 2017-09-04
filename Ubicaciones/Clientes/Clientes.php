<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
  require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";


    $query = "SELECT * FROM ct_cliente ORDER BY nombreCliente ASC";
    $resultado = $conn->query($query);
?>


<div class="mt-100 pr-50">
  <div class="clt_usr mr-5">
    <a id="addcliente" class="rotate-link consultar ancla" accion="acliente" status="cerrado">
      <img src="/fitcoControl/Resources/iconos/003-add.svg" class="icon1 rotate-icon" style="width:30px">
      <span class="span">AGREGAR CLIENTE</span>
    </a>
  </div>

  <form id="clientes" class="page p-0">
    <table class="table table-hover">
      <tbody>
        <?php
          while($row = $resultado->fetch_assoc()){
        ?>
        <tr class="row bordelateral m-0" id="item">
          <td class="col-md-1">
            <img src="/fitcoControl/Resources/iconos/team.svg" class="icono">
          </td>
          <td class="col-md-3">
            <h2><b><input type="color" value="<?php echo $row['colorCliente'];?>"><?php echo $row['nombreCliente'];?></b></h2>
            <p class="visibilidad">Ingreso : <?php echo $row['fingresoCliente'];?></p>
          </td>
          <td class="col-md-4">
            <h2><b>Contacto : <a href="mailto:<?php echo $row['correoCliente'];?>"><?php echo $row['correoCliente'];?></a></b></h2>
            <p class="visibilidad">Credito : <?php echo $row['creditoCliente'];?> Días</p>
          </td>
          <td class="col-md-2"></td>
          <td class="col-md-2 text-center">
            <a href="#"  class="spand-link" data-toggle="modal" data-target="#EditarCliente" id="btnEditarCliente" client-id="<?php echo $row['pk_cliente']?>"><img src="/fitcoControl/Resources/iconos/pencil1.svg" class="spand-icon"></a>


            <a class="spand-link ml-5" onclick="return confirm('¿Estas seguro?');"  href="/fitcoControl/Resources/PHP/Clientes/EliminarCliente.php?pk_cliente=<?php echo $row['pk_cliente']; ?>"><img src="/fitcoControl/Resources/iconos/trash.svg"  class="spand-icon"></a>
          </td>
        </tr>

        <?php
          }
        ?>
      </tbody>
    </table>
  </form>

  <form action="/fitcoControl/Resources/PHP/Clientes/AgregarCliente.php" id="NuevoCliente" class="agregarnuevo" style="display:none" method="POST">
    <table class="table">
      <tbody>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input type="hidden" name="clt_id">
            <input name="clt_nombre" class="effect-17" type="text" required>
              <label>Nombre Cliente</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input name="clt_contacto" class="effect-17" type="text" required>
              <label>Correo del Cliente</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input name="clt_telefono" class="effect-17" type="text" required>
              <label>Telefono del Cliente</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input name="clt_credito" class="effect-17" type="text">
              <label>Credito</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-6 input-effect p-0">
            <input name="clt_fingreso" class="effect-17 has-content" type="date" required>
              <label>Fecha Ingreso</label>
              <span class="focus-border"></span>
          </td>
          <td class="col-md-1"></td>
          <td class="col-md-5 input-effect p-0">
            <input name="clt_color" class="w-100 effect-17 has-content form-control" type="color" style="border:0px;height:34px" required>
              <label>Color Cliente:</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input name="clt_prendas" class="effect-17" type="text">
              <label>Prendas Solicitadas por Mes</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row m20">
          <td class="col-md-12 input-effect p-0">
            <input name="clt_nosotros" class="w-100 effect-17" list="ingr">
            <datalist id="ingr">
              <option value="Referido">Referido</option>
              <option value="Asesor de Ventas">Asesor de Ventas</option>
              <option value="Medios Publicitarios">Medios Publicitarios</option>
            </datalist>
              <label>Como supo de Nosotros?</label>
              <span class="focus-border"></span>
          </td>
        </tr>
        <tr class="row justify-content-center">
          <td class="col-md-4">
            <button type="submit" name="clt_button" class="btnsub btn boton btn-block ">AGREGAR</button>
          </td>
        </tr>
      </tbody>
    </table>
  </form>


<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/Modales/Clientes/EditarCliente.php';
  require $root . '/fitcoControl/Resources/PHP/Clientes/pieClientes.php';
  require $root . '/fitcoControl/Ubicaciones/Modales/Clientes/ActualizarDatos.php';
?>
