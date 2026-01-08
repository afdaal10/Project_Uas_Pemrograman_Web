<?php
// --- PROTEKSI: HANYA ADMIN YANG BOLEH AKSES ---
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    echo "<script>alert('Akses Ditolak! Anda bukan Admin.'); window.location.href='barang';</script>";
    exit;
}
// ----------------------------------------------

// Cek apakah form dikirim
if (isset($_POST['submit'])) {
    // 1. Buat array data
    $data = [
        'nama' => $_POST['nama'],
        'kategori' => $_POST['kategori'],
        'harga_beli' => $_POST['harga_beli'],
        'harga_jual' => $_POST['harga_jual'],
        'stok' => $_POST['stok'],
        'gambar' => $_POST['gambar'] // Asumsi input manual nama file
    ];

    // 2. Panggil method insert dari database
    // Pastikan $db_obj tersedia (karena di-load dari index.php)
    if (!isset($db_obj)) {
        require_once('class/database.php');
        $db_obj = new Database();
    }
    
    $simpan = $db_obj->insert('data_barang', $data);

    // 3. Redirect jika berhasil
    if ($simpan) {
        echo "<script>alert('Data berhasil disimpan'); window.location.href='barang';</script>";
    } else {
        echo "<script>alert('Data gagal disimpan');</script>";
    }
}
?>

<div class="card fade-in">
    <div class="card-header">
        <h3>Tambah Data Barang</h3>
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="form-select" name="kategori">
                    <option value="Elektronik">Elektronik</option>
                    <option value="Handphone">Handphone</option>
                    <option value="Komputer">Komputer</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Beli</label>
                <input type="number" class="form-control" name="harga_beli" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga Jual</label>
                <input type="number" class="form-control" name="harga_jual" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" class="form-control" name="stok" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama File Gambar</label>
                <input type="text" class="form-control" name="gambar" placeholder="Contoh: hp.jpg">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                <a href="barang" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>