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
c.nombreCliente AS cliente,
p.fechaInicio AS fini,
p.fechaFinal AS ffin,
p.piezasRequeridas AS piezas,
p.metaDiaria AS meta,
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
    $fini = $row['fini'];
    $ffin = $row['ffin'];
    $piezas = $row['piezas'];
    $meta = $row['meta'];
    $color = $row['color'];
    $ocultar = "";
    $pe = $_SESSION['user']['produccion_editar'];
    $admin = $_SESSION['user']['privilegiosUsuario'];


    if ($admin == "Administrador") {
     $ocultar = "";
   }elseif ($pe == "0") {
     $ocultar = "ocultar";
   }


    $data["infoTabla"].= "<tr class='row bordelateral m-0' id='item'>
      <td class='col-md-1'>
        <img src='/fitcoControl/Resources/iconos/transport.svg' class='icono'>
      </td>
      <td class='col-md-3'>
        <h4><b><input type='color' value='$color'>$cliente</b></h4>
      </td>
      <td class='col-md-2 text-center'>
        <h4><b>$fini</b></h4>
      </td>
      <td class='col-md-2 text-center'>
        <h4><b>$ffin</b></h4>
      </td>
      <td class='col-md-2 text-center'>
        <h4><b>$piezas</b></h4>
      </td>
      <td class='col-md-1 text-center'>
        <h4><b>$meta</b></h4>
      </td>
      <td class='col-md-1 text-center'>
        <a href='#' class='EditarProduccion spand-link' data-toggle='modal' data-target='#EditarProduccion' program-id='$idprog'><img src='/fitcoControl/Resources/iconos/pencil1.svg' class='$ocultar spand-icon'></a>
      </td>
    </tr>";


  }
  echo json_encode($data);
}

mysqli_free_result($resultado);
mysqli_close($conn);

?>
