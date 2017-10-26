<?php
$root = $_SERVER['DOCUMENT_ROOT'];
$data = array(
  'code'=>"",
  'response'=>array()
);

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$query ="INSERT INTO ct_cobranza(fk_cliente,facturaCobranza,importeCobranza,vencimientoCobranza) VALUES(?,?,?,?)";

// echo "<script>console.log(" . $_POST['cbz_cliente'] . ")</script>";
// echo "<script>console.log(" . $_POST['cbz_factura'] . ")</script>";
// echo "<script>console.log(" . $_POST['cbz_importe'] . ")</script>";
// echo "<script>console.log(" . $_POST['cbz_dvencimiento'] . ")</script>";


$stmt = $conn->prepare($query);
$stmt->bind_param('ssss',
  $_POST['cbz_cliente'],
  $_POST['cbz_factura'],
  $_POST['cbz_importe'],
  $_POST['cbz_dvencimiento']
);
$stmt->execute();

if (!($stmt)) {
  error_log("Error en ejecución del query: " . $conn->error);
}

error_log("Se ejecutó el codigo de agregar cobranza!");

$aff_rows = $conn->affected_rows;

if ($aff_rows != 1) {
  $data['code'] = 2;
  $data['response'] = $stmt->error;
} else {
  $data['code'] = 1;
}

$json = json_encode($data);

echo $json;

?>
