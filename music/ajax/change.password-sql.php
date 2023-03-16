<?php include_once('../config.php');
if(isset($_REQUEST['current_pass']) and $_REQUEST['current_pass']!=""){
	extract($_REQUEST);
	$sql	=	"SELECT * FROM admins WHERE ID=".$uid."";
	$stmt	=	sqlsrv_query($connSQL, $sql);
	$row	=	sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC);
	
	if(trim($row['userpassword'])!=trim(md5($current_pass))){
		echo '<div class="text-danger text-center"><i class="fa fa-exclamation-circle"></i> Current password not match with old password.</div>|^***^|0|^***^|';
	}else{
		$sql	=	"UPDATE admins SET userpassword='".md5($pass)."' WHERE ID=".$uid."";
		sqlsrv_query($connSQL, $sql);
		echo '<div class="text-success text-center"><i class="fa fa-thumbs-up"></i> Password updated successfully.</div>|^***^|1|^***^|';
	}
}else{
	echo '<div class="text-danger text-center"><i class="fa fa-exclamation-circle"></i> Please provide current password first.</div>|^***^|0|^***^|';
}