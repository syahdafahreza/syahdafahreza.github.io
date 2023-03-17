<?php
include 'configdb-main.php';

$id = $_GET['id_token'];
$token = $_GET['input_token'];
$claimby = $_GET['input_claimby'];
$validuntil = $_GET['input_validuntil'];

//query update
$query = mysqli_query($mysqli,"UPDATE `tokens` SET tokens='$token' , claimby='$claimby', validuntil='$validuntil' WHERE id='$id' ");

if ($query) {
 # credirect ke page index
 header("location: token-manager.php");
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($mysqli);
}

//mysql_close($host);
?>