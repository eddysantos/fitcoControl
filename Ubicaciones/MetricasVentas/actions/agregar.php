<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$a_fk_venMet = trim($_POST['a_fk_venMet']);
$a_mes = trim($_POST['a_mes']);
$a_tipoCambio = trim($_POST['a_tipoCambio']);

$a_clt_metaClientes = trim($_POST['a_clt_metaClientes']);
$a_clt_prospectos = trim($_POST['a_clt_prospectos']);
$a_clt_cotizados = trim($_POST['a_clt_cotizados']);
$a_clt_nuevo = trim($_POST['a_clt_nuevo']);
$a_clt_factor = trim($_POST['a_clt_factor']);
$a_clt_meta = trim($_POST['a_clt_meta']);

$a_ccot_emitidas = trim($_POST['a_ccot_emitidas']);
$a_ccot_pedidos = trim($_POST['a_ccot_pedidos']);
$a_ccot_factor = trim($_POST['a_ccot_factor']);
$a_ccot_meta = trim($_POST['a_ccot_meta']);


$a_mcot_emTotal = trim($_POST['a_mcot_emTotal']);
$a_mcot_emPesos = trim($_POST['a_mcot_emPesos']);
$a_mcot_emUsd = trim($_POST['a_mcot_emUsd']);

$a_pcot_ventotal = trim($_POST['a_pcot_ventotal']);
$a_pcot_venPesos = trim($_POST['a_pcot_venPesos']);
$a_pcot_venUsd = trim($_POST['a_pcot_venUsd']);

$a_fact_conversion = trim($_POST['a_fact_conversion']);
$a_fact_meta = trim($_POST['a_fact_meta']);

$a_ven_meta = trim($_POST['a_ven_meta']);
$a_ven_reales = trim($_POST['a_ven_reales']);
$a_ven_balance = trim($_POST['a_ven_balance']);

$query = "INSERT INTO ct_ventasMetricas (fk_venMet,
                                         tipoCambio,
                                         mes,
                                         clt_metaClientes,
                                         clt_prospectos,
                                         clt_cotizados,
                                         clt_nuevo,
                                         clt_factor,
                                         clt_meta,
                                         ccot_emitidas,
                                         ccot_pedidos,
                                         ccot_factor,
                                         ccot_meta,
                                         mcot_emTotal,
                                         mcot_emPesos,
                                         mcot_emUsd,
                                         pcot_venTotal,
                                         pcot_venPesos,
                                         pcot_venUsd,
                                         fact_conversion,
                                         fact_meta,
                                         ven_meta,
                                         ven_reales,
                                         ven_balance)
                                         VALUES (?,?,?,?,?,?,?,?,?,?,
                                         ?,?,?,?,?,?,?,?,?,?,
                                         ?,?,?,?)";
$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('ssssssssssssssssssssssss',$a_fk_venMet,
                                             $a_tipoCambio,
                                             $a_mes,
                                             $a_clt_meta,
                                             $a_clt_prospectos,
                                             $a_clt_cotizados,
                                             $a_clt_nuevo,
                                             $a_clt_factor,
                                             $a_clt_meta,
                                             $a_ccot_emitidas,
                                             $a_ccot_pedidos,
                                             $a_ccot_factor,
                                             $a_ccot_meta,
                                             $a_mcot_emTotal,
                                             $a_mcot_emPesos,
                                             $a_mcot_emUsd,
                                             $a_pcot_ventotal,
                                             $a_pcot_venPesos,
                                             $a_pcot_venUsd,
                                             $a_fact_conversion,
                                             $a_fact_meta,
                                             $a_ven_meta,
                                             $a_ven_reales,
                                             $a_ven_balance);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
  exit_script($system_callback);
}

if (!($stmt->execute())) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion [$stmt->errno]: $stmt->error";
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
