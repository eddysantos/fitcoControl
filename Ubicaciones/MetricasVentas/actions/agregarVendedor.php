<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';


$conn->query('LOCK TABLES ct_ordenCompra WRITE;');
$conn->query("SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;");


try{
$conn->begin_transaction();


$add_vendedor = trim($_POST['add_vendedor']);
$add_usuario_add = trim($_POST['add_usuario_add']);
$add_fecha_add = trim($_POST['add_fecha_add']);
$add_mes = trim($_POST['add_mes']);
$add_fecha = trim($_POST['add_fecha']);
$add_tipoCambio = trim($_POST['add_tipoCambio']);

$add_clt_metaClientes = trim($_POST['add_clt_metaClientes']);
$add_clt_prospectos = trim($_POST['add_clt_prospectos']);
$add_clt_cotizados = trim($_POST['add_clt_cotizados']);
$add_clt_nuevo = trim($_POST['add_clt_nuevo']);
$add_clt_factor = trim($_POST['add_clt_factor']);
$add_clt_meta = trim($_POST['add_clt_meta']);

$add_ccot_emitidas = trim($_POST['add_ccot_emitidas']);
$add_ccot_pedidos = trim($_POST['add_ccot_pedidos']);
$add_ccot_factor = trim($_POST['add_ccot_factor']);
$add_ccot_meta = trim($_POST['add_ccot_meta']);


$add_mcot_emTotal = trim($_POST['add_mcot_emTotal']);
$add_mcot_emPesos = trim($_POST['add_mcot_emPesos']);
$add_mcot_emUsd = trim($_POST['add_mcot_emUsd']);

$add_pcot_ventotal = trim($_POST['add_pcot_ventotal']);
$add_pcot_venPesos = trim($_POST['add_pcot_venPesos']);
$add_pcot_venUsd = trim($_POST['add_pcot_venUsd']);

$add_fact_conversion = trim($_POST['add_fact_conversion']);
$add_fact_meta = trim($_POST['add_fact_meta']);

$add_ven_meta = trim($_POST['add_ven_meta']);
$add_ven_reales = trim($_POST['add_ven_reales']);
$add_ven_balance = trim($_POST['add_ven_balance']);




 $query = "INSERT INTO ct_ventasVendedor (nombreVendedor,usuario_add,fecha_add) VALUES (?,?,?)";
 $stmt = $conn->prepare($query);
 if (!($stmt)) {
   $system_callback['code'] = "500";
   $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
   exit_script($system_callback);
 }

 $stmt->bind_param('sss',$add_vendedor,$add_usuario_add,$add_fecha_add);
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

$fk_venMet = $conn->insert_id;



$query = "INSERT INTO ct_ventasMetricas (fk_venMet,
                                         tipoCambio,
                                         mes,
                                         fecha,
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
                                         VALUES (?,?,?,?,?,?,?,?,?,?,?,
                                         ?,?,?,?,?,?,?,?,?,?,
                                         ?,?,?,?)";
$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('sssssssssssssssssssssssss',$fk_venMet,
                                             $add_tipoCambio,
                                             $add_mes,
                                             $add_fecha,
                                             $add_clt_meta,
                                             $add_clt_prospectos,
                                             $add_clt_cotizados,
                                             $add_clt_nuevo,
                                             $add_clt_factor,
                                             $add_clt_meta,
                                             $add_ccot_emitidas,
                                             $add_ccot_pedidos,
                                             $add_ccot_factor,
                                             $add_ccot_meta,
                                             $add_mcot_emTotal,
                                             $add_mcot_emPesos,
                                             $add_mcot_emUsd,
                                             $add_pcot_ventotal,
                                             $add_pcot_venPesos,
                                             $add_pcot_venUsd,
                                             $add_fact_conversion,
                                             $add_fact_meta,
                                             $add_ven_meta,
                                             $add_ven_reales,
                                             $add_ven_balance);
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

$conn->commit();
$conn->query('UNLOCK TABLES;');
$system_callback['code'] = 1;
$system_callback['message'] = "Script called successfully!";

} catch (\Exception $e) {
	$conn->rollback();
  $system_callback['code'] = 501;
  $system_callback['message'] = $conn->error;
}

exit_script($system_callback);

?>
