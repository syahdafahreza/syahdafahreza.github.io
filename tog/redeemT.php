<?php 
$token = $_POST['inputtoken'];
 
if($token == ""){
	header("location: redeem.php?token=null");
}else{
	header("location: redeem.php?token=".$token);
}
?>