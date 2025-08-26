<?php
if(!isset($_REQUEST['pages']) || $_REQUEST['pages'] === "Beranda"){
    // DB
    $query = "SELECT saldo from user WHERE user_id = '$id' AND saldo";
    $uang = $koneksi->query($query);

    $query = "SELECT kt.nama_menu, kt.harga, kt.keterangan, us.saldo FROM user us join transaksi tr on us.user_id = tr.user_id join kantin kt on tr.menu_id = kt.menu_id where tr.user_id = '$id' ORDER by transaksi_id desc limit 5";
    $transaksi = $koneksi->query($query);
    $harga = $koneksi->query($query);

    $query = "SELECT bk.judul, bk.pengarang, pm.harus_kembali, pm.peminjaman_id FROM user us join peminjaman pm on us.user_id = pm.user_id join buku bk on pm.buku_id = bk.buku_id where pm.user_id = '$id' order by harus_kembali";
    $judul = $koneksi->query($query);
    $tanggal = $koneksi->query($query);


?>
<div class="dashboard">
    <div class="header box three">
        <div class="header-value">
            <div class="header-left">
                <p>Selamat Datang,</p>
                <h1><?php echo($_SESSION['nama']); ?></h1>
            </div>
            <img src="assets/img/profiles/<?php echo($_SESSION['foto']) ?>" alt="profile-img">
        </div>
    </div>
    <div class="main">
        <div class="main-left box four">
            <div class="top">
                <h1>Saldo Anda</h1>
                <h2><?php echo "Rp ".number_format($uang->fetch_assoc()['saldo'],0,",",".")?></h2>
            </div>
            <div class="bottom">
                <p>Riwayat Transaksi:</p>
                <div class="riwayat">
                    <!-- Mainkan database disini -->
                    <!-- yang satu ini sebagai hard code -->
                    <ul class="barang">
                        <?php while($kiri = $transaksi ->fetch_assoc()){
                            echo "<li>Anda ".$kiri['keterangan']." ".$kiri['nama_menu']."</li>";
                        };?>
                    </ul>
                    <ul class="harga">
                        <?php while($kanan = $harga ->fetch_assoc()){
                            if($kanan['keterangan'] === "menambah"){
                                echo '<li class="green">+Rp '.number_format($kanan['harga'],0,",",".")."</li>";
                            }else{
                                echo '<li class="red">-Rp '.number_format($kanan['harga'],0,",",".")."</li>";
                        }};?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-right box five">
            <div class="top">
                <h1>Daftar pinjaman <br>Perpustakaan</h1>
            </div>
            <div class="bottom">
                <div class="riwayat">
                    <!-- Mainkan database disini -->
                    <!-- yang satu ini sebagai hard code -->
                    <ul class="barang">
                        <p>Nama Buku</p>
                        <?php 
                        $B = 1;
                        while($kiri = $judul ->fetch_assoc()){
                            if($B <= 5){
                                echo "<li>".$kiri['judul']."</li>";
                                $B++;
                            }
                        };?>
                    </ul>
                    <ul class="harga">
                        <p>tanggal kembali</p>
                        <?php 
                        $i = 1;
                        while($kanan = $tanggal ->fetch_assoc()){
                            if($i <= 5){
                                echo '<li>'.$kanan['harus_kembali']."</li>";
                                $i++;
                            }
                            // echo '<li class="countdown ke-'.$kanan['peminjaman_id'].'" data-date="'.$kanan['harus_kembali'].'" data-time="00:00">[<div class="day"><span class="num"></span><span class="word"></span></div>:<div class="hour"><span class="num"></span><span class="word"></span></div>:<div class="min"><span class="num"></span><span class="word"></span></div>:<div class="sec"><span class="num"></span><span class="word"></span></div>]';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
};?>
