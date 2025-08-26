<?php
include "../../element/config.php";
$buku = $_GET['id_buku'];
$query = "SELECT * FROM `buku` where buku_id = $buku order by judul";
$hasil = $koneksi->query($query);

// $var = [1,2,4];
$no = 1;
while($x = $hasil->fetch_assoc()){
    echo '</td><td>' . $x['judul'] . "</td><td>" . $x['pengarang'] . "</td><td>B.K." . $x['buku_id'] . "</td></tr>";
    $no++;
}

?>