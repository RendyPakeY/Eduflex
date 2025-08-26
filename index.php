<?php
session_start();
if (!isset($_SESSION['nama'])) {
    header("location: login/");
};
include "element/config.php";
$id = $_SESSION['user_id'];
// $query = "SELECT saldo from user WHERE user_id = '$id' AND saldo";
// $uang = $koneksi->query($query);
// $query = "SELECT kt.nama_menu, kt.harga, kt.keterangan, us.saldo FROM user us join transaksi tr on us.user_id = tr.user_id join kantin kt on tr.menu_id = kt.menu_id where tr.user_id = '$id' ORDER by transaksi_id desc limit 5";
// $transaksi = $koneksi->query($query);
// $saldo = $koneksi->query($query);
// $harga = $koneksi->query($query);
// $tabel = $koneksi->query($query);
// $query = "SELECT bk.judul, bk.pengarang, pm.harus_kembali, pm.peminjaman_id FROM user us join peminjaman pm on us.user_id = pm.user_id join buku bk on pm.buku_id = bk.buku_id where pm.user_id = '$id'";
// $judul = $koneksi->query($query);
// $tanggal = $koneksi->query($query);
// $co = $koneksi->query($query);
// $query = "SELECT kl.* FROM kelas kl JOIN user us on kl.kelas = us.kelas where us.user_id = $id";
// $kontrol = $koneksi->query($query);
// $namaKelas = $koneksi->query($query);
// $query = "SELECT * FROM `buku` order by judul";
// $buku = $koneksi->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if (!isset($_REQUEST['pages'])) {
                echo ("Beranda");
            } else {
                echo ($_REQUEST['pages']);
            }; ?> | Edu-Flex</title>
    <link rel="icon" href="assets/img/icon.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.css" rel="stylesheet">
</head>

<body>
    <header>
        <div id="preload"></div>
        <nav>
            <div class="logo">
                <i class="fa-solid fa-bars bar" onclick="kanan()"></i>
                <img class="logo-img" src="assets/img/icon.png" alt="Logo">
                <h1>Edu-Flex</h1>
            </div>
            <div class="user last">
                <div class="user-information">
                    <p><?php echo ($_SESSION['nama']); ?></p>
                    <p>Status: <?php switch ($_SESSION['akses']) {
                                    case '1':
                                        echo ('Admin');
                                        break;
                                    case '2':
                                        echo ('Siswa');
                                        break;
                                    case '3':
                                        echo ('Petugas perpustakaan');
                                        break;
                                    case '4':
                                        echo ('Petugas kantin');
                                        break;
                                    case '5':
                                        echo ('Petugas keuangan');
                                        break;
                                    case '6':
                                        echo ('Guru');
                                        break;
                                } ?></p>
                </div>
                <img onclick="cone()" src="assets/img/profiles/<?php echo ($_SESSION['foto']) ?>" alt="User-Profiles">
            </div>
            <div class="logout box" id="logout">
                <img src="assets/img/profiles/<?php echo ($_SESSION['foto']) ?>" alt="User-Profiles">
                <h1><?php echo ($_SESSION['nama']); ?></h1>
                <p>Status: <?php switch ($_SESSION['akses']) {
                                case '1':
                                    echo ('Admin');
                                    break;
                                case '2':
                                    echo ('Siswa');
                                    break;
                                case '3':
                                    echo ('Petugas perpustakaan');
                                    break;
                                case '4':
                                    echo ('Petugas kantin');
                                    break;
                                case '5':
                                    echo ('Petugas keuangan');
                                    break;
                                case '6':
                                    echo ('Guru');
                                    break;
                            } ?></p>
                <a href="element/logout.php" class="red-btn">Keluar dari Akun</a>
            </div>
        </nav>
    </header>
    <main>
        <section class="menu-container box left" id="menu">
            <?php
            include "content/menu-content.php";
            ?>
            <i class="fa-solid fa-xmark cross" onclick="kanan()"></i>
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/5.16.0/d3.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.7.20/c3.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>


        <section class="right content-container box">
            <?php
            include "content/absen.php";
            include "content/daftar-pinjaman.php";
            include "content/dashboard.php";
            include "content/form-keuangan.php";
            include "content/form-pembelian.php";
            include "content/form-peminjaman.php";
            include "content/form-pengembalian.php";
            include "content/kontrol.php";
            include "content/saldo.php";
            include "content/tentang.php";
            ?>
        </section>
    </main>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="assets/js/index.js"></script>
    <script src="https://kit.fontawesome.com/cc079fac56.js" crossorigin="anonymous"></script>
</body>

</html>