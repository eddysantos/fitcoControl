<?php


$query = "SELECT * FROM Cobranza INNER JOIN Clientes WHERE cliente = nombre";
$resulcobranza = $conn->query($query);

$query = "SELECT * FROM Clientes";
$resulclientes = $conn->query($query);

$query = "SELECT * FROM meses";
$resulmeses = $conn->query($query);


$suma = 0;



?>
