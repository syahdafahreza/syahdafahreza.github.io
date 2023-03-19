<?php
include 'configdb-main.php';
session_start();

// Mencari nilai terbesar di field id
$querymaxid = mysqli_query($mysqli, "SELECT MAX( `id` ) FROM `tokens` ");
$lastmaxid = mysqli_fetch_assoc($querymaxid);
$idterakhir = $lastmaxid['MAX( `id` )']+1;

if ($_GET['act'] == 'tambahtoken') {
    $token = $_POST['inputtoken'];

    //query buat
    $querytambah = mysqli_query($mysqli, "INSERT INTO `tokens` (id, tokens, claimby, makedate, validuntil) VALUES ('$idterakhir', '$token', NULL, NOW(), NULL)");

    if ($querytambah) {
        # credirect ke page index
        //set session sukses
        $_SESSION["inptokensukses"] = 'Token '.$token.' berhasil disimpan';
        header("location: token-manager.php");
        

    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($mysqli);
    }

    //mysql_close($host);
}



?>