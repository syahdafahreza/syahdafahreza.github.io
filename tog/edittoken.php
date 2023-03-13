<?php
include 'configdb-main.php';

$id = $_GET['id_note'];
$judul = $_GET['judul_note'];
$isinote = $_GET['isi_note'];

//query update
$query = mysqli_query($mysqli,"UPDATE `notes` SET title='$ciphertext_juduledit' , text='$ciphertext_isinoteedit' WHERE id='$id' ");

if ($query) {
 # credirect ke page index
 header("location: notes.php");
}
else{
 echo "ERROR, data gagal diupdate". mysqli_error($mysqli);
}

//mysql_close($host);
?>