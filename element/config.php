<?php
// inisialisasi database

// db online

// $host = 'sql12.freesqldatabase.com:3306';
// $username = 'sql12751448';
// $password = 'gFblZSiHFZ';
// $database = 'sql12751448';

// $koneksi = new mysqli($host, $username, $password, $database);

// // test koneksi
// if ($koneksi->connect_error) {
//     die("Koneksi gagal: " . $koneksi->connect_error);
// }

// db offline

$host = 'localhost';
$username = 'rensap10_eduflex';
$password = 'MysterZentoX01';
$database = 'rensap10_eduflex';

$koneksi = new mysqli($host, $username, $password, $database);

// test koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>