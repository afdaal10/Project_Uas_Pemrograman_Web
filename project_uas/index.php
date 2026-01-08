<?php
ob_start();
session_start();

// Memanggil file dari folder class
require_once 'class/database.php';
require_once 'class/auth.php'; // Pastikan nama file sesuai (kecil semua)

$conn = new mysqli("localhost", "root", "", "latihan1");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Inisialisasi object
$auth = new Auth($conn); // Baris 16 yang tadi error
$db_obj = new Database();

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

if ($page == 'logout') {
    $auth->logout();
    exit;
}

if (!$auth->isLoggedIn() && $page != 'login') {
    header("Location: /PROJECT_UAS/login");
    exit;
}

if ($page != 'login') {
    require 'templates/header.php';
}

switch ($page) {
    case 'login':
        require 'modules/auth/login.php';
        break;
    case 'home':
        require 'modules/home.php';
        break;
    case 'about':
        require 'modules/about.php';
        break;
    case 'barang':
        require 'modules/barang/index.php';
        break;
    default:
        require 'modules/home.php';
        break;
}

if ($page != 'login') {
    require 'templates/footer.php';
}
ob_end_flush();