<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';


$pk_metrica = trim($_POST['pk_metrica']);
$fk_venMet = trim($_POST['fk_venMet']);
$tipoCambio = trim($_POST['tipoCambio']);
$mes = trim($_POST['mes']);
$clt_metaClientes = trim($_POST['clt_metaClientes']);
$clt_prospectos = trim($_POST['clt_prospectos']);
$clt_cotizados = trim($_POST['clt_cotizados']);
$clt_nuevo = trim($_POST['clt_nuevo']);
$clt_factor = trim($_POST['clt_factor']);
$clt_meta = trim($_POST['clt_meta']);
$ccot_emitidas = trim($_POST['ccot_emitidas']);
$ccot_pedidos = trim($_POST['ccot_pedidos']);
$ccot_factor = trim($_POST['ccot_factor']);
$ccot_meta = trim($_POST['ccot_meta']);
$mcot_emTotal = trim($_POST['mcot_emTotal']);
$mcot_emPesos = trim($_POST['mcot_emPesos']);
$mcot_emUsd = trim($_POST['mcot_emUsd']);
$pcot_venTotal = trim($_POST['pcot_venTotal']);
$pcot_venPesos = trim($_POST['pcot_venPesos']);
$pcot_venUsd = trim($_POST['pcot_venUsd']);
$fact_conversion = trim($_POST['fact_conversion']);
$fact_meta = trim($_POST['fact_meta']);
$ven_meta = trim($_POST['ven_meta']);
$ven_reales = trim($_POST['ven_reales']);
$ven_balance = trim($_POST['ven_balance']);

$query = "UPDATE ct_ventasMetricas
SET fk_venMet = ?, tipoCambio = ?, mes = ?,
clt_metaClientes = ?, clt_prospectos = ?, clt_cotizados = ?, clt_nuevo = ?, clt_factor = ?, clt_meta = ?,
ccot_emitidas = ?,  ccot_pedidos = ?, ccot_factor = ?, ccot_meta = ?,
mcot_emTotal = ?,  mcot_emPesos = ?, mcot_emUsd = ?,
pcot_venTotal = ?,  pcot_venPesos = ?, pcot_venUsd = ?,
fact_conversion = ?,  fact_meta = ?,
ven_meta = ?,  ven_reales = ?, ven_balance = ?

WHERE pk_metrica = ?";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query prepare [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('sssssssssssssssssssssssss',$fk_venMet,$tipoCambio,$mes,
                                              $clt_metaClientes,$clt_prospectos,$clt_cotizados,$clt_nuevo,$clt_factor,$clt_meta,
                                              $ccot_emitidas,$ccot_pedidos,$ccot_factor,$ccot_meta,
                                              $mcot_emTotal,$mcot_emPesos,$mcot_emUsd,
                                              $pcot_venTotal,$pcot_venPesos,$pcot_venUsd,
                                              $fact_conversion,$fact_meta,
                                              $ven_meta,$ven_reales,$ven_balance,$pk_metrica);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during query execution [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

$affected = $stmt->affected_rows;
$system_callback['affected'] = $affected;
$system_callback['datos'] = $_POST;

if ($affected == 0) {
  $system_callback['code'] = 2;
  $system_callback['message'] = "El query no hizo ningún cambio a la base de datos";
  exit_script($system_callback);
}

$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";
exit_script($system_callback);

 ?>
