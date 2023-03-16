<?php
include 'configdb-main.php';

if ($_GET['act'] == 'tambahtoken') {
    $token = $_POST['inputtoken'];

    //query buat
    $querytambah = mysqli_query($mysqli, "INSERT INTO `tokens` (id, tokens, claimby, validuntil) VALUES (NULL, '$token', NULL, NULL)");

    if ($querytambah) {
        # credirect ke page index
        header("location: token-manager.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($mysqli);
    }

    //mysql_close($host);
}

?>