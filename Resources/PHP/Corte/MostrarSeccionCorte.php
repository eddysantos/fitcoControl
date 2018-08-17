<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);
$query = "SELECT

cor.pk_corte AS idcorte,
DATE_FORMAT(cor.fechaCorte, '%d-%m-%Y') AS fechaCorte,
TIMEDIFF(cor.fhfinal_prog, cor.fhinicio_prog) AS restaProyectada,
TIMEDIFF(cor.fhfinal_real, cor.fhinicio_real) AS restaReal,
cor.clienteCorte AS cliente,
cor.fhinicio_real AS hir,
cor.fhfinal_real AS hfr,
cor.fhinicio_prog AS hip,
cor.fhfinal_prog AS hfp,

cor.Notas AS notas

FROM ct_seccionCorte cor

ORDER BY cliente ASC";


if (isset($_POST['corte'])){
 $q = $conn->real_escape_string($_POST['corte']);
 $query = "SELECT
 cor.pk_corte AS idcorte,
 DATE_FORMAT(cor.fechaCorte, '%d-%m-%Y') AS fechaCorte,
 TIMEDIFF(cor.fhfinal_prog,cor.fhinicio_prog) AS resta,

 cor.clienteCorte AS cliente,
 cor.fhinicio_prog AS hip,
 cor.fhfinal_prog AS hfp,

 cor.fhinicio_real AS hir,
 cor.fhfinal_real AS hfr,
 cor.Notas AS notas

 FROM ct_seccionCorte cor

 WHERE cor.clienteCorte LIKE '%$q%' OR
 cor.fhinicio_prog LIKE '%$q%' OR
 cor.fechaCorte LIKE '%$q%' OR
 cor.fhfinal_prog LIKE '%$q%' OR
 cor.tiempoActual LIKE '%$q%' OR
 cor.Notas LIKE '%$q%'

 ORDER BY cliente ASC";
}

$buscarDatos = $conn->query($query);
if ($buscarDatos->num_rows > 0) {
  $tabla.= "
  <form class='page p-0' id='tablacorte'>
  <table class='table table-hover fixed-table'>
    <thead class='encabezado' style='letter-spacing:0px;font-size: 14px;'>
      <tr class='row m-0 text-center'>
      <td class='col-md-2'>CLIENTE</td>
      <td class='col-md-3'>HRS PROYECTADAS DE CORTE</td>
      <td class='col-md-2'>HRS REALES DE CORTE</td>
      <td class='col-md-4'>NOTAS</td>
      <td class='col-md-1'></td>
      </tr>
    </thead>";

    while ($row = $buscarDatos->fetch_assoc()) {
      $fCorte = $row['fechaCorte'];
      $hip = $row['hip'];
      $hfp = $row['hfp'];
      $proyectado =  $row['restaProyectada'];
      // $real =  $row['restaReal'];

      $idcorte = $row['idcorte'];
      $cliente = $row['cliente'];
      $notas = $row['notas'];

      if ($row['hir']== 0) {
        $hir = "";
        $a = "";
      }elseif ($row['hfr'] == 0) {
        $hfr = "";
        $a = "";
      }else {
          $hir = $row['hir'];
          $hfr = $row['hfr'];
          $a = "a";
      }

      if ($row['hir']== 0 || $row['hfr'] == 0) {
        $real =  "";
        $horas = "";
      }else {
        $real =  $row['restaReal'];
        $horas = "horas";
      }

      $pro_corEditar = $_SESSION['user']['pro_corEditar'];
      $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';

      if ($admin || $pro_corEditar == 1) {
        $editar = "href='#' class='editarcorte spand-link' data-toggle='modal' data-target='#EditarCorte'";
        $eliminar = "href='#' class='eliminarCorte spand-link ml-1'";
        $bloqueo="";
      }else {
        $editar = "href='#' class='bn bloqueo'";
        $eliminar = "href='#' class='bn bloqueo'";
        $bloqueo = "bn bloqueo";
      }


          $tabla.= "
          <tbody id='MostrarSeccionCorte'>
            <tr class='row bordelateral  m-0' id='item'>
              <td class='col-md-2'>
                <h4><b>$cliente</b></h4>
                <p class='visibilidad'>Corte : $fCorte</p>
              </td>
              <td class='col-md-3 text-center'>
                <h4><b>$proyectado horas</b></h4>
                <p class='visibilidad'>$hip a $hfp</p>
              </td>

              <td class='col-md-2 text-center'>
                <h4><b>$real $horas</b></h4>
                <p class='visibilidad'>$hir $a $hfr</p>
              </td>
              <td class='col-md-4 text-center'>
                <h4><b>$notas</b></h4>
              </td>

              <td class='col-md-1 text-right'>
                <a $editar corteId='$idcorte'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='$bloqueo spand-icon'></a>

                <a $eliminar corteId='$idcorte'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='$bloqueo spand-icon'></a>
              </td>
            </tr>
          </tbody>";
    }

    $tabla.="

   </table>
  </form>";
}else {
  $tabla="
  <div id='SinRegistros' class='container-fluid pantallaRegistros'>
    <div class='tituloSinRegistros'>NO HAY REGISTROS</div>
  </div>";
 }

 echo $tabla;

?>
