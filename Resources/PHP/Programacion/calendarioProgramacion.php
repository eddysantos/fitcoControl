<?php
// 
// $root = $_SERVER['DOCUMENT_ROOT'];
// require $root . "/fitcoControl/Resources/PHP/DataBases/ConexionCalendario.php";
//
//
// $accion = (isset($_GET['accion']))?$_GET['accion']:['leer'];
// switch ($accion) {

  // AGREGAR AGREGAR AGREGAR AGREGAR AGREGAR AGREGAR AGREGAR AGREGAR AGREGAR AGREGAR
  // case 'agregar':
  //   $sentenciaSQL = $pdo->prepare("INSERT INTO ct_program(title,piezasRequeridas,color,textColor,start,end) VALUES(:title,:descripcion,:color,:textColor,:start,:end)");
  //
  //   $respuesta = $sentenciaSQL->execute(array(
  //     "title"=>$_POST['title'],
  //     "descripcion"=>$_POST['descripcion'],
  //     "color"=>$_POST['color'],
  //     "textColor"=>$_POST['textColor'],
  //     "start"=>$_POST['start'],
  //     "end"=>$_POST['end']
  //   ));
  //   echo json_encode($respuesta);
  //
  //   break;

// ELIMINAR ELIMINAR ELIMINAR ELIMINAR ELIMINAR ELIMINAR ELIMINAR ELIMINAR ELIMINAR ELIMINAR
  // case 'eliminar':
  //   $respuesta = false;
  //   if (isset($_POST['id'])) {
  //     $sentenciaSQL = $pdo->prepare("DELETE FROM ct_program WHERE pk_programacion=:ID");
  //     $respuesta = $sentenciaSQL->execute(array("ID"=>$_POST['id']));
  //   }
  //   echo json_encode($respuesta);
  //   break;


// MODIFICAR MODIFICAR MODIFICAR MODIFICAR MODIFICAR MODIFICAR MODIFICAR MODIFICAR MODIFICAR MODIFICAR
  // case 'modificar':
  //   $sentenciaSQL = $pdo->prepare("UPDATE ct_program SET
  //     title=:title,
  //     piezasRequeridas=:descripcion,
  //     color=:color,
  //     textColor=:textColor,
  //     start=:start,
  //     end=:end
  //     WHERE  pk_programacion=:ID");
  //
  //     $respuesta = $sentenciaSQL->execute(array(
  //       "title"=>$_POST['title'],
  //       "descripcion"=>$_POST['descripcion'],
  //       "color"=>$_POST['color'],
  //       "textColor"=>$_POST['textColor'],
  //       "start"=>$_POST['start'],
  //       "end"=>$_POST['end'],
  //       "ID" =>$_POST['id']
  //   ));
  //   echo json_encode($respuesta);
  //
  //   break;
  //
  // default:

//MOSTRAR REGISTROS EN PANTALLA
//     $sentenciaSQL= $pdo->prepare("SELECT * FROM ct_program");
//     $sentenciaSQL->execute();
//     $resultado= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
//
//     echo json_encode($resultado);
//     break;
// }





 ?>
