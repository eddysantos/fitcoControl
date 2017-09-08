<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);
$query = "SELECT

p.pk_programacion AS idprogram,
c.nombreCliente AS cliente,
p.fechaFinal AS ffin,
p.piezasRequeridas AS piezas,
c.colorCliente AS color

FROM ct_programacion p

LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente

ORDER BY cliente";


$resultado = mysqli_query($conn,$query);

if (!$resultado) {
  $data['code'] = 2;
  $data['response'] = mysqli_error($conn);
  die();
}else {
  while($row = mysqli_fetch_assoc($resultado)){
    $data["data"][]= $row;

    $idprog = $row['idprogram'];
    $cliente = $row['cliente'];
    $ffin = $row['ffin'];
    $piezas = $row['piezas'];
    $color = $row['color'];


    $data["infoTabla"].= "<tr class='row bordelateral m-0' id='item'>
      <td class='col-md-1'>
        <img src='/fitcoControl/Resources/iconos/001-check.svg' class='icono'>
      </td>
        <td class='col-md-3'>
          <h4><b><input type='color' value='$color'>$cliente</b></h4>
        </td>
        <td class='col-md-3 text-center'>
          <h4><b>$piezas</b></h4>
        </td>
        <td class='col-md-3 text-center'>
          <h4><b>$ffin</b></h4>
        </td>
        <td class='col-md-1 text-right'>
          <a href='#' class='agregarproduccion spand-link' program-id='$idprog'><img src='/fitcoControl/Resources/iconos/003-add.svg' class='spand-icon'></a>
        </td>
        <td class='col-md-1 text-center'>
          <a href='#' class='visualizarproduccion spand-link' data-toggle='modal' data-target='#VisualizarTablaProduccion' program-id='$idprog'><img src='/fitcoControl/Resources/iconos/magnifier.svg' class='spand-icon'></a>
        </td>
      </tr>";


  }
  echo json_encode($data);
}

mysqli_free_result($resultado);
mysqli_close($conn);

?>
