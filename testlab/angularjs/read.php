<?php

require_once 'koneksi.php'; 

$query = "SELECT * from mahasiswa";
$result = mysqli_query($con, $query);
$arr = array();
if(mysqli_num_rows($result) != 0) {
	while($row = mysqli_fetch_assoc($result)) {
			$arr[] = $row;
	}
}
// Return json array yang mengandung data dari database
echo $json_info = json_encode($arr);
?> 