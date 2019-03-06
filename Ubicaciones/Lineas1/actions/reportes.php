<link rel="stylesheet" href="/fitcoControl/Resources/css/Inputs.css">
<link rel="stylesheet" href="/fitcoControl/Resources/css/Pagina.css">
<link rel="stylesheet" href="/fitcoControl/Resources/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/fitcoControl/Resources/css/sweetalert.css">

<script src="/fitcoControl/Resources/jquery/sweetalert.min.js"></script>
<script src="/fitcoControl/Resources/jquery/jquery.min.js"></script>


<style media="screen">
  .repo{
    border: 1px solid rgba(0, 0, 0, .15);
    border-radius: .85rem;
    height: 30;
    letter-spacing:3px;
    color: rgba(62, 109, 140, 0.85);
  }
</style>

<!-- <div class=""> -->
  <table class="table">
    <!-- <tr class="row m-0">

    </tr> -->
    <tr class="row m-0" id="inputfiltros">
      <td class="col-md-3">
        <label>Filtrar por :</label><br>
        <select class="c-select repo w-100" id="seleccionarFiltros" value="">
          <option value="1" selected>Solo Fechas</option>
          <option value="2">Fecha y Nombre Empleado</option>
          <option value="3">Fecha y Operación</option>
        </select>
      </td>

      <td class="col-md-2">
        <label>Fecha inicial :</label>
        <input id="f-Ini" class="c-select repo" type="date">
      </td>
      <td class="col-md-2">
        <label>Fecha Final :</label>
        <input id="f-Fin" class="c-select repo" type="date">
      </td>
      <td class="col-md-3" style="display:none" id="filtroEmpleado">
        <label>Nombre Empleado :</label>
        <input class="repo popup-input" id="lin-listaEmp" type="text" id-display="#popup-display-listaEmpleadosR" action="listaEmpleados" db-id="" autocomplete="off">
        <div class="popup-list" id="popup-display-listaEmpleadosR" style="display:none"></div>
      </td>
      <td class="col-md-2" style="display:none" id="filtroOper">
        <label>Operacion :</label>
        <input class="repo popup-input" id="lin_listaOpe" type="text" id-display="#popup-display-listaOperacionR" action="listaOperacion" db-id="" autocomplete="off">
        <div class="popup-list" id="popup-display-listaOperacionR" style="display:none"></div>
      </td>

      <td class="col-md-1 mt-4">
        <a class="filtroRepo consultar rotate-link ancla" accion="filtroRepo" status="cerrado" id="filtroRepo">
          <img src="/fitcoControl/Resources/iconos/searchF.svg" class="icon1 rotate-icon" style="width:30px;">
        </a>

        <a href="/fitcoControl/Ubicaciones/Lineas1/lineas.php" class="ml-4 consultar rotate-link ancla">
          <img src="/fitcoControl/Resources/iconos/return.svg" class="icon1 rotate-icon" style="width:30px;">
        </a>
      </td>
    </tr>
  </table>


  <!--MOSTRAR TABLA  -->
  <form id="reportes" style="display:none">
    <table class="table" style="font-size:14px">
      <thead>
        <tr>
          <td width="3%"><a href="#" class="consultar" accion="backRepo" status="cerrado" id="backRepo"><img style="width: 100px;" src='/fitcoControl/Resources/iconos/logoFitco.png'></a></td>
        </tr>
      </thead>
      <tbody id="tabla_Reportes" class="font12">
        <tr>
          <td colspan="9">No hay resultados</td>
        </tr>
      </tbody>
    </table>
  </form>
<!-- </div> -->


<script src="/fitcoControl/Resources/js/Inputs.js"></script>
<script src="/fitcoControl/Ubicaciones/Lineas1/js/Lineas.js"></script>
<script src="/fitcoControl/Resources/js/popup-list-plugin.js"></script>
<script src="/fitcoControl/Resources/js/table-fetch-plugin.js"></script>
