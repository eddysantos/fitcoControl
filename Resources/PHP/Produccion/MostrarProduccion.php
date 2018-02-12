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
p.fechaFinal AS ffin,
p.piezasRequeridas AS piezas,
c.colorCliente AS color,
SUM(pr.cantidadProduccion) AS total

FROM ct_programacion p

LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente
LEFT JOIN ct_produccion pr ON p.pk_programacion = pr.fk_programacion

GROUP BY p.pk_programacion

ORDER BY cliente ASC,ffin";


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
    $total = $row['total'];
    $hoy = date("Y-m-d");
    $numerosemana = date("W",strtotime($ffin));//sacar numero de la semana
    $pe = $_SESSION['user']['produccion_editar'];
    $admin = $_SESSION['user']['privilegiosUsuario'];

    //si fecha vencimiento es mayor a la fecha de hoy y mis piezas requeridas son igual a
    if (($ffin >= $hoy)  && ($piezas == $total)) {
      $iconocaja = "001-check.svg";
      $background = "verde";
    } elseif (($ffin <= $hoy) && ($piezas == $total)) {
      $iconocaja = "001-check.svg";
      $background = "verde";
    }elseif (($ffin < $hoy) && ($piezas > $total)) {
      $iconocaja = "003-shipping.svg";
      $background = "rojo";
    }else {
      $iconocaja = "002-delivery.svg";
    }



    $data["infoTabla"].= "<tr class='$background row bordelateral  m-0' id='item'>
      <td class='col-md-1'>
        <img src='/fitcoControl/Resources/iconos/$iconocaja' class='icono'>
      </td>
        <td class='col-md-3'>
          <h4><b><input type='color' value='$color'>$cliente</b></h4>
        </td>
        <td class='col-md-2 text-center'>
          <h4><b>$piezas</b></h4>
        </td>
        <td class='col-md-2 text-center'>
          <h4><b>$total</b></h4>
        </td>
        <td class='col-md-2 text-center'>
          <h4><b>$ffin</b></h4>
        </td>

        <td class='col-md-2 text-right'>
          <a href='#' class='agregarproduccion spand-link' program-id='$idprog'><img src='/fitcoControl/Resources/iconos/003-add.svg' class='spand-icon'></a>
          <a href='#' class='ml-3 visualizarproduccion spand-link' data-toggle='modal' data-target='#VisualizarTablaProduccion' program-id='$idprog'><img src='/fitcoControl/Resources/iconos/magnifier.svg' class='spand-icon'></a>
        </td>
      </tr>";


  }
echo json_encode($data);
}
mysqli_free_result($resultado);
mysqli_close($conn);

?>
