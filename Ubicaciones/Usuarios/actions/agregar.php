<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';

$nom = trim($_POST['nom']);
$ape = trim($_POST['ape']);
$correo = trim($_POST['correo']);
$dep = trim($_POST['dep']);
$puesto = trim($_POST['puesto']);
$usr = trim($_POST['usr']);
$contra = trim($_POST['contra']);
$priv = trim($_POST['priv']);
$e_ventas = trim($_POST['e_ventas']);
$e_tesoreria = trim($_POST['e_tesoreria']);
$e_produc = trim($_POST['e_produc']);
$e_rhVer = trim($_POST['e_rhVer']);
$e_rhEditar = trim($_POST['e_rhEditar']);
$e_usVer = trim($_POST['e_usVer']);
$e_usEditar = trim($_POST['e_usEditar']);
$c_ver = trim($_POST['c_ver']);
$c_editar = trim($_POST['c_editar']);
$tc_ver = trim($_POST['tc_ver']);
$tc_editar = trim($_POST['tc_editar']);
$tcxp_ver = trim($_POST['tcxp_ver']);
$tcxp_editar = trim($_POST['tcxp_editar']);
$tm_ver = trim($_POST['tm_ver']);
$tm_editar = trim($_POST['tm_editar']);
$tr_ver = trim($_POST['tr_ver']);
$tr_editar = trim($_POST['tr_editar']);
$pro_pgVer = trim($_POST['pro_pgVer']);
$pro_pgEditar = trim($_POST['pro_pgEditar']);
$pro_miVer = trim($_POST['pro_miVer']);
$pro_miEditar = trim($_POST['pro_miEditar']);
$pro_pdVer = trim($_POST['pro_pdVer']);
$pro_pdEditar = trim($_POST['pro_pdEditar']);
$pro_corVer = trim($_POST['pro_corVer']);
$pro_corEditar = trim($_POST['pro_corEditar']);
$pro_liVer = trim($_POST['pro_liVer']);
$pro_liEditar = trim($_POST['pro_liEditar']);
$en_ver = trim($_POST['en_ver']);
$en_editar = trim($_POST['en_editar']);
$cc_ver = trim($_POST['cc_ver']);
$cc_editar = trim($_POST['cc_editar']);
$ve_ver = trim($_POST['ve_ver']);
$ve_editar = trim($_POST['ve_editar']);
$pro_corVerCal = trim($_POST['pro_corVerCal']);
$pro_corEditarCal = trim($_POST['pro_corEditarCal']);
$dis_ver = trim($_POST['dis_ver']);
$dis_editar = trim($_POST['dis_editar']);
$mat_ver = trim($_POST['mat_ver']);
$mat_editar = trim($_POST['mat_editar']);
$pro_invVer = trim($_POST['pro_invVer']);
$pro_invEditar = trim($_POST['pro_invEditar']);


$query = "INSERT INTO usuarios_1 (nombreUsuario,
                                  apellidosUsuario,
                                  correoUsuario,
                                  departamentoUsuario,
                                  puestoUsuario,
                                  usrUsuario,
                                  contraUsuario,
                                  privilegiosUsuario,
                                  e_ventas,
                                  e_tesoreria,
                                  e_produc,
                                  e_rhVer,
                                  e_rhEditar,
                                  e_usVer,
                                  e_usEditar,
                                  c_ver,
                                  c_editar,
                                  tc_ver,
                                  tc_editar,
                                  tcxp_ver,
                                  tcxp_editar,
                                  tm_ver,
                                  tm_editar,
                                  tr_ver,
                                  tr_editar,
                                  pro_pgVer,
                                  pro_pgEditar,
                                  pro_miVer,
                                  pro_miEditar,
                                  pro_pdVer,
                                  pro_pdEditar,
                                  pro_corVer,
                                  pro_corEditar,
                                  pro_liVer,
                                  pro_liEditar,
                                  en_ver,
                                  en_editar,
                                  cc_ver,
                                  cc_editar,
                                  ve_ver,
                                  ve_editar,
                                  pro_corVerCal,
                                  pro_corEditarCal,
                                  dis_ver,
                                  dis_editar,
                                  mat_ver,
                                  mat_editar,
                                  pro_invVer,
                                  pro_invEditar)
                                  VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($query);
if (!($stmt)) {
  $system_callback['code'] = "500";
  $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
  exit_script($system_callback);
}

$stmt->bind_param('sssssssssssssssssssssssssssssssssssssssssssssssss',$nom,$ape,$correo,$dep,$puesto,$usr,$contra,$priv,$e_ventas,$e_tesoreria,$e_produc,$e_rhVer,$e_rhEditar,$e_usVer,$e_usEditar,$c_ver,$c_editar,$tc_ver,$tc_editar,$tcxp_ver,$tcxp_editar,$tm_ver,$tm_editar,$tr_ver,$tr_editar,$pro_pgVer,$pro_pgEditar,$pro_miVer,$pro_miEditar,$pro_pdVer,$pro_pdEditar,$pro_corVer,$pro_corEditar,$pro_liVer,$pro_liEditar,$en_ver,$en_editar,$cc_ver,$cc_editar,$ve_ver,$ve_editar,$pro_corVerCal,$pro_corEditarCal,$dis_ver,$dis_editar,$mat_ver,$mat_editar,$pro_invVer,$pro_invEditar);
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
