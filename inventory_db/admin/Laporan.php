<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Laporan Barang</title>
    <style>
        body {
            font-family: Arial;
            background: #111827;
            color: white;
        }
        .container {
            width: 90%;
            margin: auto;
            margin-top: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background: #2563EB;
            color: white;
            padding: 10px;
        }
        td {
            padding: 8px;
            background: #1F2937;
            border-bottom: 1px solid #374151;
        }
        h2 {
            text-align: center;
        }
        img {
            width: 60px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<!-- TOMBOL KEMBALI -->
<a href="dashboard.php"
   style="
       position: absolute;
       top: 20px;
       right: 20px;
       background: #2563EB;
       padding: 8px 15px;
       color: white;
       text-decoration: none;
       border-radius: 6px;
       font-size: 14px;
       font-weight: bold;
    ">Kembali</a>

<div class="container">
    <h2>Laporan Barang & Stok</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Gambar</th>
        </tr>

        <?php
        $no = 1;

        $query = mysqli_query($koneksi, "
            SELECT barang.*, kategori.nama_kategori
            FROM barang
            LEFT JOIN kategori ON barang.id_kategori = kategori.id_kategori
            ORDER BY barang.id_barang DESC
        ");

        if (!$query) {
            die('Query Error: ' . mysqli_error($koneksi));
        }

        while ($row = mysqli_fetch_assoc($query)) {
        ?>

        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama_barang'] ?></td>
            <td><?= $row['nama_kategori'] ?></td>
            <td><?= $row['stok'] ?></td>
            <td>
                <?php if ($row['gambar'] != '') { ?>
                    <img src="../admin/barang/uploads/<?= $row['gambar'] ?>">
                <?php } else { ?>
                    (Tidak Ada)
                <?php } ?>
            </td>
        </tr>

        <?php } ?>
    </table>
</div>

</body>
</html>
