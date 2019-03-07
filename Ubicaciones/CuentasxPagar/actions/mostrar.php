<?php
session_start();
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
$data = $_POST;

$data['string'];
$text = "%" . $data['string'] . "%";
// $variable = $data['variable']; // en caso de pasar una variable
$andWhere = 'WHERE (proveedor LIKE ?)  OR (factura LIKE ?) OR (montoPago LIKE ?) OR (fechaVencimiento LIKE ?)'; // en caso de que haya buscador y variable
$query = "SELECT
pk_cuentasPagar AS idCuentas,
proveedor AS proveedor,
descripcion AS descripcion,
montoPago AS total,
fechaVencimiento AS vencimiento,
pagado AS pagado,
factura AS factura

FROM ct_CuentasxPagar
$andWhere AND fechaVencimiento BETWEEN '2018-01-01' AND '2019-12-31'
ORDER BY vencimiento DESC,proveedor ASC";


$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la preparacion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('ssss',$text,$text,$text,$text);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error al pasar variables [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

$rslt = $stmt->get_result();

if ($rslt->num_rows == 0) {
  $system_callback['code'] = 1;
  $system_callback['data'] ="<p db-id=''>No se encontraron resultados</p>";
  $system_callback['message'] = "Script called successfully but there are no rows to display.";
  exit_script($system_callback);
}

while ($row = $rslt->fetch_assoc()) {
  $id = $row['idCuentas'];
  $proveedor = utf8_encode($row['proveedor']);
  $descripcion = utf8_encode($row['descripcion']);
  $factura = utf8_encode($row['factura']);
  $vencimiento = utf8_encode($row['vencimiento']);
  $pagado = utf8_encode($row['pagado']);
  $total = utf8_encode($row['total']);
  $hoy = date('Y-m-d');
  $pendiente = $total - $pagado;


  if (($total == $pagado) && ($vencimiento == $hoy)) {
    $background = "verde";
  }elseif (($vencimiento < $hoy) && ($total == $pagado)) {
    $background = "verde";
  }elseif (($vencimiento > $hoy) && ($total == $pagado)) {
    $background = "verde";
  }elseif (($vencimiento < $hoy) && ($total <> $pagado)) {
    $background = "rojo";
  }

  $tcxp_editar = $_SESSION['user']['tcxp_editar'];
  $admin = $_SESSION['user']['privilegiosUsuario'] == 'Administrador';


  if ($admin || $tcxp_editar == 1) {
    $editar = "href='#EditarCuenta' class='EditCuenta spand-link' data-toggle='modal'";
    $eliminar = "href='#'  class='eliminarCuenta spand-link ml-3'";
    $bloqueo="";
  }else {
    $editar = "href='#' class='bn bloqueo'";
    $eliminar = "href='#' class='bn bloqueo'";
    $bloqueo = "bn bloqueo";
  }

  $system_callback['data'] .="<tr class='$background row bordelateral m-0' id='item'>
    <td class='col-md-1'>
      <img src='/fitcoControl/Resources/iconos/team.svg' class='icono'>
    </td>
    <td class='col-md-4'>
      <h2><b>$proveedor</a></b></h2>
      <p class='visibilidad'>Fact: $factura</p>
    </td>
    <td class='col-md-2'>
    <h2><b>$descripcion</a></b></h2>
    <p class='visibilidad'>$vencimiento</p>
    </td>
    <td class='col-md-2 text-center'>
      <h2><b>$ $total</a></b></h2>
    </td>
    <td class='col-md-2 text-center'>
      <h2><b>$ $pagado</a></b></h2>
      <p class='visibilidad'>pendiente: $ $pendiente</p>
    </td>

    <td class='col-md-1 text-right'>
      <a $editar db-id='$id'><img src='/fitcoControl/Resources/iconos/001-edit-1.svg' class='$bloqueo img spand-icon'></a>

        <a $eliminar db-id='$id'><img src='/fitcoControl/Resources/iconos/004-delete-1.svg' class='$bloqueo img spand-icon'></a>
    </td>
  </tr>";

}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);


 ?>
