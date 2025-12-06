<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location: ../../login.php");
    exit;
}

include "../koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #0f1117;
            font-family: Arial, sans-serif;
            color: #fff;
        }

        .navbar {
            width: 100%;
            background: #1b1f2a;
            padding: 15px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h1 {
            margin: 0;
            font-size: 22px;
            color: #4da3ff;
        }

        .navbar a {
            color: #ff6b6b;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            padding: 35px;
        }

        .title-box {
            margin-bottom: 25px;
        }

        .btn-tambah {
            background: #3e8cff;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        .btn-tambah:hover {
            background: #2e6fd4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #1b1f2a;
            border-radius: 10px;
            overflow: hidden;
        }

        table th {
            background: #232734;
            padding: 12px;
        }

        table td {
            padding: 12px;
            border-bottom: 1px solid #2b3040;
        }

        .foto-barang {
            width: 70px;
            border-radius: 6px;
        }

        .btn-edit {
            padding: 6px 12px;
            background: #f7b731;
            border-radius: 6px;
            color: #fff;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-delete {
            padding: 6px 12px;
            background: #ff4757;
            border-radius: 6px;
            color: #fff;
            text-decoration: none;
            font-size: 13px;
        }

        .btn-edit:hover { background: #d39c28; }
        .btn-delete:hover { background: #e84141; }

    </style>
</head>

<body>

<div class="navbar">
    <h1>Data Barang</h1>
    <a href="../dashboard.php">Logout</a>
</div>

<div class="container">

    <div class="title-box">
        <h2>Daftar Barang</h2>
        <a href="tambah.php" class="btn-tambah">+ Tambah Barang</a>
    </div>

    <table>
        <tr>
            <th>Gambar</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php
        $query = mysqli_query($koneksi, 
        "SELECT barang.*, kategori.nama_kategori 
         FROM barang 
         LEFT JOIN kategori ON barang.id_kategori = kategori.id_kategori
         ORDER BY id_barang DESC");

        while ($row = mysqli_fetch_assoc($query)):
        ?>
        <tr>
            <td>
                <?php if ($row['gambar']): ?>
                    <img src="uploads/<?= $row['gambar'] ?>" class="foto-barang">
                <?php else: ?>
                    <span style="color:#888;">Tidak ada foto</span>
                <?php endif; ?>
            </td>

            <td><?= $row['nama_barang'] ?></td>
            <td><?= $row['nama_kategori'] ?: "-" ?></td>
            <td><?= $row['stok'] ?></td>

            <td>
                <a href="edit.php?id=<?= $row['id_barang'] ?>" class="btn-edit">Edit</a>
                <a href="hapus.php?id=<?= $row['id_barang'] ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</div>

</body>
</html>
