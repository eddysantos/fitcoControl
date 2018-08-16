<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/DataBases/Conexion.php';

  $query = "SELECT
    co.pk_cobranza,
    ct.nombreCliente,
    co.facturaCobranza,
    co.importeCobranza,
    co.vencimientoCobranza,
    co.conceptoPago,
    co.fechaEntrega,
    ct.colorCliente,
    concat_ws(' ', ct.colorCliente, ct.nombreCliente) as cliente,
    ct.creditoCliente

    FROM ct_cobranza co

    LEFT JOIN ct_cliente ct ON co.fk_cliente = ct.pk_cliente
    LEFT JOIN ct_pagos pg ON co.pk_cobranza = pg.fk_cobranza

    GROUP BY co.pk_cobranza";
	$resultado = mysqli_query($conn, $query);

	if (!$resultado) {
		die("Error");
	}else {
		while ($data = mysqli_fetch_assoc($resultado)) {
			$arreglo["data"][] = $data;
		}
		echo json_encode($arreglo);
	}
	mysqli_free_result($resultado);
	mysqli_close($conn);
