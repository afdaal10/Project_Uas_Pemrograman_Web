<?php
// --- PROTEKSI: HANYA ADMIN YANG BOLEH AKSES ---
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    echo "<script>alert('Akses Ditolak! Anda bukan Admin.'); window.location.href='barang';</script>";
    exit;
}
// ----------------------------------------------

if (isset($_GET['id'])) {
    if (!isset($db_obj)) {
        require_once('class/database.php');
        $db_obj = new Database();
    }

    $id = $_GET['id'];
    // Filter hapus berdasarkan ID
    $filter = "WHERE id_barang = " . $id;
    
    $status = $db_obj->delete('data_barang', $filter);

    if ($status) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='barang';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus'); window.location.href='barang';</script>";
    }
}
?>