<?php

session_start();
session_destroy();

header("Location: /fitcoControl/index.php");
?>
