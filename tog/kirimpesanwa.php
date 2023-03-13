<?php

$namauser = $_GET['namauser'];
$pesanuser = $_GET['pesanuser'];
$ussertoken = $_GET['usertoken'];

if (isset($namauser , $pesanuser, $ussertoken)) {
    header("location: https://web.whatsapp.com/send?phone=+6281916436208&text=".$namauser.": ".$pesanuser." -UserToken: ".$ussertoken);
}

?>