<?php
if(isset($_REQUEST['pages'])){
    if($_REQUEST['pages'] === "Daftar peminjaman"){
        // DB
        $query = "SELECT bk.judul, bk.pengarang, pm.harus_kembali, pm.peminjaman_id FROM user us join peminjaman pm on us.user_id = pm.user_id join buku bk on pm.buku_id = bk.buku_id where pm.user_id = '$id' order by harus_kembali";
        $judul = $koneksi->query($query);

?>
<div class="daftar-pinjaman">
                <div class="daftar-pinjaman-value">
                    <div class="table">
                        <h1>Daftar Peminjaman</h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Buku</th>
                                    <th>Pencipta</th>
                                    <th>Tanggal kembali</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while($pinjam = $judul->fetch_assoc()){
                                    echo "<tr><td>".$no."</td><td>".$pinjam['judul']."</td><td>".$pinjam['pengarang'].'</td><td>'.$pinjam['harus_kembali']."</td></tr>";
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
<?php
}};
?>
