<?php
include "../../element/config.php";
$rfid = $_GET['rfid'];
$barang = $_GET['id_barang'];
$query = "SELECT user_id FROM user WHERE rfid = '$rfid'";
$id = $koneksi->query($query);
$idn = $id->fetch_assoc()['user_id'];


$query = "SELECT kt.nama_menu, kt.harga, kt.keterangan, us.saldo FROM user us join transaksi tr on us.user_id = tr.user_id join kantin kt on tr.menu_id = kt.menu_id where tr.user_id = '1' ORDER by transaksi_id desc limit 4";
$tabel = $koneksi->query($query);


$tanggal = date("Y-m-d");
$tanggal_kembali = date('Y-m-d', strtotime($tanggal. ' + 7 days'));;


// $var = [1,2,4];
foreach($barang as $x){
    $query = "SELECT menu_id FROM `kantin` WHERE menu_id = $x AND keterangan = 'membeli'";
    $var = $koneksi->query($query);
    $verify = $var->fetch_assoc()['menu_id'];
    $add = "INSERT INTO `transaksi`(`transaksi_id`, `user_id`, `menu_id`, `tanggal`) VALUES ('','$idn','$verify','$tanggal')";
    $dapat_saldo = "SELECT saldo FROM user WHERE user_id = $idn";
    $saldo = $koneksi->query($dapat_saldo)->fetch_assoc()['saldo'];
    $dapat_harga = "SELECT harga FROM `kantin` WHERE menu_id = $verify";
    $harga = $koneksi->query($dapat_harga)->fetch_assoc()['harga'];
    $hargaAfter = $saldo - $harga;
    $masuk = "UPDATE user SET saldo = $hargaAfter where user_id = $idn";
    if($hargaAfter >= 0){
    $koneksi->query($add);
    $koneksi->query($masuk);
}else{
    echo "gagal uang tidak cukup";
    // masuk ke mqtt
}}
?>