<?php
// --- LOGIKA DASHBOARD ---
if (!isset($db_obj)) {
    require_once('class/database.php');
    $db_obj = new Database();
}

// Hitung Data Real-Time
$total_jenis = $db_obj->query("SELECT COUNT(*) as total FROM data_barang")->fetch_assoc()['total'];
$total_stok = $db_obj->query("SELECT SUM(stok) as total_stok FROM data_barang")->fetch_assoc()['total_stok'];
$total_aset = $db_obj->query("SELECT SUM(harga_beli * stok) as total_aset FROM data_barang")->fetch_assoc()['total_aset'];
?>

<style>
    .dashboard-hero {
        /* GANTI: Warna Biru Cerah & Segar */
        background: linear-gradient(135deg, #4361ee 0%, #4cc9f0 100%);
        border-radius: 20px;
        padding: 60px 30px;
        color: white;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(67, 97, 238, 0.3);
        border: none;
    }

    /* Efek Lingkaran Dekorasi */
    .circle-deco {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    /* Kartu Statistik: Glassmorphism Putih */
    .stat-card {
        background: rgba(255, 255, 255, 0.2); /* Lebih transparan */
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 15px;
        padding: 25px;
        transition: 0.3s;
        height: 100%;
    }

    .stat-card:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 800;
        color: white;
        margin: 10px 0;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .stat-label {
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 0.85rem;
    }

    /* Tombol Putih agar kontras */
    .btn-white {
        background: white;
        color: #4361ee;
        font-weight: bold;
        padding: 12px 40px;
        border-radius: 50px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        transition: 0.3s;
    }

    .btn-white:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        background: #f8f9fa;
        color: #3a0ca3;
    }
</style>

<div class="card border-0 fade-in bg-transparent">
    <div class="card-body p-0">
        
        <div class="dashboard-hero text-center">
            
            <div class="circle-deco" style="width: 300px; height: 300px; top: -100px; left: -100px;"></div>
            <div class="circle-deco" style="width: 200px; height: 200px; bottom: -50px; right: -50px;"></div>

            <h5 class="text-uppercase mb-2" style="color: rgba(255,255,255,0.8); letter-spacing: 2px;">Administrator Panel</h5>
            <h1 class="display-4 fw-bold mb-3">INVENTORY DASHBOARD</h1>
            <p class="lead mb-5" style="color: rgba(255,255,255,0.9); max-width: 600px; margin: 0 auto;">
                Selamat datang! Berikut adalah ringkasan data stok barang Anda saat ini.
            </p>

            <div class="row g-4 justify-content-center mb-5">
                
                <div class="col-md-4 col-sm-6">
                    <div class="stat-card">
                        <i class="bi bi-box-seam text-white mb-2" style="font-size: 2rem;"></i>
                        <h6 class="stat-label">Jenis Barang</h6>
                        <div class="stat-number"><?= number_format($total_jenis); ?></div>
                        <small class="text-white"><i class="bi bi-check-circle-fill"></i> Data Aktif</small>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="stat-card">
                        <i class="bi bi-layers-fill text-white mb-2" style="font-size: 2rem;"></i>
                        <h6 class="stat-label">Total Stok</h6>
                        <div class="stat-number"><?= number_format($total_stok); ?></div>
                        <small class="text-white"><i class="bi bi-box-fill"></i> Unit Tersedia</small>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6">
                    <div class="stat-card">
                        <i class="bi bi-wallet2 text-white mb-2" style="font-size: 2rem;"></i>
                        <h6 class="stat-label">Nilai Aset</h6>
                        <div class="stat-number" style="font-size: 1.8rem;">Rp <?= number_format($total_aset, 0, ',', '.'); ?></div>
                        <small class="text-white"><i class="bi bi-graph-up-arrow"></i> Estimasi Total</small>
                    </div>
                </div>

            </div>

            <a href="barang" class="btn btn-white btn-lg">
                <i class="bi bi-rocket-takeoff-fill me-2"></i> Kelola Data Sekarang
            </a>
            
        </div>
    </div>
</div>