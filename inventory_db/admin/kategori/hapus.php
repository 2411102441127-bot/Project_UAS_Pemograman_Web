<?php
include "../koneksi.php";
$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori=$id");
echo "<script>alert('Kategori dihapus');window.location='index.php';</script>";
?>
