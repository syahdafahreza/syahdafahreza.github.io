<?php 
include 'configdb-main.php';
session_start();

    // Hapus semua token yang ada
    $queryhpsalltoken = mysqli_query($mysqli, "DELETE FROM `tokens`");
    if ($queryhpsalltoken){
        $_SESSION['delalltokensukses'] = 'Semua token berhasil dihapus!';
        // unset($_POST['submit']);
        header("location: token-manager.php");
    }else {
        trigger_error(mysqli_error($mysqli), E_USER_ERROR);
    }

?>