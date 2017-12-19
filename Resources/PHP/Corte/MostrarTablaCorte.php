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

p.pk_programacion AS idcorte,
DATE_FORMAT(p.fechaInicio,'%d-%m-%Y') AS fechaInicio,
DATE_FORMAT(p.fechaFinal,'%d-%m-%Y') AS ffin,
p.horaEntrega AS entrega,

c.nombreCliente AS cliente,
c.colorCliente AS color,

DATE_FORMAT(cor.tiempoActual,'%d-%m-%Y') AS finalizado,
cor.Notas AS notas,
cor.horaActual AS horaFinal

FROM ct_programacion p

LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente
LEFT JOIN ct_corte cor ON p.pk_programacion = cor.fk_programacion


GROUP BY p.pk_programacion

ORDER BY cliente ASC";


$resultado = mysqli_query($conn,$query);

if (!$resultado) {
  $data['code'] = 2;
  $data['response'] = mysqli_error($conn);
  die();
}else {
  while($row = mysqli_fetch_assoc($resultado)){
    $data["data"][]= $row;

    $fini = $row['fechaInicio'];
    $hrentrega = $row['entrega'];
    $idcorte = $row['idcorte'];
    $cliente = $row['cliente'];
    $ffin = $row['ffin'];
    $color = $row['color'];
    $finalizado = $row['finalizado'];
    $notas = $row['notas'];
    $horaFinal = $row['horaFinal'];


    $hoy = date("Y-m-d");

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


    $data["infoTabla"].= "<tr class='row bordelateral  m-0' id='item'>

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
        <td class='col-md-4 text-center'>
          <h4><b>$notas</b></h4>
        </td>

        <td class='col-md-1 text-right'>
          <a href='#' class='acorte spand-link mr-3' data-toggle='modal' data-target='#AgregarCorte' corte-id='$idcorte'><img src='/fitcoControl/Resources/iconos/003-add.svg' class='spand-icon'></a>
        </td>
      </tr>";

  }
  echo json_encode($data);
}
mysqli_free_result($resultado);
mysqli_close($conn);

?>
