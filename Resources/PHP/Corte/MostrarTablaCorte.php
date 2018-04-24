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

p.pk_programacion AS idprogram,
cor.pk_corte AS idcorte,
-- DATE_FORMAT(p.fechaInicio,'%d-%m-%Y') AS fechaInicio,
-- DATE_FORMAT(p.fechaFinal,'%d-%m-%Y') AS ffin,
-- p.horaEntrega AS entrega,

DATE_FORMAT(p.start,'%d-%m-%Y') AS fechaInicio,
DATE_FORMAT(p.end,'%d-%m-%Y') AS ffin,
DATE_FORMAT(p.end,'%H:%i') AS entrega,


c.nombreCliente AS cliente,
c.colorCliente AS color,

DATE_FORMAT(cor.tiempoActual,'%d-%m-%Y') AS finalizado,
cor.Notas AS notas,
cor.horaActual AS horaFinal

FROM ct_program p

LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente
LEFT JOIN ct_corte cor ON p.pk_programacion = cor.fk_programacion


GROUP BY p.pk_programacion

ORDER BY cliente ASC";


if (isset($_POST['corte'])){
 $q = $conn->real_escape_string($_POST['corte']);
 $query = "SELECT
 cor.pk_corte AS idcorte,
 p.pk_programacion AS idprogram,
 DATE_FORMAT(p.start,'%d-%m-%Y') AS fechaInicio,
 DATE_FORMAT(p.end,'%d-%m-%Y') AS ffin,
 DATE_FORMAT(p.end,'%H:%i') AS entrega,

 c.nombreCliente AS cliente,
 c.colorCliente AS color,

 DATE_FORMAT(cor.tiempoActual,'%d-%m-%Y') AS finalizado,
 cor.Notas AS notas,
 cor.horaActual AS horaFinal

 FROM ct_program p

 LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente
 LEFT JOIN ct_corte cor ON p.pk_programacion = cor.fk_programacion


 WHERE p.start LIKE '%$q%' OR
 p.end LIKE '%$q%' OR
 c.nombreCliente LIKE '%$q%' OR
 cor.tiempoActual LIKE '%$q%' OR
 cor.horaActual LIKE '%$q%' OR
 cor.Notas LIKE '%$q%'

 ORDER BY cliente ASC";
}

$buscarDatos = $conn->query($query);
if ($buscarDatos->num_rows > 0) {
  $tabla.= "
  <form class='page p-0'>
  <table class='table table-hover fixed-table'>
    <thead class='encabezado' style='letter-spacing:0px'>
      <tr class='row m-0 text-center'>
      <td class='col-md-2'>CLIENTE</td>
      <td class='col-md-3'>DÍAS/ HRS PROYECTADOS</td>
      <td class='col-md-2'>TIEMPO DE CORTE</td>
      <td class='col-md-3'>NOTAS</td>
      <td class='col-md-2'></td>
      </tr>
    </thead>
    <tbody id='MostrarCorte'></tbody>";

    while ($row = $buscarDatos->fetch_assoc()) {
          $fini = $row['fechaInicio'];
          $hrentrega = $row['entrega'];
          $idprogram = $row['idprogram'];
          $idcorte = $row['idcorte'];
          $cliente = $row['cliente'];
          $ffin = $row['ffin'];
          $color = $row['color'];
          $finalizado = $row['finalizado'];
          $notas = $row['notas'];
          $horaFinal = $row['horaFinal'];


          $diasProg = (strtotime($ffin)-strtotime($fini))/86400;
          $diasProg = abs($diasProg);
          $horasProg = $hrentrega - 8;


          if ($finalizado == "") {
            $diasReal = "";
            $horaReal = "";
            $txtdias = "";
            $txthoras = "";
            $diag = "";

          }else {
            $diasReal = (strtotime($fini)-strtotime($finalizado))/86400;
            $diasReal = abs($diasReal);
            $horaReal = $horaFinal - 8;

            $txtdias = "días";
            $diag = "y";
            $txthoras = "hrs";
          }

          $tabla.= "
          <tr class='row bordelateral  m-0' id='item'>
            <td class='col-md-2'>
              <h4><b><input type='color' value='$color'>$cliente</b></h4>
            </td>
            <td class='col-md-3 text-center'>
              <h4><b>$diasProg días y $horasProg hrs</b></h4>
              <p class='visibilidad'>$fini al $ffin</p>

            </td>

            <td class='col-md-2 text-center'>
              <h4><b>$diasReal $txtdias $diag $horaReal $txthoras</b></h4>
              <p class='visibilidad'>$finalizado</p>

            </td>
            <td class='col-md-3 text-center'>
              <h4><b>$notas</b></h4>
            </td>

            <td class='col-md-2 text-right'>
              <a href='#' class='acorte spand-link' corte-id='$idprogram'><img src='/fitcoControl/Resources/iconos/003-add.svg' class='spand-icon'></a>

              <a href='#' class='editarcorte spand-link ml-3' data-toggle='modal' data-target='#EditarCorte' corteId='$idcorte'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='spand-icon'></a>

              <a href='#' class='eliminarCorte spand-link ml-3' corteId='$idcorte'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='spand-icon'></a>
            </td>
          </tr>";
    }

    $tabla.="
    </tbody>
   </table>
  </form>";
}else {
  $tabla="No se encontraron coincidencias";
 }

 echo $tabla;

?>
