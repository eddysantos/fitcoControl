<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);

// ********************************//
//  G R A F I C A     D I A R I A  //
// ********************************//


$queryDiaria = "SELECT
CASE WHEN DAYOFWEEK(pr.fechaIntroduccion) = 2 THEN 'Lun'
WHEN DAYOFWEEK(pr.fechaIntroduccion) = 3 THEN 'Mar'
WHEN DAYOFWEEK(pr.fechaIntroduccion) = 4 THEN 'Mie'
WHEN DAYOFWEEK(pr.fechaIntroduccion) = 5 THEN 'Jue'
WHEN DAYOFWEEK(pr.fechaIntroduccion) = 6 THEN 'Vie'
WHEN DAYOFWEEK(pr.fechaIntroduccion) = 7 THEN 'Sab'
WHEN DAYOFWEEK(pr.fechaIntroduccion) = 1 THEN 'Dom'
ELSE '' END AS dia,
DATE_FORMAT(pr.fechaIntroduccion, ' %d/%m') AS fechaX,
pr.cantidadProduccion AS produccion,
pr.metaProduccion AS meta,
pr.fechaIntroduccion AS fecha

FROM ct_program p LEFT JOIN ct_produccion pr ON pr.fk_programacion = p.pk_programacion

GROUP BY fecha
ORDER BY fecha ASC limit 25";


$result = mysqli_query($conn, $queryDiaria);

$valuesArray[] = 'Produccion';
$valuesArray2[] = 'Meta';
$fechaDia[] = 'x';

while ($row = $result->fetch_assoc()) {
 $fechaDia[] = $row['dia'].' '.$row['fechaX'];
 $valuesArray[] = $row['produccion'];
 $valuesArray2[] = $row['meta'];
}

?>
