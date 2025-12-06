<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location: ../admin/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Inventory</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            background: #0f1117;
            font-family: Arial, sans-serif;
            color: #fff;
        }

        /* NAVBAR */
        .navbar {
            width: 100%;
            background: #1b1f2a;
            padding: 15px 25px;
            box-shadow: 0 0 12px rgba(0,0,0,0.4);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .navbar h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 600;
            color: #4da3ff;
        }

        .navbar a {
            color: #ff6b6b;
            text-decoration: none;
            font-weight: bold;
        }

        /* CONTENT */
        .container {
            padding: 35px;
        }

        h2 {
            font-size: 26px;
            margin-bottom: 10px;
        }

        p.subtitle {
            color: #a6a6a6;
            margin-top: -5px;
            margin-bottom: 30px;
        }

        /* GRID CARD MENU */
        .grid-menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 25px;
        }

        .menu-card {
            background: #1b1f2a;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.25);
            text-align: center;
            transition: .3s;
            border: 1px solid #232734;
        }

        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 0 25px rgba(0,128,255,0.4);
            border-color: #3e8cff;
        }

        .menu-title {
            font-size: 20px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .menu-desc {
            font-size: 14px;
            color: #b5b5b5;
            margin-bottom: 20px;
        }

        .btn-card {
            display: inline-block;
            padding: 10px 18px;
            background: #3e8cff;
            border-radius: 8px;
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: .2s;
        }

        .btn-card:hover {
            background: #2e6fd4;
        }

    </style>
</head>

<body>

<div class="navbar">
    <h1>Dashboard Inventory</h1>
    <a href="../admin/login.php">Logout</a>
</div>

<div class="container">
    <h2>Selamat Datang di Dashboard Inventory</h2>
    <p class="subtitle">Silakan pilih menu untuk mengelola data.</p>

    <div class="grid-menu">

        <!-- CARD 1 -->
        <div class="menu-card">
            <div class="menu-title">Data Barang</div>
            <div class="menu-desc">Kelola stok, upload foto barang, dan edit informasi.</div>
            <a href="barang/index.php" class="btn-card">Kelola Barang</a>
        </div>

        <!-- CARD 2 -->
        <div class="menu-card">
            <div class="menu-title">Kategori Barang</div>
            <div class="menu-desc">Tambahkan kategori baru dan perbaiki data kategori.</div>
            <a href="kategori/index.php" class="btn-card">Kelola Kategori</a>
        </div>

        <!-- CARD 3 -->
        <div class="menu-card">
            <div class="menu-title">Laporan</div>
            <div class="menu-desc">Cetak laporan barang & stok (opsional jika nanti ingin ditambah).</div>
            <a href="Laporan.php" class="btn-card">Lihat Laporan</a>
        </div>

    </div>

</div>

</body>
</html>
