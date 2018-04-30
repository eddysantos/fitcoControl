<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query =
"UPDATE ct_seccionCorte

SET clienteCorte = ?,
fechaCorte = ?,
fhinicio_prog = ?,
fhfinal_prog = ?,
fhinicio_real = ?,
fhfinal_real = ?,
Notas =?
WHERE pk_corte = ?";


$stmt = $conn->prepare($query);
$stmt->bind_param('ssssssss',
  $_POST['cc'],
  $_POST['fc'],
  $_POST['hpi'],
  $_POST['hpf'],
  $_POST['hri'],
  $_POST['hrf'],
  $_POST['nt'],
  $_POST['id']
);
$stmt->execute();

$aff_rows = $conn->affected_rows;

$json = json_encode($aff_rows);

echo $json;

?>
