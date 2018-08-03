<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1); 

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$system_callback = [];
// $data = $_POST;
//
// $suma = 0;
// $total = 0;
// $diferencia = 0;
// $data['string'];
// $text = "%" . $data['string'] . "%";
$query = "SELECT
 *
 FROM ct_CuentasxPagar

 -- WHERE (proveedor LIKE ?)  OR (descripcion LIKE ?) OR (factura LIKE ?) OR (fechaVencimiento LIKE ?)

 ORDER BY fechaVencimiento DESC";

 $stmt = $conn->prepare($query);
 if (!($stmt)) {
   $system_callback['code'] = "500";
   $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
   exit_script($system_callback);
 }

 // $stmt->bind_param('ssss', $text,$text,$text,$text);
 // if (!($stmt)) {
 //   $system_callback['code'] = "500";
 //   $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
 //   exit_script($system_callback);
 // }

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

  $idcuentas = $row['pk_cuentasPagar'];
  $proveedor = $row['proveedor'];
  $descripcion = $row['descripcion'];
  $factura = $row['factura'];
  $vencimiento = $row['fechaVencimiento'];
  $pagado = $row['pagado'];
  $total = $row['montoPago'];
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

 // if ($admin == "Administrador") {
 //   $ocultar = "";
 // }elseif ($ce == "0") {
 //   $ocultar = "ocultar";
 // }

 // si funciona filtro de solo vencido
   if ($total == $pagado || $vencimiento > $hoy) {
     $vervencido = "display:none";
   }else {
     $vervencido = "";
   }

 $system_callback['data'] .=
 "<p db-id='$idcuentas'>$idcuentas - $proveedor</p>";
 $id = $idcuentas;

  $system_callback['data'] .=
    "<tr class='$background' id='item' style='$vervencido'>
      <td with='20%'>$proveedor</td>
      <td with='10%'>$factura</td>
      <td with='10%'>$descripcion</td>
      <td with='10%'>$ $pendiente</td>
      <td with='10%'>$vencimiento</td>
    </tr>";
}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);
 ?>
