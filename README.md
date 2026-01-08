# NEXUS INVENTORY - DOCUMENTATION (PROJECT UAS)

Sistem informasi manajemen stok barang berbasis web yang dibangun untuk memenuhi tugas **Final Semester Exam (UAS)** mata kuliah Pemrograman Berorientasi Objek. Aplikasi ini dirancang dengan antarmuka modern menggunakan tema **Nexus Blue** yang responsif dan elegan.

**Nama:** Afdhal Agislam

**NIM:** 312410445  

**Kelas:** TI 24 A5
---

## 1. Deskripsi Project
**NEXUS INVENTORY** adalah aplikasi pengelolaan data inventaris yang memudahkan administrator untuk memantau stok barang, nilai aset, dan informasi operasional lainnya secara *real-time*. Program ini dibangun menggunakan arsitektur modular dengan bahasa pemrograman PHP (OOP) dan MySQL sebagai basis datanya.

## 2. Tujuan Project
* **Implementasi OOP**: Menerapkan konsep Class, Object, Encapsulation, dan Constructor dalam PHP.
* **Manajemen Database**: Mengelola relasi data antara aplikasi dan database MySQL (latihan1).
* **URL Routing**: Mengimplementasikan sistem Front Controller menggunakan `.htaccess` untuk URL yang lebih rapi (SEO Friendly).
* **Keamanan Data**: Menerapkan sistem autentikasi berbasis session untuk melindungi data inventaris dari akses tidak sah.

## 3. Struktur Directory Lengkap
Semua kode program disimpan dalam repository dengan pengorganisasian folder sebagai berikut:

```text
PROJECT_UAS/
├── class/              # Berisi logic utama OOP (Encapsulation)
│   ├── Auth.php        # Class penanganan autentikasi & session
│   ├── database.php    # Class koneksi database (Constructor)
│   └── form.php        # Helper pembuatan komponen input
├── config/             # Pengaturan konfigurasi sistem
├── images/             # Asset gambar & foto profil pengembang
├── modules/            # Konten modular aplikasi (View & Logic)
│   ├── auth/           # Module login sistem
│   ├── barang/         # Module CRUD (Create, Read, Update, Delete)
│   ├── about.php       # Halaman profil pengembang
│   └── home.php        # Dashboard utama (Statistik)
├── templates/          # Potongan kode UI Global
│   ├── footer.php      # Template kaki halaman
│   └── header.php      # Navbar & metadata
├── .htaccess           # Konfigurasi Front Controller (Routing)
└── index.php           # Entry point utama aplikasi
```

## 4. Penjelasan Fitur
Aplikasi ini memiliki beberapa fitur inti yang saling terintegrasi:

1.  **Sistem Autentikasi (Secure Login)**:
    * Memvalidasi kredensial administrator melalui tabel `user`.
    * Menyimpan status login dalam Session untuk proteksi halaman internal.
    * Fitur Logout yang menghancurkan (destroy) session dan mengalihkan user kembali ke portal login.

2.  **Dashboard Panel (Real-time Stats)**:
    * Menampilkan ringkasan otomatis jumlah jenis barang yang aktif.
    * Kalkulasi total unit stok barang yang tersedia.
    * Estimasi nilai aset total berdasarkan harga barang yang tersimpan di database.

3.  **Manajemen Inventaris (CRUD)**:
    * **Create**: Menambahkan data barang baru ke database.
    * **Read**: Menampilkan daftar barang dalam format tabel Bootstrap yang rapi.
    * **Update**: Memperbarui informasi barang (nama, kategori, stok, atau harga).
    * **Delete**: Menghapus data barang dari sistem secara permanen.

4.  **About Developer (Identity Page)**:
    * Menampilkan profil lengkap pengembang aplikasi (Nama, NIM, Kelas, dan Foto).
    * Berfungsi sebagai kartu identitas digital proyek yang memverifikasi keaslian karya mahasiswa.
    * Menggunakan desain kartu (*card*) yang selaras dengan tema utama Nexus Inventory.

##  Penjelasan Teknis Implementasi
Berdasarkan standar soal UAS, berikut adalah arsitektur teknis yang diimplementasikan:

### 1. Project Praktikum OOP dan Modular
- OOP (Object Oriented Programming): Sistem koneksi database tidak lagi prosedural, melainkan dibungkus dalam Class Database (class/Database.php) dengan properti dan method (__construct, query, dll) untuk menerapkan konsep Encapsulation.
- Modular: Struktur kode tidak menumpuk di satu file. Logika program dipecah berdasarkan fungsinya ke dalam folder module/ (contoh: module/auth, module/barang, module/home).

### 2. Routing App (Menggunakan .htaccess)
- Aplikasi menggunakan teknik Pretty URL atau routing parameter.
- File .htaccess digunakan untuk konfigurasi Rewrite Rule agar URL lebih bersih dan aman.
- Logika routing utama berada di index.php yang menggunakan switch-case untuk memanggil modul dinamis (index.php?mod=barang&page=add).

### 3. Desain Responsive (Mobile First & Framework CSS)
- **Bootstrap 5**: Digunakan sebagai basis grid system dan komponen visual (Card, Button, Form) agar responsif di berbagai perangkat.
- **Nexus Gradient Blue**: Desain kustom menggunakan CSS3 linear-gradient `(135deg, #4361ee 0%, #4cc9f0 100%)` untuk menciptakan identitas visual yang konsisten antara halaman Login dan Dashboard.

### 4. Sistem Login dengan Role Admin dan User
Aplikasi ini mengimplementasikan pembatasan hak akses berdasarkan tingkat otoritas pengguna:

- Menggunakan PHP Session: Berfungsi untuk menyimpan status login dan data identitas pengguna secara aman selama sesi browser berlangsung.

**Logic Role (Hak Akses):**

- Admin: Setelah berhasil login, Admin diarahkan ke Inventory Dashboard dengan akses penuh ke seluruh sistem. Admin memiliki otoritas penuh untuk melakukan manipulasi data (Tombol Tambah, Edit, dan Hapus muncul dan dapat digunakan).

- User: Diarahkan ke dashboard yang bersifat View-Only (Katalog Barang). Pada level ini, seluruh tombol manipulasi data (Tambah/Edit/Hapus) disembunyikan atau diproteksi, sehingga user hanya dapat memantau stok tanpa bisa mengubahnya.

### 5. Fungsionalitas Lengkap (CRUD, Filter, Pagination)
- CRUD: Admin sukses melakukan Create (Upload Gambar), Read (Lihat Data), Update (Edit Data), dan Delete (Hapus Data).
- Filter Pencarian: Menggunakan Query SQL LIKE untuk mencari nama barang atau kategori secara real-time.
- Pagination: Menggunakan logika LIMIT dan OFFSET pada SQL untuk membatasi jumlah produk per halaman agar loading website tetap ringan.

## Implementasi Kode Utama
Berikut adalah cuplikan kode penting yang menunjukkan penerapan konsep OOP dan Modular dalam aplikasi ini:

### 1. Penerapan OOP (Koneksi Database)
Menggunakan Class Database untuk membungkus koneksi MySQLi, sehingga penulisan kode lebih rapi dan aman (Encapsulation).
```php
// File: class/database.php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "latihan1"; // Nama database UAS
    public $mysqli;

    public function __construct() {
        // Otomatisasi koneksi saat object dibuat
        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);

        if ($this->mysqli->connect_error) {
            die("Koneksi gagal: " . $this->mysqli->connect_error);
        }
    }
}
```
### 2. Penerapan Modular & Routing
Aplikasi menggunakan sistem Front Controller di mana semua permintaan diarahkan ke index.php melalui file .htaccess.
```php
// Contoh logic routing sederhana di index.php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
require 'modules/' . $page . '.php';
```
## Dokumentasi Proses Aplikasi
Berikut adalah alur penggunaan aplikasi Nexus Inventory:

### 1. Halaman Login: Portal awal untuk verifikasi akun (Admin/User).

### 2. Dashboard Utama: Menampilkan ringkasan data inventaris dan nilai aset.

### 3. Daftar Barang: Tabel inventaris dengan fitur CRUD yang aktif berdasarkan Role.

### 4. Halaman About: Profil lengkap pengembang sebagai bukti orisinalitas karya.

**- Halaman Login (Autentikasi)**
Halaman login dengan validasi Role. Admin dan User memiliki dashboard yang berbeda.
![Screenshot edit](edit_user.png)

**- Dashboard Utama**
Ringkasan statistik data barang dan aset perusahaan setelah berhasil login.
![Screenshot edit](edit_user.png)

**- Manajemen Data Barang**
Halaman utama untuk melihat dan mengelola daftar stok inventaris secara mendetail.
![Screenshot edit](edit_user.png)

**- Halaman About:**
Profil resmi pengembang aplikasi.
![Screenshot edit](edit_user.png)

**- Tampilan Login User :**
Tampilan dari sisi user :
![Screenshot edit](edit_user.png)

![Screenshot edit](edit_user.png)

**- Tampilan Login Admin :**
![Screenshot edit](edit_user.png)

**- Filter Pencarian (Filter Search)**
Fitur pencarian barang berdasarkan nama atau kategori secara real-time.
![Screenshot edit](edit_user.png)

**- Tampilan Pagination**
Menampilkan daftar barang. Terdapat fitur Pagination di bagian bawah.
![Screenshot edit](edit_user.png)

**- Tampilan Tambah Data (Admin Only)**
Formulir untuk memasukkan data barang baru dan upload gambar produk.
![Screenshot edit](edit_user.png)

**- Tampilan Edit Data (Admin Only)**
Formulir untuk mengubah informasi stok atau harga barang.
![Screenshot edit](edit_user.png)

**- Tampilan Hapus Data (Admin Only)**
Validasi konfirmasi (alert) sebelum menghapus data untuk mencegah kesalahan.
![Screenshot edit](edit_user.png)


## © 2026 Nexus Inventory System - Project UAS Afdhal Agislam.












