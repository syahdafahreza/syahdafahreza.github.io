<?php
include 'configdb-main.php';
session_start();

$querymaxid = mysqli_query($mysqli, "SELECT MAX( `id` ) FROM `tokens` ");
$id = $_GET['id_token'];
$lastid = $_GET['id_token'];

//query update
$query = mysqli_query($mysqli,"DELETE FROM `tokens` WHERE id='$id'");

// for ($i=0;$i<$lastid;$i++){
// 
// }

if ($query) {
 # credirect ke page index
 $_SESSION["deltokensukses"] = 'Token '.$token.' Berhasil Dihapus';
 header("location: token-manager.php");
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($mysqli);
}

//mysql_close($host);
?>