<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location: ../../login.php");
}

include "../koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang=$id");
$row = mysqli_fetch_array($data);

// hapus foto
unlink("uploads/barang/".$row['gambar']);

// hapus data
mysqli_query($koneksi, "DELETE FROM barang WHERE id_barang=$id");

header("location: index.php");
