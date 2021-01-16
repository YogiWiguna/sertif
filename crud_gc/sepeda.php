<?php
require_once 'koneksi.php';
$query = "SELECT * FROM sepeda";
$result = mysqli_query($koneksi, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sepeda</title>
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }

        body {
            background-color: pink;
            background-image: url(URLGAMBAR);
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
            background-color: #9370DB;
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
    <center>
        <h1>Form Master Sepeda</h1>
    </center>
    <center><a href="tambahsepeda.php">Tambah data</a></center>
    <table>
        <thead>
            <tr>
                <th>Kode Sepeda</th>
                <th>Nama </th>
                <th>Merek</th>
                <th>Jenis</th>
                <th>Peruntukan</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row['kode'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['merek'] ?></td>
                    <td><?= $row['jenis'] ?></td>
                    <td><?= $row['peruntukan'] ?></td>
                    <td><?= $row['jumlah'] ?></td>
                    <td><?= $row['tanggal'] ?></td>
                    <td><a href="editsepeda.php?kode=<?= $row['kode'] ?>">Edit</a></td>
                    <td><a href="deletesepeda.php?kode=<?= $row['kode'] ?>">Delete</a></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>