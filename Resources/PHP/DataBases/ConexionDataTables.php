


 <?php
 function getConexion()
 {
     $cn = new mysqli("localhost", "root", "root", "Fitco", 8889);
     $cn->set_charset("utf-8");
     if (!$cn->errno) {
         die("<h2 style='color:red;'>Error en la conexion</h2>" . $cn->errno);
         $cn->close();
     }
     return $cn;
 }

 ?>
