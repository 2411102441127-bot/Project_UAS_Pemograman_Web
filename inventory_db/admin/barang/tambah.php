<?php
include "../layout/sidebar.php";
include "../layout/header.php";
include "../koneksi.php";

$msg = '';

$kategori = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_barang'];
    $stok = (int)$_POST['stok'];
    $id_kat = (int)$_POST['id_kategori'];

    // upload gambar
    $gambar = "";
    if (!empty($_FILES['gambar']['name'])) {
        $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png'];

        if (!in_array($ext, $allowed)) {
            $msg = "Format gambar harus JPG/PNG";
        } else {
            $gambar = time()."_".$_FILES['gambar']['name'];
            move_uploaded_file($_FILES['gambar']['tmp_name'], "uploads/".$gambar);
        }
    }

    if ($msg == "") {
        mysqli_query($koneksi,
            "INSERT INTO barang (nama_barang, stok, id_kategori, gambar)
             VALUES ('$nama', $stok, $id_kat, '$gambar')");

        echo "<script>alert('Barang berhasil ditambahkan'); window.location='index.php';</script>";
    }
}
?>

<h2>Tambah Barang</h2>

<?php if($msg): ?>
<div style="background:#ff6b6b; padding:10px; border-radius:6px; margin-bottom:15px;">
    <?= $msg ?>
</div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data" style="background:#1b1f2a;padding:20px;border-radius:10px;width:450px;">
    <label>Nama Barang</label>
    <input type="text" name="nama_barang" required
           style="width:100%;margin-bottom:10px;padding:10px;border-radius:6px;border:none;">

    <label>Stok</label>
    <input type="number" name="stok" required
           style="width:100%;margin-bottom:10px;padding:10px;border-radius:6px;border:none;">

    <label>Kategori</label>
    <select name="id_kategori" required
            style="width:100%;margin-bottom:10px;padding:10px;border-radius:6px;border:none;">
        <?php while($k = mysqli_fetch_assoc($kategori)): ?>
        <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
        <?php endwhile; ?>
    </select>

    <label>Gambar (optional)</label>
    <input type="file" name="gambar"
           style="width:100%;margin-bottom:10px;padding:10px;border-radius:6px;border:none;">

    <button type="submit" 
            style="padding:10px 15px;background:#3e8cff;border:none;border-radius:6px;color:#fff;">
        Simpan
    </button>
</form>

<?php include "../layout/footer.php"; ?>
