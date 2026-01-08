<?php
// --- PROTEKSI: HANYA ADMIN YANG BOLEH AKSES ---
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    echo "<script>alert('Akses Ditolak! Anda bukan Admin.'); window.location.href='barang';</script>";
    exit;
}
// ----------------------------------------------

// Pastikan $db_obj tersedia
if (!isset($db_obj)) {
    require_once('class/database.php');
    $db_obj = new Database();
}

// 1. Ambil ID dari URL
$id = $_GET['id'];

// 2. Ambil data lama untuk ditampilkan di form
// Menggunakan query manual karena getLimit tidak support where ID spesifik dengan mudah di class lama
$sql = "SELECT * FROM data_barang WHERE id_barang = " . $id;
$result = $db_obj->query($sql); // Pastikan class database punya method query() public
$data = $result->fetch_assoc();

// 3. Proses Update jika tombol simpan diklik
if (isset($_POST['submit'])) {
    $data_update = [
        'nama' => $_POST['nama'],
        'kategori' => $_POST['kategori'],
        'harga_beli' => $_POST['harga_beli'],
        'harga_jual' => $_POST['harga_jual'],
        'stok' => $_POST['stok'],
        'gambar' => $_POST['gambar']
    ];
    
    // Panggil method update
    $update = $db_obj->update('data_barang', $data_update, "id_barang = " . $id);

    if ($update) {
        echo "<script>alert('Data berhasil diubah'); window.location.href='barang';</script>";
    } else {
        echo "<script>alert('Data gagal diubah');</script>";
    }
}
?>

<div class="card fade-in">
    <div class="card-header">
        <h3>Ubah Data Barang</h3>
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama" value="<?= $data['nama']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="form-select" name="kategori">
                    <option value="Elektronik" <?= ($data['kategori'] == 'Elektronik') ? 'selected' : ''; ?>>Elektronik</option>
                    <option value="Handphone" <?= ($data['kategori'] == 'Handphone') ? 'selected' : ''; ?>>Handphone</option>
                    <option value="Komputer" <?= ($data['kategori'] == 'Komputer') ? 'selected' : ''; ?>>Komputer</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Beli</label>
                <input type="number" class="form-control" name="harga_beli" value="<?= $data['harga_beli']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Jual</label>
                <input type="number" class="form-control" name="harga_jual" value="<?= $data['harga_jual']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" class="form-control" name="stok" value="<?= $data['stok']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama File Gambar</label>
                <input type="text" class="form-control" name="gambar" value="<?= $data['gambar']; ?>">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" name="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="barang" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>