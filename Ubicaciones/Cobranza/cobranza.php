<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
  require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
  require $root . "/fitcoControl/Resources/PHP/Cobranza/querysCobranza.php";

?>

<div class="mt-100 pr-50" style="padding-right:50px">



  <div class="links  mr-5">
    <a id="addcobranza" class="rotate-link consultar ancla" accion="acobranza">
      <img src="/fitcoControl/Resources/iconos/003-add.svg" class="icon rotate-icon"   style="width:30px">
      <span class="spanA">Agregar Cobranza</span>
    </a>

    <a id="detcobranza" class="ml-3 rotate-link consultar ancla" accion="dcobranza">
      <img src="/fitcoControl/Resources/iconos/002-user-database.svg" class=" icon rotate-icon"   style="width:30px">
      <span class="spanD">Detalle de Cobranza</span>
    </a>
  </div>

<form id="cobranza" class="page p-0" style="margin-top:100pxw">
  <table class="table table-hover">
    <tbody>

      <?php
        while($row = $resulcobranza->fetch_assoc()){
      ?>

      <tr class="row  bordelateral m-0" id="item">
        <td class="col-md-1">
          <img src="/fitcoControl/Resources/iconos/dinero.svg" class="icono">
        </td>
        <td class="col-md-2">

          <h4><b><input type="color" name="" value="<?php echo $row['color']; ?>"><?php echo $row['cliente']; ?></b></h4>
          <a class="visibilidad"><?php echo $row['credito']; ?> Días</a>
        </td>
        <td class="col-md-2">
          <h4><b>Factura : <?php echo $row['factura']; ?></b></h4>
        </td>
        <td class="col-md-2">
          <h4><b>Importe : $<?php echo number_format($row['importe'],2); ?></b></h4>
        </td>
        <td class="col-md-3">
          <h4><b>Día Vencimiento : <?php echo $row['dia_vencimiento']; ?></b></h4>
        </td>

        <td class="col-md-2 text-center">
          <!--EDITAR EDITAR EDITAR EDITAR-->
          <a href="" class="rotate-link" data-toggle="modal" data-target="#DetCobranza"><img src="/fitcoControl/Resources/iconos/pencil1.svg" class="rotate-icon"   style="width:30px"></a>
          <!--ELIMINAR ELIMINAR ELIMINAR ELIMINAR-->
          <a class="rotate-link ml-5" onclick="return confirm('¿Estas seguro?');"  href="/fitcoControl/Resources/PHP/Cobranza/eliminarCobranza.php?id=<?php echo $row['id']; ?>"><img src="/fitcoControl/Resources/iconos/trash.svg" style="width:30px" class="rotate-icon"></a>
        </td>
      </tr>


      <?php
        $suma += $row['importe'];
        }
      ?>

      <tr class="row m-0 mt-5">
        <td class="col-md-12 text-center"><b>Total : $ <?php echo number_format($suma,2); ?></b></td>
      </tr>

    </tbody>
  </table>
</form>






<form id="Detallecobranza" class="consultarmes" style="display:none">
  <div >
    <div class="card">
      <div class="card-header">
        <div class="mb-0 boton-colapso">

          | <input name="meses" class="listames effect-17" list="meses" required>
          <datalist id="meses">
            <?php
              while ($row = $resulmeses->fetch_array()) {
             ?>
            <option value="<?php echo $row['mes']; ?> ">
              <?php echo $row['id']; ?>
            </option>

            <?php } ?>

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
              <td class="col-md-2"><input type="color" name="" value="<?php echo $row['color']; ?>"> $<?php echo number_format($row['importe'],2); ?></td>
              <td class="col-md-2"><input type="color" name="" value="<?php echo $row['color']; ?>"> $<?php echo number_format($row['importe'],2); ?></td>
              <td class="col-md-2"><input type="color" name="" value="<?php echo $row['color']; ?>"> $<?php echo number_format($row['importe'],2); ?></td>
              <td class="col-md-2"><input type="color" name="" value="<?php echo $row['color']; ?>"> $<?php echo number_format($row['importe'],2); ?></td>
              <td class="col-md-2"><input type="color" name="" value="<?php echo $row['color']; ?>"> $<?php echo number_format($row['importe'],2); ?></td>
              <td class="col-md-1"></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</form>



<form action="/fitcoControl/Resources/PHP/Cobranza/operacion_agregar.php" id="Agregarcobranza" class="agregarnuevo" style="display:none" method="POST">
  <table class="table">
    <tbody>

      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input type="text" name="cbz_id" style="display:none">
          <input name="cbz_cliente" class="w-100 effect-17" list="clientes" required>
          <datalist id="clientes">
            <?php
              while ($row = $resulclientes->fetch_array()) {
             ?>
            <option value="<?php echo $row['nombre']; ?> ">
              <?php echo $row['nombre']; ?>
            </option>

            <?php } ?>

          </datalist>
            <label>Cliente</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input name="cbz_factura" class="effect-17" type="text" required>
            <label>Factura</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input name="cbz_importe" class="effect-17" type="text" required>
            <label>Importe</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      <tr class="row m20">
        <td class="col-md-12 input-effect p-0">
          <input name="cbz_dvencimiento" class="effect-17 has-content" type="date" required>
            <label>Día Vencimiento</label>
            <span class="focus-border"></span>
        </td>
      </tr>
      </tr>
      <tr class="row justify-content-center mb-3">
        <td class="col-md-4">
          <button type="submit" name="button" class="btnsub btn boton btn-block ">AGREGAR</button>
        </td>
      </tr>
    </tbody>
  </table>
</form>
</div>







<?php
  $root = $_SERVER['DOCUMENT_ROOT'];
  require $root . '/fitcoControl/Ubicaciones/footer.php';
  require $root . '/fitcoControl/Ubicaciones/Modales/Cobranza/ModalCobranza.php';
?>
