<!-- Admin -->
<?php
switch($_SESSION['akses']){
    case '1':
?>
<ul class="menu-list one" id="menu-list">
    <li><h1>Beranda</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Beranda" class="<?php if(!isset($_REQUEST['pages']) || $_REQUEST['pages'] === "Beranda"){echo("in");};?>">Dashboard</a></p></li>
            <li><p><a href="?pages=Tentang kami" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Tentang kami"){echo("in");}}?>">Tentang kami</a></p></li>
        </div>
    <li><h1>Perpustakaan</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Daftar peminjaman" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Daftar peminjaman"){echo("in");}}?>">Daftar peminjaman</a></p></li>
            <li><p><a href="?pages=Form peminjaman" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Form peminjaman"){echo("in");}}?>">Form peminjaman</a></p></li>
            <li><p><a href="?pages=Form pengembalian" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Form pengembalian"){echo("in");}}?>">Form pengembalian</a></p></li>
        </div>
        <li><h1>Kantin</h1></li>
        <div class="menu-content">
            <li><p><a href="?pages=Saldo kantin" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Saldo kantin"){echo("in");}}?>">Saldo kantin</a></p></li>
            <li><p><a href="?pages=Form pembelian" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Form pembelian"){echo("in");}}?>">Form pembelian</a></p></li>
            <li><p><a href="?pages=Form keuangan" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Form keuangan"){echo("in");}}?>">Form Keuangan</a></p></li>
        </div>
    <li><h1>Kelas</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Kontrol kelas" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Kontrol kelas"){echo("in");}}?>">Kontrol kelas</a></p></li>
            <li><p><a href="?pages=Absen kelas" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Absen kelas"){echo("in");}}?>">Absen kelas</a></p></li>
        </div>
</ul>

<?php
        break;
    case '2':
?>
<!-- admin close -->
<!-- siswa -->
<ul class="menu-list one" id="menu-list">
<li><h1>Beranda</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Beranda" class="<?php if(!isset($_REQUEST['pages']) || $_REQUEST['pages'] === "Beranda"){echo("in");};?>">Dashboard</a></p></li>
            <li><p><a href="?pages=Tentang kami" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Tentang kami"){echo("in");}}?>">Tentang kami</a></p></li>
        </div>
    <li><h1>Perpustakaan</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Daftar peminjaman" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Daftar peminjaman"){echo("in");}}?>">Daftar peminjaman</a></p></li>
        </div>
            <li><h1>Kantin</h1></li>
        <div class="menu-content">
            <li><p><a href="?pages=Saldo kantin" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Saldo kantin"){echo("in");}}?>">Saldo kantin</a></p></li>
        </div>
    <li><h1>Kelas</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Absen kelas" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Absen kelas"){echo("in");}}?>">Absen kelas</a></p></li>
        </div>
</ul>

<?php
        break;
    case '3':
?>
<!-- siswa end -->
<!-- petugas perpustakaan -->
<ul class="menu-list one" id="menu-list">
<li><h1>Beranda</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Beranda" class="<?php if(!isset($_REQUEST['pages']) || $_REQUEST['pages'] === "Beranda"){echo("in");};?>">Dashboard</a></p></li>
            <li><p><a href="?pages=Tentang kami" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Tentang kami"){echo("in");}}?>">Tentang kami</a></p></li>
        </div>
    <li><h1>Perpustakaan</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Daftar peminjaman" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Daftar peminjaman"){echo("in");}}?>">Daftar peminjaman</a></p></li>
            <li><p><a href="?pages=Form peminjaman" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Form peminjaman"){echo("in");}}?>">Form peminjaman</a></p></li>
            <li><p><a href="?pages=Form pengembalian" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Form pengembalian"){echo("in");}}?>">Form pengembalian</a></p></li>
        </div>
        <li><h1>Kantin</h1></li>
        <div class="menu-content">
            <li><p><a href="?pages=Saldo kantin" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Saldo kantin"){echo("in");}}?>">Saldo kantin</a></p></li>
        </div>
    <li><h1>Kelas</h1></li>
    <div class="menu-content">
        <li><p><a href="?pages=Absen kelas" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Absen kelas"){echo("in");}}?>">Absen kelas</a></p></li>
        </div>
</ul>

<?php
        break;
    case '4':
?>
<!-- petugas perpustakaan end -->
<!-- petugas kantin -->
<ul class="menu-list one" id="menu-list">
<li><h1>Beranda</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Beranda" class="<?php if(!isset($_REQUEST['pages']) || $_REQUEST['pages'] === "Beranda"){echo("in");};?>">Dashboard</a></p></li>
            <li><p><a href="?pages=Tentang kami" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Tentang kami"){echo("in");}}?>">Tentang kami</a></p></li>
        </div>
    <li><h1>Perpustakaan</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Daftar peminjaman" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Daftar peminjaman"){echo("in");}}?>">Daftar peminjaman</a></p></li>
        </div>
        <li><h1>Kantin</h1></li>
        <div class="menu-content">
        <li><p><a href="?pages=Saldo kantin" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Saldo kantin"){echo("in");}}?>">Saldo kantin</a></p></li>
        <li><p><a href="?pages=Form pembelian" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Form pembelian"){echo("in");}}?>">Form pembelian</a></p></li>
</div>
    <li><h1>Kelas</h1></li>
    <div class="menu-content">
        <li><p><a href="?pages=Absen kelas" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Absen kelas"){echo("in");}}?>">Absen kelas</a></p></li>
        </div>
</ul>

<?php
        break;
    case '5':
?>
<!-- petugas kantin end -->
<!-- petugas keuangan -->
<ul class="menu-list one" id="menu-list">
<li><h1>Beranda</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Beranda" class="<?php if(!isset($_REQUEST['pages']) || $_REQUEST['pages'] === "Beranda"){echo("in");};?>">Dashboard</a></p></li>
            <li><p><a href="?pages=Tentang kami" class="<?php if(isset($_REQUEST['pages'])){if($_REQUEST['pages'] === "Tentang kami"){echo("in");}}?>">Tentang kami</a></p></li>
        </div>
    <li><h1>Perpustakaan</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Daftar peminjaman">Daftar peminjaman</a></p></li>
        </div>
        <li><h1>Kantin</h1></li>
        <div class="menu-content">
            <li><p><a href="?pages=Saldo kantin">Saldo kantin</a></p></li>
            <li><p><a href="?pages=Form keuangan">Form Keuangan</a></p></li>
        </div>
    <li><h1>Kelas</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Absen kelas">Absen kelas</a></p></li>
        </div>
</ul>

<?php
        break;
    case '6':
?>
<!-- petugas keuangan end -->
<!-- guru -->
<ul class="menu-list one" id="menu-list">
<li><h1>Beranda</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Beranda">Dashboard</a></p></li>
            <li><p><a href="?pages=Tentang kami">Tentang kami</a></p></li>
        </div>
    <li><h1>Perpustakaan</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Daftar peminjaman">Daftar peminjaman</a></p></li>
        </div>
        <li><h1>Kantin</h1></li>
        <div class="menu-content">
            <li><p><a href="?pages=Saldo kantin">Saldo kantin</a></p></li>
        </div>
    <li><h1>Kelas</h1></li>
    <div class="menu-content">
            <li><p><a href="?pages=Kontrol kelas">Kontrol kelas</a></p></li>
            <li><p><a href="?pages=Absen kelas">Absen kelas</a></p></li>
        </div>
</ul>

<?php
        break;
};
?>

<!-- guru end -->