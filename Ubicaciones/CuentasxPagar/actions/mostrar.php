<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

if ($_POST['request']) {
$system_callback = [];
$data = $_POST;
$request = $data['request'];
$data['string'];
$text = "%" . $data['string'] . "%";
$query = "SELECT
cxp.pk_cuentasPagar AS idCuentas,
cxp.proveedor AS proveedor,
cxp.descripcion AS descripcion,
cxp.montoPago AS total,
cxp.fechaVencimiento AS vencimiento,
cxp.pagado AS pagado,
cxp.factura AS factura

 FROM ct_CuentasxPagar cxp

 WHERE cxp.proveedor = '$request'


 ORDER BY vencimiento ASC";



$stmt = $conn->prepare($query);
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

if ($rslt->num_rows == 0) {
  $system_callback['code'] = 1;
  $system_callback['data'] ="<p db-id=''>No se encontraron resultados</p>";
  $system_callback['message'] = "Script called successfully but there are no rows to display.";
  exit_script($system_callback);
}



while ($row = $rslt->fetch_assoc()) {


  $idCuentas = $row['idCuentas'];
  $proveedor = $row['proveedor'];
  $descripcion = $row['descripcion'];
  $factura = $row['factura'];
  $vencimiento = $row['vencimiento'];
  $pagado = $row['pagado'];
  $total = $row['total'];
  $ce = $_SESSION['user']['cobranza_editar'];
  $admin = $_SESSION['user']['privilegiosUsuario'];
  $hoy = date('Y-m-d');
  $pendiente = $total - $pagado;
  $background = "";


  if (($total == $pagado) && ($vencimiento == $hoy)) {
    $background = "verde";
  }elseif (($vencimiento < $hoy) && ($total == $pagado)) {
    $background = "verde";
  }elseif (($vencimiento > $hoy) && ($total == $pagado)) {
    $background = "verde";
  }elseif (($vencimiento < $hoy) && ($total <> $pagado)) {
    $background = "rojo";
  }

  if ($total == $pagado || $vencimiento > $hoy) {
    $vervencido = "display:none";
  }else {
    $vervencido = "";
  }

 $system_callback['data'] .=
 "<p db-id='$idCuentas'>$idCuentas - $proveedor</p>";
 $id = $idCuentas;

  $system_callback['data'] .=
  "<tr class='$background font12' id='item' style='$vervencido'>
      <td with='20%'>$proveedor</td>
      <td with='10%'>$factura</td>
      <td with='10%'>$descripcion</td>
      <td with='10%'>$ $total</td>
      <td with='10%'>$ $pagado</td>
      <td with='10%'>$ $pendiente</td>
      <td with='10%'>$vencimiento</td>
    </tr>";
}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
};
?>
