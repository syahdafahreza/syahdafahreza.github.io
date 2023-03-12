<?php
include 'configdb-main.php';

$id = $_GET['id_note'];
$judul = $_GET['judul_note'];
$isinote = $_GET['isi_note'];

// Encryption Judul
$key = 'pass';
$plaintext_judulbaru = $judul;
$ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
$iv = openssl_random_pseudo_bytes($ivlen);
$ciphertext_raw = openssl_encrypt($plaintext_judulbaru, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
$hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
$ciphertext_juduledit = base64_encode($iv . $hmac . $ciphertext_raw);

// Encryption Isi Teks
$key = 'pass';
$plaintext_isinotebaru = $isinote;
$ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
$iv = openssl_random_pseudo_bytes($ivlen);
$ciphertext_raw = openssl_encrypt($plaintext_isinotebaru, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
$hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
$ciphertext_isinoteedit = base64_encode($iv . $hmac . $ciphertext_raw);

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