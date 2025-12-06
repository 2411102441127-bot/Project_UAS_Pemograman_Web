<?php
include "../layout/sidebar.php";
include "../layout/header.php";
include "../koneksi.php";

if ($_POST) {
    $nama = $_POST['nama_kategori'];
    mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('$nama')");
    echo "<script>alert('Kategori ditambahkan');window.location='index.php';</script>";
}
?>

<h2>Tambah Kategori</h2>

<form method="POST" style="background:#1b1f2a;padding:20px;width:350px;border-radius:10px;">
    <label>Nama Kategori</label>
    <input type="text" name="nama_kategori" required
           style="width:100%;padding:10px;margin-bottom:10px;border:none;border-radius:6px;">
    <button type="submit" style="padding:10px 15px;background:#3e8cff;border:none;border-radius:6px;color:#fff;">
        Simpan
    </button>
</form>

<?php include "../layout/footer.php"; ?>
