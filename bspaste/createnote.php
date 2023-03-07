<?php 
$databaseHost = 'localhost';
$databaseName = 'np';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if($_GET['act']== 'tambahnotes'){
    $namauser = '\''. $_POST['nama_user']."'";
    $judulbaru = '\''. $_POST['judul_note_baru']."'";
    $isinotebaru = '\''. $_POST['isi_note_baru']."'";
    // $tanggalsekarang = '\''. mysqli_query($mysqli, "SELECT NOW()")."'";

//query buat
$querytambah = mysqli_query($mysqli,"INSERT INTO `notes` (id, user, title, text) VALUES (NULL, $namauser, $judulbaru, $isinotebaru)");

if ($querytambah) {
 # credirect ke page index
 header("location: notes.php");
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($mysqli);
}

//mysql_close($host);
}

?>