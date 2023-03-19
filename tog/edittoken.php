<?php
include 'configdb-main.php';
session_start();

$id = $_GET['id_token'];
$token = $_GET['input_token'];
$responsetoken = $_GET['input_response_token'];
$claimby = $_GET['input_claimby'];
$claimby2 = NULL;
$validuntil = $_GET['input_validuntil'];
$validuntil2 = NULL;

if ($claimby != null){
    $claimby2 = "'".$claimby."' ";
}else{
    $claimby2 = 'NULL';
}
if ($validuntil != null){
    $validuntil2 = "'".$validuntil."' ";
}else{
    $validuntil2 = 'NULL';
}

// echo "Claimby: ". $claimby2;
// echo "Validuntil: ". $validuntil2;

// die();
//query update
$query = mysqli_query($mysqli,"UPDATE `tokens` SET tokens='$token' , responsetokens='$responsetoken' , claimby=$claimby2 , validuntil=$validuntil2 WHERE id='$id';");

if ($query) {
 # credirect ke page index
 $_SESSION["edittokensukses"] = 'Token '.$token.' berhasil di edit';
 header("location: token-manager.php");
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($mysqli);
}

//mysql_close($host);
?>