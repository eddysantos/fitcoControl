<?php
// $root = $_SERVER['DOCUMENT_ROOT'];
//
// function utf8ize($d) {
//     if (is_array($d)) {
//         foreach ($d as $k => $v) {
//             $d[$k] = utf8ize($v);
//         }
//     } else if (is_string ($d)) {
//         return utf8_encode($d);
//     }
//     return $d;
// }
//
// $data = array(
//   'code'=>"",
//   'response'=>array()
// );
//
// require $root . '/fitcoControl/Resources/PHP/utilities/initialScript.php';
// $query = "SELECT * FROM ct_mantenimiento WHERE pk_mantenimiento = ?";
//
// $stmt = $conn->prepare($query);
// $stmt->bind_param('s', $_POST['mantId']);
// $stmt->execute();
//
// $resultados = $stmt->get_result();
// $num_rows = $stmt->num_rows;
//
// if (false) {
//   $data['code'] = 2;
//   $data['response'] = $num_rows;
// } else {
//   $data['code'] = 1;
//   while ($a = mysqli_fetch_assoc($resultados)) {
//     $data['response'] = $a;
//   }
// }
//
// $json = json_encode(utf8ize($data));
// echo $json;
?>
