<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/DataBases/Conexion.php';
  $query = "SELECT * FROM ct_ventasMetricas  LEFT JOIN ct_ventasVendedor ON pk_metrica = fk_venMet GROUP BY pk_metrica";
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
