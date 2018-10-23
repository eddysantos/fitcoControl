<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';


$queryMes = "SELECT * FROM vendedores";
$stmt = $conn->prepare($queryMes);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}
if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query execution [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}
$rslt = $stmt->get_result();
$rows = $rslt->num_rows;

if ($rows > 0) {
  $option = "<option db-id='' selected>Todos</option>";
  while ($row = $rslt->fetch_assoc()) {
    $pk_vendedor = $row['pk_vendedor'];
    $nombre = $row['nombreVendedor'];

    $option .= '<option db-id="'.$pk_vendedor.'">'.$nombre.'</option>';
  }
}
 ?>

<div class="modal fade" id="ModalGraficaVentas">
  <div class="modal-dialog modal-grande">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">GRAFICO VENTAS / GANANCIAS POR MES</h5>
      </div>
      <div class="modal-body pt-0">
        <div class="row submenuMed">
          <ul class="nav nav-pills nav-fill" id="selectGrafica" style="width: 100%;">
            <li class="nav-item">
              <a class="nav-link vent" id="submenuchico" accion="semanalVen">Grafica Semanal</a>
            </li>
            <li class="nav-item">
              <a class="nav-link vent" id="submenuchico" accion="mensualVen">Grafica Mensual</a>
            </li>
          </ul>
        </div>

        <div class="graficasVentasMensual" style="display:none">
          <table class="table">
            <tr class="row">
              <td class="col-md-3 w-100">
                <select id="selectVentas" class="selectVentas c-select w-100">
                  <?php echo $option; ?>
                  </option>
                </select>
              </td>
            </tr>
          </table>
          <div id="graficasVentasMensual"></div>
        </div>
        <div class="graficasVentasSemanal" style="display:none">
          <table class="table">
            <tr class="row">
              <td class="col-md-3 w-100">
                <select id="selectVentasSemana" class="selectVentasSemana c-select w-100">
                  <?php echo $option; ?>
                  </option>
                </select>
              </td>
            </tr>
          </table>
          <div id="graficasVentasSemanal"></div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="EditarVentas">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">EDITAR DATOS VENTA</h5>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <table class="table">
            <tbody>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input type="hidden" id="pk_ventas" db-id="">
                  <input class="modal-efecto-17 has-content" id="nombreCliente" type="text">
                    <label>Nombre Cliente</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" id="nombreVendedor" type="text">
                    <label>Nombre Vendedor</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content numeroClass" id="numeroPrendas" type="text">
                    <label>No. de Prendas</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content importeClass" id="precioXprenda" type="text">
                    <label>Precio por Prenda</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" id="acuerdoPago" type="text">
                    <label>Acuerdo de Pago</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content" id="fechaIngreso" type="date">
                    <label>Fecha de Ingreso</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
              <tr class="row m20">
                <td class="col-md-12 input-effect p-0">
                  <input class="modal-efecto-17 has-content w-100" id="fechaBaja" type="date">
                    <label>Fecha de Baja</label>
                    <span class="focus-border"></span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="ActualizarVenta" type="submit" class="ActualizarVenta w-50 btnsub btn boton btn-block">ACTUALIZAR</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="ModalAddVendedor">
  <div class="modal-dialog modal-med">
    <div class="modal-content">
      <div class="modal-header">
        <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
          <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
        </button>
        <h5 class="modal-tittle">Agregar Vendedor</h5>
      </div>
      <div class="modal-body">
        <table class="table">
          <tr class="row m20">
            <td class="col-md-12 input-effect p-0">
              <input class="modal-efecto-17  w-100" id="nVendedor" type="text">
                <label for="nVendedor">Nombre del Vendedor</label>
                <span class="focus-border"></span>
            </td>
          </tr>
        </table>
      </div>
      <div class="justify-content-center modal-footer">
        <button id="add-Vendedor" type="submit" class="addVendedor w-50 btnsub btn boton btn-block">Agregar</button>
      </div>
    </div>
  </div>
</div>
