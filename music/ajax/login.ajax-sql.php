<?php include_once('../config.php');
if(isset($_REQUEST['email']) and $_REQUEST['email']!=""){
	extract($_REQUEST);
	
	$sql 		= 	"EXEC selectTestProcedure @useremail=?, @userpassword =?";
	$params 	= 	array(trim($email), trim(md5($password)));
	
	$stmt = sqlsrv_query( $connSQL , $sql, $params, array("Scrollable"=>"buffered"));
	$row		=	sqlsrv_fetch_array($stmt);
	$numRows	=	sqlsrv_num_rows($stmt);
	
	if($numRows>0){
		$_SESSION['id']		=	isset($row['ID'])?$row['ID']:'';
		$_SESSION['email']	=	isset($row['useremail'])?$row['useremail']:'';
		$_SESSION['user']	=	isset($row['username'])?$row['username']:'';
		echo '<div class="alert alert-success"><i class="fa fa-fw fa-thumbs-up"></i> Login successfully please wait...!</div>|^*^|1|^*^|';
	}else{
		echo '<div class="alert alert-danger"><i class="fa fa-fw fa-thumbs-down"></i> Incorrect Email/Password <strong>Try again.</strong></div>|^*^|0|^*^|';
	}
}