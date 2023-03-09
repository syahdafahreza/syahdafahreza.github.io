<?php
$databaseHost = 'localhost';
$databaseName = 'np';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if ($_GET['act'] == 'tambahnotes') {
    $namauser = '\'' . $_POST['nama_user'] . "'";
    // $judulbaru = "\"" . $_POST['judul_note_baru'] . "\"";
    // $isinotebaru = "\"" . $_POST['isi_note_baru'] . "\"";
    $judulbaru = $_POST['judul_note_baru'];
    $isinotebaru = $_POST['isi_note_baru'];
    // $tanggalsekarang = '\''. mysqli_query($mysqli, "SELECT NOW()")."'";

    // Encryption Judul
    $key = 'pass';
    $plaintext_judulbaru = $judulbaru;
    $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext_judulbaru, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
    $ciphertext_judulbaru = base64_encode($iv . $hmac . $ciphertext_raw);

    // Encryption Isi Teks
    $key = 'pass';
    $plaintext_isinotebaru = $isinotebaru;
    $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
    $iv = openssl_random_pseudo_bytes($ivlen);
    $ciphertext_raw = openssl_encrypt($plaintext_isinotebaru, $cipher, $key, $options = OPENSSL_RAW_DATA, $iv);
    $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary = true);
    $ciphertext_isinotebaru = base64_encode($iv . $hmac . $ciphertext_raw);

    //query buat
    $querytambah = mysqli_query($mysqli, "INSERT INTO `notes` (id, user, title, text) VALUES (NULL, $namauser, '$ciphertext_judulbaru', '$ciphertext_isinotebaru')");

    if ($querytambah) {
        # credirect ke page index
        header("location: notes.php");
    } else {
        echo "ERROR, data gagal diupdate" . mysqli_error($mysqli);
    }

    //mysql_close($host);
}

?>