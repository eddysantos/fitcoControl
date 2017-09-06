<?php


$query = "SELECT * FROM ct_cobranza INNER JOIN ct_cliente WHERE clienteCobranza = nombreCliente";
$resulcobranza = $conn->query($query);

$query = "SELECT * FROM ct_cliente";
$resulclientes = $conn->query($query);

$query = "SELECT * FROM meses";
$resulmeses = $conn->query($query);


$suma = 0;



?>
