<?php 
include 'configdb-main.php';
session_start();
$token = $_POST['inputtoken'];
if (!isset($_SESSION['usernametog'])) {
    header("Location: auth/index.php");
} else {
    $namauser = '\'' . $_SESSION['usernametog'] . "'";
}
 
if($token == ""){
	$_SESSION["rdmtokengagal"] = 'Token ' . $token . ' telah kedaluwarsa, tidak valid, atau sudah di-claim';
	header("location: redeem.php?token=null");
}else{
	
	// header("location: redeem.php?token=".$token);
}
if (isset($_POST['submit'])) {

    $token = $_POST['inputtoken'];
    $responsetoken = $_POST['rsptoken'];
    // echo "<script>alert('".$inputtokenQ."')</script>";
    $hasilkueritokenQ = mysqli_query($mysqli, "SELECT * FROM tokens WHERE tokens='$token' AND claimby is null;");
    $rowtokenQ = mysqli_fetch_row($hasilkueritokenQ);
    if (!$hasilkueritokenQ) {
        trigger_error(mysqli_error($mysqli), E_USER_ERROR);
    } else {
        if ($rowtokenQ[1] == $token) {
            //query update
            $query = mysqli_query($mysqli, "UPDATE `tokens` SET `claimby`=$namauser, `responsetokens`='$responsetoken' , `claimdate`=NOW(), `validuntil`=DATE_ADD(NOW(), INTERVAL 1 DAY) WHERE `tokens`='$token'");
            if ($query) {
                # credirect ke page index
                // header("location: notes.php");
                $_SESSION["rdmtokensukses"] = 'Token ' . $token . ' Berhasil Di-redeem';
				header("Location: redeem.php");
            } else {
				// $_SESSION["rdmtokengagal"] = 'Token ' . $token . ' telah kedaluwarsa, tidak valid, atau sudah di-claim';
                trigger_error(mysqli_error($mysqli), E_USER_ERROR);
            }
            $_SESSION["rdmtokensukses"] = 'Selamat!. Token ' . $token . ' Berhasil Di-redeem';
            // echo "<script>window.location = 'redeem.php';</script>";
            header("Location: redeem.php");
        } else {
            $_SESSION["rdmtokengagal"] = 'Token ' . $token . ' telah kedaluwarsa, tidak valid, atau sudah di-claim';
            header("Location: redeem.php");
        }
    }
    // echo "<script>alert('".$rowtokenQ[1]."')</script>";
}
?>