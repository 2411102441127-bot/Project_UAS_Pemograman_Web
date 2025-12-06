<?php
include "../layout/sidebar.php";
include "../layout/header.php";
include "../koneksi.php";

$id = $_GET['id'];
$d = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori=$id"));

if ($_POST) {
    $nama = $_POST['nama_kategori'];
    mysqli_query($koneksi, "UPDATE kategori SET nama_kategori='$nama' WHERE id_kategori=$id");
    echo "<script>alert('Kategori diperbarui');window.location='index.php';</script>";
}
?>

<h2>Edit Kategori</h2>

<form method="POST" style="background:#1b1f2a;padding:20px;width:350px;border-radius:10px;">
    <label>Nama Kategori</label>
    <input type="text" name="nama_kategori" value="<?= $d['nama_kategori'] ?>" required
           style="width:100%;padding:10px;margin-bottom:10px;border:none;border-radius:6px;">
    <button type="submit" style="padding:10px 15px;background:#3e8cff;border:none;border-radius:6px;color:#fff;">
        Update
    </button>
</form>

<?php include "../layout/footer.php"; ?>
