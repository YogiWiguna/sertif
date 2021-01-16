<?php
  require_once 'koneksi.php';
  $koden = $_GET['kode'];
  $query = "SELECT * FROM sepeda WHERE kode = '$koden'";
    $result = mysqli_query($koneksi, $query);
    $sepeda = mysqli_fetch_assoc($result);
  if (isset($_POST['tombol'])){
      $nama = $_POST['nama'];
    //   $kode = $_POST['kode'];
      $merek = $_POST['merek'];
      $jenis = $_POST['jenis'];
      $peruntukan = $_POST['peruntukan'];
      $jumlah = $_POST['jumlah'];
      $tanggal = $_POST['tanggal'];

      $q = "UPDATE sepeda SET nama='$nama', merek='$merek', jenis='$jenis', peruntukan='$peruntukan', jumlah='$jumlah', tanggal='$tanggal' WHERE kode='$koden'";
      $result = mysqli_query($koneksi, $q);
        // periska query apakah ada error
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                " - ".mysqli_error($koneksi));
        } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
        echo "<script>alert('Data berhasil diupdate.');window.location='sepeda.php';</script>";
        }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Indah flower shop</title>
    <style type="text/css">
       body {
      background-color:pink;
      background-image:url(URLGAMBAR);
      }
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: purple;
      }
    button {
          background-color: purple;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background:#B0E0E6;
      border: 2px solid #fff;
      outline-color: purple;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 400px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Tambah Produk</h1>
      <center>
      <form method="POST" action="" >
      <section class="base">
        <div>
          <label>Kode Sepeda</label>
          <input type="text" name="kode" autofocus="" required="" disabled value="<?= $sepeda['kode'] ?>" />
        </div>
        <div>
          <label>Nama</label>
          <input type="text" name="nama" autofocus="" required="" value="<?= $sepeda['nama'] ?>" />
        </div>
        <div>
          <label>Merek</label>
         <input type="text" name="merek" required value="<?= $sepeda['merek'] ?>" />
        </div>
        <div>
          <label>Jenis</label>
         <input type="text" name="jenis" required="" value="<?= $sepeda['jenis'] ?>" />
        </div>
        <div>
            <label>Peruntukan</label>
            <select name="peruntukan" required>
                <option <?php if(strcmp($sepeda['peruntukan'], "laki-laki") == 0) echo 'selected' ?> value="laki-laki">Laki - Laki</option>
                <option <?php if(strcmp($sepeda['peruntukan'], "perempuan") == 0) echo 'selected' ?> value="perempuan">Perempuan</option>
            </select>
        </div>
        <div>
          <label>Jumlah</label>
         <input type="number" name="jumlah" required="" value="<?= $sepeda['jumlah'] ?>" />
        </div>
        <div>
          <label>Tanggal</label>
         <input type="date" name="tanggal" required="" value="<?= $sepeda['tanggal'] ?>" />
        </div>
        <div>
         <button type="submit" name="tombol">Simpan Produk</button>
        </div>
        </section>
      </form>
  </body>
</html>
