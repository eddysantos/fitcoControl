<?php

session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php";

$data = array(
  'code' => "",
  'response' => "",
  'infoTabla' => ""
);

$query ="SELECT

p.pk_programacion AS idEnvio,
p.piezasRequeridas AS piezas,

c.nombreCliente AS cliente,
c.colorCliente AS color,

(
	SELECT CONCAT(DATE_FORMAT(fechaEnvio,'%d-%m-%Y'),'&nbsp&nbsp',env.horaEnvio)
	FROM ct_envios env
	WHERE p.pk_programacion = env.fk_programacion
	ORDER BY env.fechaEnvio DESC, env.horaEnvio DESC
	LIMIT 1
) AS Ultimo_Envio,

(
	SELECT env.descripcion
	FROM ct_envios env
	WHERE p.pk_programacion = env.fk_programacion
	ORDER BY env.fechaEnvio DESC, env.horaEnvio DESC
	LIMIT 1
) AS status,

(
	SELECT env.notas
	FROM ct_envios env
	WHERE p.pk_programacion = env.fk_programacion
	ORDER BY env.fechaEnvio DESC, env.horaEnvio DESC
	LIMIT 1
) AS notas

FROM ct_programacion p

LEFT JOIN ct_cliente c ON c.pk_cliente = p.fk_cliente

GROUP BY p.pk_programacion


ORDER BY cliente";




$resultado = mysqli_query($conn,$query);

if (!$resultado) {
  $data['code'] = 2;
  $data['response'] = mysqli_error($conn);
  die();
}else {
  while($row = mysqli_fetch_assoc($resultado)){
    $data["data"][]= $row;


    $piezas = $row['piezas'];
    $status = $row['status'];
    $fechaEnvio = $row['Ultimo_Envio'];
    $notas = $row['notas'];
    $idEnvios = $row['idEnvio'];

    $cliente = $row['cliente'];
    $color = $row['color'];



    if ($status == "Arribo con el Cliente") {
      $background = "verde";
    }else {
      $background= "";
    }




    $data["infoTabla"].= "<tr class='$background row bordelateral m-0'>

        <td class='col-md-2'><input type='color' value='$color'>$cliente</td>
        <td class='col-md-1 text-center'>$piezas pzs</td>
        <td class='col-md-3 text-center'>$status</td>
        <td class='col-md-2 text-center'>$fechaEnvio</td>
        <td class='col-md-3 text-center'>$notas</td>


        <td class='col-md-1 text-right'>
          <a href='#' class='aEnvio spand-link mr-3' envio-id='$idEnvios'><img src='/fitcoControl/Resources/iconos/003-add.svg' class='spand-icon'></a>

          <a href='#' class='aVerTabla spand-link mr-3'  data-toggle='modal' data-target='#VisualizarEnvio' envio-id='$idEnvios'><img src='/fitcoControl/Resources/iconos/magnifier.svg' class='spand-icon'></a>
        </td>
      </tr>";

  }
  echo json_encode($data);
}
mysqli_free_result($resultado);
mysqli_close($conn);

?>
