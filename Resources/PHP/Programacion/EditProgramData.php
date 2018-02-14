<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"UPDATE ct_programacion
SET fk_cliente = ?,
fechaInicio = ?,
fechaFinal =?,
piezasRequeridas =?,
horaEntrega = ?
WHERE pk_programacion = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param('ssssss',
  $_POST['mpgr_cliente'],
  $_POST['mpgr_fini'],
  $_POST['mpgr_ffin'],
  $_POST['mpgr_piezas'],
  $_POST['hr'],
  $_POST['mpgr_id']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
