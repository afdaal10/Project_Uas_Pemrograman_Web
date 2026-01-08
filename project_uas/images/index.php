<?php
/**
 * Main Index File dengan Routing
 * Implementasi Modularisasi menggunakan Class Library
 */

// Include configuration
require_once('config/config.php');

// Get page parameter
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Define allowed pages
$allowed_pages = array(
    'home' => 'modules/home.php',
    'about' => 'modules/about.php',
    'barang' => 'modules/barang/index.php',
    'barang/tambah' => 'modules/barang/tambah.php',
    'barang/ubah' => 'modules/barang/ubah.php',
    'barang/hapus' => 'modules/barang/hapus.php'
);

// Check if page exists
if (array_key_exists($page, $allowed_pages)) {
    $file = $allowed_pages[$page];
    
    // Check if file exists
    if (file_exists($file)) {
        include($file);
    } else {
        include('modules/404.php');
    }
} else {
    include('modules/404.php');
}
?>