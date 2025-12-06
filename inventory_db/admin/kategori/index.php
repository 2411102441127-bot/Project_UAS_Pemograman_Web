<?php
include "../layout/sidebar.php";
include "../layout/header.php";
include "../koneksi.php";

$data = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY id_kategori DESC");
?>

<h2>Data Kategori</h2>
<a href="tambah.php" style="padding:10px 15px;background:#3e8cff;border-radius:6px;color:#fff;text-decoration:none;">+ Tambah</a>

<table style="width:100%;margin-top:20px;background:#1b1f2a;border-radius:10px;overflow:hidden;border-collapse:collapse;">
    <tr style="background:#232734;">
        <th style="padding:12px;">ID</th>
        <th>Nama Kategori</th>
        <th>Aksi</th>
    </tr>

    <?php while($k = mysqli_fetch_assoc($data)): ?>
    <tr>
        <td style="padding:12px;"><?= $k['id_kategori'] ?></td>
        <td><?= $k['nama_kategori'] ?></td>
        <td>
            <a href="edit.php?id=<?= $k['id_kategori'] ?>" style="color:#f7b731;">Edit</a> |
            <a href="hapus.php?id=<?= $k['id_kategori'] ?>" style="color:#ff4757;" onclick="return confirm('Hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php include "../layout/footer.php"; ?>
