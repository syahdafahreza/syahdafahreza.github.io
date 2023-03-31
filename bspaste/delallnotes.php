<?php 
include 'configdb-main.php';
session_start();

    // Hapus semua token yang ada
    $queryhpsallnote = mysqli_query($mysqli, "DELETE FROM `tokens`");
    if ($queryhpsallnote){
        $_SESSION['delallnotesukses'] = 'Semua notes berhasil dihapus!';
        // unset($_POST['submit']);
        header("location: notes.php");
    }else {
        trigger_error(mysqli_error($mysqli), E_USER_ERROR);
    }

?>