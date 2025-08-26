<?php
include "../../element/config.php";
$buku = $_GET['id_produk'];
$query = "SELECT * FROM `kantin` where menu_id = $buku";
$hasil = $koneksi->query($query);

// $var = [1,2,4];
$no = 1;
while($x = $hasil->fetch_assoc()){
    $uang = $x['harga'];
    echo '
    {
        "data": "';

    echo '</td><td></td><td>' . $x['nama_menu'] . "</td><td></td><td>Rp " . number_format($x['harga'], 0, ",", ".") . "</td></tr>";
    
    echo '",
        "uang": ' . $uang . '
    }
    ';
    $no++;
}

?>