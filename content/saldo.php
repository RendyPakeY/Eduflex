<?php
if (isset($_REQUEST['pages'])) {
    if ($_REQUEST['pages'] === "Saldo kantin") {
        $query = "SELECT saldo from user WHERE user_id = '$id' AND saldo";
        $uang = $koneksi->query($query);

        $query = "SELECT kt.nama_menu, kt.harga, kt.keterangan, us.saldo FROM user us join transaksi tr on us.user_id = tr.user_id join kantin kt on tr.menu_id = kt.menu_id where tr.user_id = '$id' ORDER by transaksi_id desc limit 5";
        $transaksi = $koneksi->query($query);
        $saldo = $koneksi->query($query);
        $harga = $koneksi->query($query);
        $tabel = $koneksi->query($query);
                
?>
        <div class="saldo">
            <div class="saldo-value">
                <div class="header box three">
                    <div class="header-value one">
                        <div class="left">
                            <p>Jumlah saldo,</p>
                            <h1><?php echo ($_SESSION['nama']); ?></h1>
                        </div>
                        <div class="right">
                            <h1><?php $uang = $uang->fetch_assoc()['saldo'];
                                echo "Rp " . number_format($uang, 0, ",", ".") ?></h1>
                        </div>
                    </div>
                </div>
                <div class="main two box">
                    <div class="left">
                        <h1>Riwayat transaksi</h1>
                        <div class="riwayat">
                            <!-- Mainkan database disini -->
                            <!-- yang satu ini sebagai hard code -->
                            <ul class="barang">
                                <?php while ($kiri = $transaksi->fetch_assoc()) {
                                    echo "<li>Anda " . $kiri['keterangan'] . " " . $kiri['nama_menu'] . "</li>";
                                }; ?>
                            </ul>
                            <ul class="harga">
                                <?php
                                while ($awal = $saldo->fetch_assoc()) {
                                    if ($awal['keterangan'] === "menambah") {
                                        $uang = ($awal['harga'] * -1) + $uang;
                                    } else {
                                        $uang = $awal['harga'] + $uang;
                                    }
                                };
                                while ($kanan = $harga->fetch_assoc()) {
                                    $awal = $kanan['saldo'];
                                    if ($kanan['keterangan'] === "menambah") {
                                        echo '<li class="green">+Rp ' . number_format($kanan['harga'], 0, ",", ".") . "</li>";
                                    } else {
                                        echo '<li class="red">-Rp ' . number_format($kanan['harga'], 0, ",", ".") . "</li>";
                                    }
                                }; ?>
                            </ul>
                        </div>
                    </div>
                    <div class="right">
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var chart = c3.generate({
                bindto: '#chart',
                data: {
                    columns: [
                        ['saldo', <?php echo $uang . ",";
                                    $data = [];
                                    while ($hasil = $tabel->fetch_assoc()) {
                                        if ($hasil['keterangan'] === "menambah") {
                                            $data[] = $hasil['harga'];
                                        } else {
                                            $data[] = $hasil['harga'] * -1;
                                        }
                                    };
                                    $length = count($data);
                                    $fix = [];
                                    for ($i = $length - 1; $i >= 0; $i--) {
                                        $fix[] = $data[$i];
                                    }
                                    foreach($fix as $x){
                                        $uang = $uang + $x;
                                        echo $uang.", ";
                                    } ?>],
                                ],
                }
            });
            chart.resize({
                height: 250,
                width: 400
            })
        </script>
<?php
    }
};
?>