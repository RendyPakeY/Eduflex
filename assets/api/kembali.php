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
    $check = "SELECT * FROM `peminjaman` WHERE user_id = $idn and buku_id = $x order by harus_kembali asc limit 1";
    $hasil = $koneksi->query($check);
    if(!isset($hasil->fetch_assoc()["user_id"])){
        echo "gagal";
    }else{
        $add = "DELETE FROM `peminjaman` WHERE user_id = $idn and buku_id = $x order by harus_kembali asc limit 1";
        $koneksi->query($add);
        echo "berhasil";
    }
};

?>
