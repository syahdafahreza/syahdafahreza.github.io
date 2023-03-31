<?php
include 'configdb-main.php';
session_start();

$id = $_GET['id_note'];

//query update
$query = mysqli_query($mysqli,"DELETE FROM `notes` WHERE id='$id' ");

if ($query) {
 # credirect ke page index
 $_SESSION['delnotesukses'] = 'Notes berhasil dihapus';
 header("location: notes.php");
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($mysqli);
}

//mysql_close($host);
?>