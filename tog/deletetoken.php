<?php
include 'configdb-main.php';

$id = $_GET['id_token'];

//query update
$query = mysqli_query($mysqli,"DELETE FROM `tokens` WHERE id='$id'");

if ($query) {
 # credirect ke page index
 header("location: token-manager.php");
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($mysqli);
}

//mysql_close($host);
?>