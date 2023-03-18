<?php
include 'configdb-main.php';

$id = $_GET['id_token'];
$token = $_GET['input_token'];
$claimby = $_GET['input_claimby'];
$claimby2 = $claimby;
$validuntil = $_GET['input_validuntil'];
$validuntil2 = $validuntil;

if ($validuntil == null){
    $query = mysqli_query($mysqli,"UPDATE `tokens` SET tokens='$token' , claimby='$claimby', validuntil=null WHERE id='$id' ");
}else{
    $query = mysqli_query($mysqli,"UPDATE `tokens` SET tokens='$token' , claimby='$claimby', validuntil='$validuntil' WHERE id='$id' ");
}


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