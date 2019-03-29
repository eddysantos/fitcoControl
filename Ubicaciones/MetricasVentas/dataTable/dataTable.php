<?php
 // session_start();
 //
 // if (!isset($_SESSION['user'])) {
 //   header("Location: /fitcoControl/index.php");
 // }
   $root = $_SERVER['DOCUMENT_ROOT'];
   require $root . '/fitcoControl/Ubicaciones/barraNavegacion.php';
   // require $root . '/fitcoControl/Ubicaciones/Cobranza/Datatable/modalDataTable.php';
   // require $root . '/fitcoControl/Ubicaciones/Modales/Cobranza/ModalGraficaCobranza.php';
   // require $root . '/fitcoControl/Ubicaciones/Modales/Cobranza/ModalPagos.php';
 ?>

 <!-- <div class="container-fluid pl-75 pr-57">
   <div class="row clt_usr mt-4">
     <div class="text-left alert alert-info w-65" role="alert" >
       <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <strong>Nota: </strong> En esta sección se podran registrar las facturas que nos van a pagar, se podra editar en <img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='iconoNota'> y eliminar registro en <img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='iconoNota'>. Adicional se podra agregar un pago completo de la factura o un abono  en el icono <img src='/fitcoControl/Resources/iconos/003-add.svg' class='iconoNota'> y se podra ver el desglose de pagos que nos ha realizado el cliente en este icono <img src='/fitcoControl/Resources/iconos/magnifier.svg' class='iconoNota'>
     </div>
   </div>
 </div> -->
  <body>


    <form id='Ecobranza' class="dt-page p-0" >
      <div class="container-fluid mb-5">
        <table id="db_cobranza" class=" table-hover text-center ">
          <div class="row clt_usr mt-4">
            <div class="col align-self-end">
              <a class="rotate-link consultar ancla" accion="acobranza" status="cerrado">
                <img  src="/fitcoControl/Resources/iconos/003-analytics-2.svg" class="icon rotate-icon" style="width:30px">
                <span class="spanA">Agregar Factura</span>
              </a>
              <a class="rotate-link consultar ancla" data-toggle='modal' data-target='#ModalGraficaCobranza'>
                <img  src="/fitcoControl/Resources/iconos/grafica2.svg" class=" icon rotate-icon" style="width:30px">
                <span class="spanD">Graficas Cobranza</span>
              </a>
            </div>
          </div>
          <thead class="text-center">
            <tr class="encabezado">
              <td><p></p></td>
              <td><p>Cliente</p></td>
              <td><p>Concepto</p></td>
              <td><p>Factura</p></td>
              <td><p>Importe</p></td>
              <td><p>Vencimiento</p></td>
              <td><p></p></td>
            </tr>
          </thead>
        </table>
      </div>
    </form>
  </body>



  <div class="modal fade" id="VisualizarTablaCobranza">
    <div class="modal-dialog modal-med">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" name="button" data-dismiss="modal" area-label="close">
            <i class="fa fa-times-circle-o fa-2x" aria-hidden="true"></i>
          </button>
          <h5 class="modal-tittle">Tabla de Pagos</h5>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <table class="table">
              <thead>
                <tr class="row encabezado">
                  <td class='col-md-5 text-center'>
                    <h4><b>FECHA</h4>
                  </td>
                  <td class='col-md-5 text-center'>
                    <h4><b>PAGADO</b></h4>
                  </td>
                  <td class='col-md-2 text-center'></td>
                </tr>
              </thead>
              <tbody id="visualizarCobranza"></tbody>
            </table>
          </div><!--termina el Container-Fluid-->
        </div><!--termina el Cuerpo del Modal-->
      </div><!--termina el COntenido del Modal-->
    </div>
  </div>



  <footer class="footer">
    <li class="nav-item">
      <a  class="bn noborder w-100" href="/fitcoControl/Resources/PHP/Login/CerrarSesion.php" >
      <div class="row justify-content-center">
        <div class="col-md-3">
          Cerrar <img class="m-3" style="width:30px" src="/fitcoControl/Resources/iconos/001-close-1.svg"> Sesión</a>
        </div>
      </div>
    </li>

<?php
  // require $root . '/fitcoControl/Resources/PHP/Cobranza/pieCobranza.php';
?>

  <script src="/fitcoControl/Ubicaciones/MetricasVentas/dataTable/js/dataTable.js"></script>
  <script src="/fitcoControl/Resources/js/MostrarDivsAgregar.js"></script>

  <!-- <script src="/fitcoControl/Resources/js/Cobranza/Cobranza.js"></script> -->
  <script src="/fitcoControl/Resources/js/Inputs.js"></script>


  </footer>
