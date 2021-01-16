<?php
require_once 'koneksi.php';
$kode = $_GET['kode'];
$q = "DELETE FROM sepeda WHERE kode='$kode'";
$result = mysqli_query($koneksi, $q);
// periska query apakah ada error
if(!$result){
    die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
        " - ".mysqli_error($koneksi));
} else {
//tampil alert dan akan redirect ke halaman index.php
//silahkan ganti index.php sesuai halaman yang akan dituju
echo "<script>alert('Data berhasil dihapus.');window.location='sepeda.php';</script>";
}