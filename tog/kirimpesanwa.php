<?php

$namauser = $_GET['namauser'];
$pesanuser = $_GET['pesanuser'];
$ussertoken = $_GET['usertoken'];
$responsetoken = $_GET['userresponsetoken'];

if (isset($namauser, $pesanuser, $ussertoken, $responsetoken)) {
    header("location: https://api.whatsapp.com/send/?phone=6281916436208&text=".$namauser.": ".$pesanuser."%0A%0A*UserToken: ".$ussertoken."%0A*ResponseToken: ".$responsetoken);
}

?>