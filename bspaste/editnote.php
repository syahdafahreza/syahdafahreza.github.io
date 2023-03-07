<?php
$databaseHost = 'localhost';
$databaseName = 'np';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

$id = $_GET['id_note'];
$judul = $_GET['judul_note'];
$isinote = $_GET['isi_note'];

//query update
$query = mysqli_query($mysqli,"UPDATE `notes` SET title='$judul' , text='$isinote' WHERE id='$id' ");

if ($query) {
 # credirect ke page index
 header("location: notes.php");
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($mysqli);
}

//mysql_close($host);
?>