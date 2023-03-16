<?php include_once('../config.php');
if(isset($_REQUEST['current_pass']) and $_REQUEST['current_pass']!=""){
	extract($_REQUEST);
	$row		=	$db->getAllRecords(TB_ADMIN,'*',' AND ID='.$uid.'');
	if($row[0]['ID']==$uid){
		if($row[0]['userpassword']==md5($_REQUEST['current_pass'])){
			$data	=	array( 'userpassword'=>md5($pass), );
			$db->update(TB_ADMIN,$data,array('ID'=>$uid));
			echo '<div class="text-success text-center"><i class="fa fa-thumbs-up"></i> Password updated successfully.</div>|^***^|1|^***^|';
		}else{
			echo '<div class="text-danger text-center"><i class="fa fa-exclamation-circle"></i> Current password not match with old password.</div>|^***^|0|^***^|';
		}
	}else{
		echo '<div class="text-danger text-center"><i class="fa fa-exclamation-circle"></i> You trying to access wrong password.</div>|^***^|0|^***^|';
	}
}else{
	echo '<div class="text-danger text-center"><i class="fa fa-exclamation-circle"></i> Please provide current password first.</div>|^***^|0|^***^|';
}