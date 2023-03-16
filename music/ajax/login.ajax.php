<?php include_once('../config.php');
if(isset($_REQUEST['email']) and $_REQUEST['email']!=""){
	extract($_REQUEST);
	$row		=	$db->getAllRecords(TB_ADMIN,'*',' AND useremail="'.$email.'" AND userpassword="'.md5($password).'"');
	if(count($row)>0){
		$_SESSION['id']		=	isset($row[0]['ID'])?$row[0]['ID']:'';
		$_SESSION['email']	=	isset($row[0]['useremail'])?$row[0]['useremail']:'';
		$_SESSION['user']	=	isset($row[0]['username'])?$row[0]['username']:'';
		echo '<div class="alert alert-success"><i class="fa fa-fw fa-thumbs-up"></i> Login successfully please wait...!</div>|^*^|1|^*^|';
	}else{
		echo '<div class="alert alert-danger"><i class="fa fa-fw fa-thumbs-down"></i> Incorrect Email/Password <strong>Try again.</strong></div>|^*^|0|^*^|';
	}
}
