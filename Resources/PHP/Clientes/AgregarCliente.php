<?php
$root = $_SERVER['DOCUMENT_ROOT'];

require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

  $clt_id = $conn->real_escape_string($_POST['clt_id']);
  $clt_nombre = $conn->real_escape_string($_POST['clt_nombre']);
  $clt_contacto = $conn->real_escape_string($_POST['clt_contacto']);
  $clt_credito = $conn->real_escape_string($_POST['clt_credito']);
  $clt_fingreso = $conn->real_escape_string($_POST['clt_fingreso']);
  $clt_color = $conn->real_escape_string($_POST['clt_color']);
  $clt_prendas = $conn->real_escape_string($_POST['clt_prendas']);
  $clt_nosotros = $conn->real_escape_string($_POST['clt_nosotros']);


  $query = "INSERT INTO Clientes(id,nombre,contacto,credito,f_ingreso,color,prendas,nosotros) VALUES('$clt_id','$clt_nombre','$clt_contacto','$clt_credito','$clt_fingreso','$clt_color','$clt_prendas','$clt_nosotros')";


  $resultado = $conn->query($query);




  if ($resultado) {
    header("Location: /fitcoControl/Ubicaciones/Clientes/Clientes.php");
  }else {
    echo "No se pudo Realizar el resistro";
  }

?>
