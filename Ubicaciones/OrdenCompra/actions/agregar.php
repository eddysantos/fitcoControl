<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';


$conn->query('LOCK TABLES ct_ordenCompra WRITE;'); //Bloquea las tablas a otros usuarios.
$conn->query("SET TRANSACTION ISOLATION LEVEL READ UNCOMMITTED;"); //Lo revisara Lalo

try{
	$conn->begin_transaction(); //Inicia la transaccion

  $usuarioSolicitud = trim($_POST['usuarioSolicitud']);
  $item = trim($_POST['item']);
  $descripcion = trim($_POST['descripcion']);
  $vitalDesechable = trim($_POST['vitalDesechable']);
  $fechaRequerido = trim($_POST['fechaRequerido']);
  $fecha_reg = trim($_POST['fecha_reg']);
  $cantidad = trim($_POST['cantidad']);
  $opcion = 0;


  $query = "INSERT INTO ct_ordenCompra (item,
                                        descripcion,
                                        fechaRequerido,
                                        vitalDesechable,
                                        cantidad,
                                        usuarioSolicitud,
                                        opcion,
                                        fechaRegistro) VALUES (?,?,?,?,?,?,?,?)";

  $stmt = $conn->prepare($query);
  if (!($stmt)) {
    $system_callback['code'] = "500";
    $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
    exit_script($system_callback);
  }

  $stmt->bind_param('ssssssss',$item,$descripcion,$fechaRequerido,$vitalDesechable,$cantidad,$usuarioSolicitud,$opcion,$fecha_reg);
  if (!($stmt)) {
    $system_callback['code'] = "500";
    $system_callback['message'] = "Error during variables binding [$stmt->errno]: $stmt->error";
    exit_script($system_callback);
  }

  if (!($stmt->execute())) {
    $system_callback['code'] = "500";
    $system_callback['message'] = "Error durante la ejecucion [$stmt->errno]: $stmt->error";
    exit_script($system_callback);
  }

  $affected = $stmt->affected_rows;
  $system_callback['affected'] = $affected;
  $system_callback['datos'] = $_POST;

  if ($affected == 0) {
    $system_callback['code'] = 2;
    $system_callback['message'] = "El query no hizo ningún cambio a la base de datos";
    exit_script($system_callback);
  }

  // $system_callback['code'] = 1;
  // $system_callback['message'] = "Script called successfully!";


	$pk_orden = $conn->insert_id; //Te devuelve el ID que se acaba de insertar.

  // note¨: AQUI PONES EL QUERY PARA HACER INSSERT DE LAS COTIZACIONES. -> fkid_oc = $pk_orden.

  $queryMostrar = "SELECT pk_orden FROM ct_ordenCompra WHERE pk_orden = $pk_orden";

  $stmt = $conn->prepare($queryMostrar);
  if (!($stmt)) {
    $system_callback['code'] = "500";
    $system_callback['message'] = "Error durante la ejecucion del query [$conn->errno]: $conn->error";
    exit_script($system_callback);
  }

  if (!($stmt->execute())) {
    $system_callback['code'] = "500";
    $system_callback['message'] = "Error durante la ejecucion [$stmt->errno]: $stmt->error";
    exit_script($system_callback);
  }

  $rslt = $stmt->get_result();

  if ($affected == 0) {
    $system_callback['code'] = 2;
    $system_callback['message'] = "El query no hizo ningún cambio a la base de datos";
    exit_script($system_callback);
  }


  while ($row = $rslt->fetch_assoc()) {
    $pk_orden = utf8_encode($row['pk_orden']);


    $system_callback['data'] .="
        <input id='_pk_orden' class='bt border-0 h20 text-left' type='text' value='$pk_orden'>";
  }


	$conn->commit();
	$conn->query('UNLOCK TABLES;');
  $system_callback['code'] = 1;
  $system_callback['message'] = "Script called successfully!";
} catch (\Exception $e) {
	$conn->rollback();
  $system_callback['code'] = 501;
  $system_callback['message'] = $conn->error;
	// Aquí pondrías cualquier codigo para manejar cualquier error.
}

exit_script($system_callback);

?>
