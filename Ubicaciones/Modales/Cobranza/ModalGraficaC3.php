<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";
$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);


// **********************************//
//  G R A F I C A     S E M A N A L  //
// **********************************//

$query = "SELECT
co.pk_cobranza AS idcobranza,
ct.nombreCliente AS nombre,
SUM(co.importeCobranza) AS totalcobranza,
WEEK(co.vencimientoCobranza) AS semana,
MONTH(co.vencimientoCobranza) AS mes,
ct.colorCliente AS color,
SUM(pgo.importePago) AS pagado,
year(co.vencimientoCobranza) AS anio,
co.vencimientoCobranza AS vencimiento
FROM ct_cobranza co
LEFT JOIN ct_cliente ct ON co.fk_cliente = ct.pk_cliente
LEFT JOIN ct_pagos pgo ON  pgo.fk_cobranza = co.pk_cobranza
WHERE co.vencimientoCobranza BETWEEN '2018-01-01' AND '2018-12-31'
GROUP BY semana,anio ORDER BY vencimiento ASC
";


$querySemanal = "SELECT
co.pk_cobranza AS idcobranza,
ct.nombreCliente AS nombre,
SUM(co.importeCobranza) AS totalcobranza,
SUM(pgo.importePago) AS pagado,
WEEK(co.vencimientoCobranza) AS semana,
year(co.vencimientoCobranza) AS anio,




WEEK(pr.fechaIntroduccion) AS semana,
year(pr.fechaIntroduccion) AS anio,
SUM(pr.cantidadProduccion) AS produccion,
SUM(pr.metaProduccion) AS meta,
pr.fechaIntroduccion AS fecha

FROM ct_program p

LEFT JOIN ct_produccion pr ON pr.fk_programacion = p.pk_programacion

GROUP BY  semana
ORDER BY fecha ASC LIMIT 12";


$result = mysqli_query($conn, $querySemanal);

$producSemanal[] = 'Produccion';
$metaSemanal[] = 'Meta';
$semana[] = 'x';

while ($row = $result->fetch_assoc()) {
 $semana[] = 'Sem '.$row['semana'].'/'.$row['anio'];
 $producSemanal[] = $row['produccion'];
 $metaSemanal[] = $row['meta'];
}
