<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location: ../../login.php");
    exit;
}
?>

<style>
    body {
        margin: 0;
        padding: 0;
        background: #0f1117;
        font-family: Arial, sans-serif;
        color: #fff;
    }

    .sidebar {
        width: 240px;
        height: 100vh;
        position: fixed;
        background: #1b1f2a;
        padding-top: 25px;
        box-shadow: 2px 0 12px rgba(0,0,0,0.4);
    }

    .sidebar h2 {
        text-align: center;
        color: #4da3ff;
        margin-bottom: 40px;
        font-weight: bold;
    }

    .sidebar a {
        display: block;
        padding: 14px 25px;
        color: #fff;
        text-decoration: none;
        font-size: 15px;
        transition: 0.25s;
    }

    .sidebar a:hover {
        background: #3e8cff;
        color: #fff;
    }

    .sidebar a.active {
        background: #3e8cff;
        color: #fff;
        font-weight: bold;
    }

    .content {
        margin-left: 240px;
        padding: 30px;
    }
</style>

<div class="sidebar">
    <h2>INVENTORY</h2>

    <a href="../dashboard.php" class="<?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : '' ?>">🏠 Dashboard</a>

    <a href="../barang/index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'barang') ? 'active' : '' ?>">📦 Data Barang</a>

    <a href="../kategori/index.php" class="<?= basename($_SERVER['PHP_SELF']) == 'index.php' && strpos($_SERVER['REQUEST_URI'], 'kategori') ? 'active' : '' ?>">📁 Data Kategori</a>

    <a href="../../admin/dashboard.php" style="color:#ff6b6b;">🚪Logout</a>
</div>
