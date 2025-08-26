<?php
include "../../element/config.php";
$rfid = $_GET['rfid'];
$buku = $_GET['id_buku'];
$query = "SELECT user_id FROM user WHERE rfid = '$rfid'";
$id = $koneksi->query($query);
$idn = $id->fetch_assoc()['user_id'];


$tanggal = date("Y-m-d");
$tanggal_kembali = date('Y-m-d', strtotime($tanggal. ' + 7 days'));;

// $var = [1,2,4];
foreach($buku as $x){
    $add = "INSERT INTO `peminjaman` (`peminjaman_id`, `buku_id`, `user_id`, `tanggal_pinjam`, `harus_kembali`, `denda`) VALUES ('','$x','$idn','$tanggal','$tanggal_kembali','')";
    $koneksi->query($add);}
    echo("berhasil")
?>
