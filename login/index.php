<?php
session_start();
if(isset($_SESSION['nama'])){
    header('location: ../');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login-style.css">
    <link rel="icon" href="../assets/img/icon.png">
    <title>Selamat Datang | Edu-Flex</title>
</head>
<body>
    <section class="background">
        <div id="preload"></div>
        <div class="logo">
            <img class="logo-img" src="../assets/img/icon.png" alt="Logo">
            <h1>Edu-Flex</h1>
        </div>
        <div class="login-container">
            <h1 class="one">Masuk</h1>
            <form action="../element/login.php" method="post">
                <label for="username" class="two">Username</label>
                <input name="username" class="two" type="text" required placeholder="Masukan Username Anda">
                <label for="Password" class="three">Password</label>
                <input name="password" class="three" type="password" required placeholder="Masukan Password Anda">
                <a class="four" href="https://mail.google.com/mail/u/0/?fs=1&to=smart.master@gmail.com&body=Halo+Saya+ingin+memulihkan+akun+saya&tf=cm">Lupa Password ?</a>
                <button onclick="setelahSubmit()" id="five" class="five" type="submit">Masuk sekarang</button>
                <p class="five" style="color: rgb(220, 220, 0); font-size: .7rem"><?php
                if(isset($_REQUEST['error'])) echo("Maaf, terjadi kesalahan pada saat proses login<br>silahkan masukan data kembali dan coba lagi")
                ?></p>
            </form>
        </div>
        <div class="background-content-container">
            <div class="background-content">
                <h1>Selamat Datang Pengguna Edu-Card</h1>
                <p>Kartu Pintar Berbasis IoT</p>
            </div>
        </div>
        <a class="sumber" href="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGVvcGxlJTIwdXNpbmclMjB0ZWNobm9sb2d5fGVufDB8fDB8fHww">Sumber Gambar</a>
    </section>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://kit.fontawesome.com/cc079fac56.js" crossorigin="anonymous"></script>
    <script src="../assets/js/login-index.js"></script>
</body>
</html>