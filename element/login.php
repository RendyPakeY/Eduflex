<?php
include "../element/config.php";

$postUsername = $_POST['username'];
$postPassword = $_POST['password'];

$verify = "SELECT * FROM user WHERE username = '$postUsername' AND password = '$postPassword'";
$result = $koneksi->query($verify);



if ($result->num_rows == 1) {
    // Pengguna ditemukan, izinkan pengguna untuk masuk
    session_start();
    while($dataOut = $result->fetch_assoc()){
        $_SESSION['nama'] = $dataOut['nama'];
        $_SESSION['akses'] = $dataOut['akses'];
        $_SESSION['foto'] = $dataOut['foto'];
        $_SESSION['user_id'] = $dataOut['user_id'];
    }
    header("Location: ../"); // Gantilah dengan halaman setelah login
} else {
    // Pengguna tidak ditemukan atau password salah
    header("Location: ../login?error=1"); // Gantilah dengan halaman setelah login
}

unset($_POST['password']);
return;
$koneksi->close();
?>