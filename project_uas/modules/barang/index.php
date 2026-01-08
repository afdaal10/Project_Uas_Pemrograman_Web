<?php 
// --- LOGIKA PHP ---
$isAdmin = (isset($_SESSION['role']) && $_SESSION['role'] == 'admin');

if (!isset($db_obj)) {
    require_once('class/database.php');
    $db_obj = new Database();
}

// Logika Pencarian
$q = isset($_GET['q']) ? $_GET['q'] : "";
$where = $q != "" ? "nama LIKE '%" . $q . "%'" : null;

// Pagination (Tetap 3 data per halaman agar rapi)
$per_page = 3; 
$halaman_saat_ini = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
$offset = ($halaman_saat_ini - 1) * $per_page;

$data_barang = $db_obj->getLimit('data_barang', $per_page, $offset, $where);
$total_data = $db_obj->total('data_barang', $where);
$total_halaman = ceil($total_data / $per_page);
?>

<style>
    /* Container Utama Nexus Blue */
    .data-hero {
        background: linear-gradient(135deg, #4361ee 0%, #4cc9f0 100%);
        border-radius: 20px;
        padding: 40px 30px;
        color: white;
        box-shadow: 0 15px 35px rgba(67, 97, 238, 0.3);
        position: relative;
        overflow: hidden;
        min-height: 600px;
    }

    .deco-circle {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    /* Kartu Produk Modern */
    .product-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        transition: 0.3s ease;
        height: 100%;
        border: none;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    .product-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.15);
    }

    .card-img-wrapper {
        height: 200px;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    .card-img-wrapper img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
    }

    .category-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #4361ee;
        color: white;
        font-size: 0.7rem;
        padding: 5px 12px;
        border-radius: 50px;
        font-weight: 700;
        text-transform: uppercase;
        z-index: 2;
    }

    .price-text {
        color: #4361ee;
        font-weight: 800;
        font-size: 1.3rem;
    }

    .page-link {
        color: #4361ee;
        border: none;
        margin: 0 5px;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50% !important;
        font-weight: 700;
        transition: 0.3s;
    }
    .page-item.active .page-link {
        background-color: #4361ee;
        box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
    }
</style>

<div class="card border-0 fade-in bg-transparent">
    <div class="card-body p-0">
        
        <div class="data-hero">
            <div class="deco-circle" style="width: 300px; height: 300px; top: -120px; right: -100px;"></div>
            <div class="deco-circle" style="width: 200px; height: 200px; bottom: -50px; left: -60px;"></div>

            <div class="d-flex justify-content-between align-items-center mb-4 position-relative">
                <div>
                    <h2 class="fw-bold mb-1">Data Barang</h2>
                    <p class="mb-0 text-white-50">Pusat kendali stok barang: Cepat, Akurat, dan Terintegrasi.</p>
                </div>
                
                <?php if($isAdmin): ?>
                    <a href="barang/tambah" class="btn btn-white bg-white text-primary fw-bold shadow-sm px-4 rounded-pill">
                        <i class="bi bi-plus-circle-fill me-2"></i>Tambah Data
                    </a>
                <?php endif; ?>
            </div>

            <div class="row mb-5 position-relative">
                <div class="col-md-5">
                    <form action="" method="get" class="d-flex shadow-sm" style="border-radius: 50px; overflow: hidden; background: white; padding: 5px;">
                        <input type="hidden" name="page" value="barang">
                        <input type="text" name="q" class="form-control border-0 ps-3" placeholder="Cari nama barang..." value="<?= $q; ?>" style="box-shadow: none;">
                        <button type="submit" class="btn btn-dark rounded-pill px-4">Cari</button>
                    </form>
                </div>
            </div>

            <div class="row g-4 position-relative">
                <?php if($data_barang && $data_barang->num_rows > 0) : ?>
                    <?php while($row = $data_barang->fetch_assoc()): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="product-card">
                            <div class="category-badge"><?= $row['kategori']; ?></div>
                            
                            <div class="card-img-wrapper">
                                <img src="images/<?= !empty($row['gambar']) ? $row['gambar'] : 'no-image.jpg'; ?>" alt="Product">
                            </div>

                            <div class="p-4">
                                <h4 class="fw-bold text-dark mb-1 text-truncate"><?= $row['nama']; ?></h4>
                                <div class="price-text mb-3">Rp <?= number_format($row['harga_jual'], 0, ',', '.'); ?></div>
                                
                                <div class="d-flex justify-content-between align-items-center border-top pt-3 mt-2">
                                    <span class="small text-muted">Tersedia: <strong><?= $row['stok']; ?> Unit</strong></span>
                                    
                                    <?php if($isAdmin): ?>
                                        <div class="d-flex gap-2">
                                            <a href="barang/ubah?id=<?= $row['id_barang'];?>" class="btn btn-warning btn-sm text-white rounded-circle shadow-sm" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <a href="barang/hapus?id=<?= $row['id_barang'];?>" class="btn btn-danger btn-sm rounded-circle shadow-sm" style="width: 35px; height: 35px; display: flex; align-items: center; justify-content: center;" onclick="return confirm('Hapus data ini?')">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    <?php else: ?>
                                        <span class="badge bg-light text-secondary border px-3 rounded-pill">Info Stok</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-inbox text-white-50" style="font-size: 4rem;"></i>
                        <p class="text-white mt-3 lead">Data barang belum tersedia.</p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="mt-5 d-flex justify-content-center position-relative">
                <nav>
                    <ul class="pagination">
                        <?php for($x = 1; $x <= $total_halaman; $x++): ?>
                            <li class="page-item <?= ($halaman_saat_ini == $x) ? 'active' : ''; ?>">
                                <a class="page-link shadow-sm" href="barang?hal=<?= $x; ?>&q=<?= $q; ?>"><?= $x; ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
</div>