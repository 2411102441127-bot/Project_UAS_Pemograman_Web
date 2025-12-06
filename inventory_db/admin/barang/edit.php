<?php
include "../layout/sidebar.php";
include "../layout/header.php";
include "../koneksi.php";

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang=$id"));
$kategori = mysqli_query($koneksi, "SELECT * FROM kategori");

// ambil foto lama dari database
$gambar_lama = $data['gambar'];   // <-- FIX

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $id_kat = $_POST['id_kategori'];

    // default tetap foto lama
    $gambar_baru = $gambar_lama;

    // jika upload foto baru
    if (!empty($_FILES['gambar']['name'])) {   // <-- FIX
        $ext = strtolower(pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION));

        if (in_array($ext, ['jpg','jpeg','png'])) {

            // hapus foto lama jika ada
            if (!empty($gambar_lama) && file_exists("uploads/".$gambar_lama)) {
                unlink("uploads/".$gambar_lama);
            }

            // simpan foto baru
            $gambar_baru = time()."_".$_FILES['gambar']['name'];
            move_uploaded_file($_FILES['gambar']['tmp_name'], "uploads/".$gambar_baru);
        }
    }

    mysqli_query($koneksi, 
        "UPDATE barang SET 
        nama_barang='$nama',
        stok=$stok,
        id_kategori=$id_kat,
        gambar='$gambar_baru'
        WHERE id_barang=$id");

    echo "<script>alert('Data barang diperbarui'); window.location='index.php';</script>";
}
?>

<h2>Edit Barang</h2>

<form method="POST" enctype="multipart/form-data" style="background:#1b1f2a;padding:20px;border-radius:10px;width:450px;">
    
    <label>Nama Barang</label>
    <input type="text" name="nama_barang" value="<?= $data['nama_barang'] ?>" required
           style="width:100%;margin-bottom:10px;padding:10px;border-radius:6px;border:none;">

    <label>Stok</label>
    <input type="number" name="stok" value="<?= $data['stok'] ?>" required
           style="width:100%;margin-bottom:10px;padding:10px;border-radius:6px;border:none;">

    <label>Kategori</label>
    <select name="id_kategori"
            style="width:100%;margin-bottom:10px;padding:10px;border-radius:6px;border:none;">
        <?php while($k = mysqli_fetch_assoc($kategori)): ?>
        <option value="<?= $k['id_kategori'] ?>" <?= $k['id_kategori']==$data['id_kategori']?'selected':'' ?>>
            <?= $k['nama_kategori'] ?>
        </option>
        <?php endwhile; ?>
    </select>

    <label>Foto Lama</label><br>
    <?php if(!empty($data['gambar'])): ?>
        <img src="uploads/<?= $data['gambar'] ?>" width="100" style="margin-bottom:10px;border-radius:6px;">
    <?php else: ?>
        <p style="color:#bbb;">Tidak ada foto</p>
    <?php endif; ?>
    <br>

    <label>Ganti Foto (optional)</label>
    <input type="file" name="gambar"
           style="width:100%;margin-bottom:10px;padding:10px;border-radius:6px;border:none;">

    <button type="submit" 
            style="padding:10px 15px;background:#3e8cff;border:none;border-radius:6px;color:#fff;">
        Update
    </button>
</form>

<?php include "../layout/footer.php"; ?>
