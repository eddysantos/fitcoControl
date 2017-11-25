<?php

function standard_date($i_date){
  $f_date = strtotime('d-m-Y', $i_date);
  return $f_date;
}

 ?>
