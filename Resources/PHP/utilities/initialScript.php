<?php

error_reporting(E_ALL);
// error_reporting(E_ALL ^ E_NOTICE);

include($root . "/fitcoControl/Resources/PHP/DataBases/Conexion.php");
date_default_timezone_set('America/Monterrey');




function exit_script($input_array){
  $json_string = json_encode($input_array);
  echo $json_string;
  global $conn;
  $conn->close();
  die();

}


 ?>
