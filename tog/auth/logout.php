<?php 

include 'configdb-login.php';
session_start();
session_destroy();
 
header("Location: /tog/");
 
?>