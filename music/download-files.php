<?php
$filename = $_GET['file'];  
if($filename!=""){
	header("Content-Length: " . filesize($filename));
	header('Content-Type: audio/mp3');
	header('Content-Disposition: attachment; filename=audiofile.mp3');
	readfile($filename);
}
?>