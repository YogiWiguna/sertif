<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Indah flower shop</title>

    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
       body {
      background-color:pink;
      background-image:url(URLGAMBAR);
      }
      h1 {
        text-transform: uppercase;
        color: purple;
      }
    table {
      border: solid 1px #9370DB;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color:#9370DB;
        border: solid 1px ##000000;
        color: ##000000;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #333;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #9370DB;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #333;
    }
    a {
          background-color: purple;
          color: #E6E6FA;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }

    </style>
  </head>
  <body>
    <center><h1>DATA INDAH FLOWER SHOP </h1><center>
    <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk</a><center>
      <br></>
      <br></>

    <center><a href="" target="_blank">+ &nbsp; Logout</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>No</th>
          <th>Produk</th>
          <th>Stock</th>
          <th>Dekripsi</th>
          <th>Harga Beli</th>
          <th>Harga Jual</th>
          <th>Gambar</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM produk ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nama_produk']; ?></td>
          <td><?php echo $row['stock']; ?></td>
          <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
          <td>Rp <?php echo number_format($row['harga_beli'],0,',','.'); ?></td>
          <td>Rp <?php echo $row['harga_jual']; ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_produk.php?id=<?php echo $row['id']; ?>">Edit</a> |
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>

      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>
