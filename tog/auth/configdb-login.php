<?php 
 
 $server = "localhost";
 $user = "epiz_33317858";
 $pass = "aRodYdr6aMF7L";
 $database = "epiz_33317858_tog";
 
$conn = mysqli_connect($server, $user, $pass, $database);
 
if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}
 
?>