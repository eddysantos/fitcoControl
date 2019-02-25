<?php

$root = $_SERVER['DOCUMENT_ROOT'];
require $root . "/fitcoControl/Resources/PHP/DataBases/ConexionCalendario.php";


$accion = (isset($_GET['accion']))?$_GET['accion']:['leer'];
switch ($accion) {

  // AGREGAR AGREGAR AGREGAR AGREGAR AGREGAR AGREGAR AGREGAR AGREGAR AGREGAR AGREGAR
  case 'agregar':
    $sentenciaSQL = $pdo->prepare("INSERT INTO ct_ventasAgenda(title,cliente,motivo,contacto,telefono,start,end) VALUES(:title,:cliente,:motivo,:contacto,:telefono,:start,:end)");
    $respuesta = $sentenciaSQL->execute(array(
      "title"=>$_POST['title'],
      "cliente"=>$_POST['cliente'],
      "motivo"=>$_POST['motivo'],
      "contacto"=>$_POST['contacto'],
      "telefono"=>$_POST['telefono'],
      "start"=>$_POST['start'],
      "end"=>$_POST['end']
    ));
    echo json_encode($respuesta);

    break;

// ELIMINAR ELIMINAR ELIMINAR ELIMINAR ELIMINAR ELIMINAR ELIMINAR ELIMINAR ELIMINAR ELIMINAR
  case 'eliminar':
    $respuesta = false;
    if (isset($_POST['pk_agenda'])) {
      $sentenciaSQL = $pdo->prepare("DELETE FROM ct_ventasAgenda WHERE pk_agenda=:ID");
      $respuesta = $sentenciaSQL->execute(array("ID"=>$_POST['pk_agenda']));
    }
    echo json_encode($respuesta);
    break;


// MODIFICAR MODIFICAR MODIFICAR MODIFICAR MODIFICAR MODIFICAR MODIFICAR MODIFICAR MODIFICAR MODIFICAR
  case 'modificar':
    $sentenciaSQL = $pdo->prepare("UPDATE ct_ventasAgenda SET
    title=:title,
    cliente=:cliente,
    motivo=:motivo,
    contacto=:contacto,
    telefono=:telefono,
    start=:start,
    end=:end
    WHERE  pk_agenda=:pk_agenda");

    $respuesta = $sentenciaSQL->execute(array(
      "title"=>$_POST['title'],
      "cliente"=>$_POST['cliente'],
      "motivo"=>$_POST['motivo'],
      "contacto"=>$_POST['contacto'],
      "telefono"=>$_POST['telefono'],
      "start"=>$_POST['start'],
      "end"=>$_POST['end'],
      "pk_agenda" =>$_POST['pk_agenda']
    ));
    echo json_encode($respuesta);

    break;
  default:

//MOSTRAR REGISTROS EN PANTALLA
    $sentenciaSQL = $pdo->prepare("SELECT * FROM ct_ventasAgenda");
    $sentenciaSQL->execute();
    $resultado = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultado);
    break;
}

 ?>
