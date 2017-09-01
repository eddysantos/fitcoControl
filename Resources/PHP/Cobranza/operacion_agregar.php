<?php
$root = $_SERVER['DOCUMENT_ROOT'];

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

  $cbz_id = $conn->real_escape_string($_POST['cbz_id']);
  $cbz_cliente = $conn->real_escape_string($_POST['cbz_cliente']);
  $cbz_factura = $conn->real_escape_string($_POST['cbz_factura']);
  $cbz_importe = $conn->real_escape_string($_POST['cbz_importe']);
  $cbz_dvencimiento = $conn->real_escape_string($_POST['cbz_dvencimiento']);

  $query = "INSERT INTO ct_cobranza(pk_cobranza,clienteCobranza,facturaCobranza,importeCobranza,vencimientoCobranza) VALUES('$cbz_id','$cbz_cliente','$cbz_factura','$cbz_importe','$cbz_dvencimiento')";


  $resultado = $conn->query($query);




  if ($resultado) {
    header("Location: /fitcoControl/Ubicaciones/Cobranza/cobranza.php");
  }else {
    echo "No se pudo Realizar el resistro";
  }

?>
