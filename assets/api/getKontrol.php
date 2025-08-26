<?php
include "../../element/config.php";
if (isset($_GET['kelas']) && !isset($_GET['elk'])){
    $kelas = $_GET['kelas'];
    $query = "SELECT * FROM `kelas` WHERE kelas = '$kelas'";
    $relay = $koneksi->query($query);
    echo "{";
        while ($x = $relay->fetch_assoc()) {
            for ($i = 1; $i <= 8; $i++) {
                echo '"relay'.$i.'": '. $x['re'.$i];
                if($i != 8) echo ",";
            }
        }
        echo "}";
    }
    else if(isset($_GET['elk']) && isset($_GET['kelas'])){
        $elk = $_GET['elk'];
        $con = $_GET['value'];
        $kelas = $_GET['kelas'];
        $query = "UPDATE kelas SET $elk=$con WHERE kelas='$kelas'";
        $koneksi->query($query);
}
