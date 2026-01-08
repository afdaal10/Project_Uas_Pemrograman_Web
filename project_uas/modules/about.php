<style>
    /* --- Style Hero Nexus --- */
    .about-hero {
        background: linear-gradient(135deg, #4361ee 0%, #4cc9f0 100%);
        border-radius: 20px;
        padding: 40px 30px; 
        color: white;
        box-shadow: 0 15px 35px rgba(67, 97, 238, 0.3);
        position: relative;
        overflow: hidden;
    }

    .deco-circle {
        position: absolute;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
    }

    .glass-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 15px;
        padding: 20px; 
        height: 100%;
        transition: 0.3s;
    }
    
    .profile-img-container {
        width: 120px; 
        height: 120px;
        margin: 0 auto 15px auto;
        border-radius: 50%;
        border: 3px solid rgba(255, 255, 255, 0.5);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        overflow: hidden;
        position: relative;
    }

    .profile-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .profile-name {
        font-size: 1.5rem; 
        font-weight: 800;
        margin-bottom: 5px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .profile-role {
        color: rgba(255, 255, 255, 0.9);
        font-size: 0.9rem;
        margin-bottom: 20px;
        font-weight: 500;
        background: rgba(0,0,0,0.1);
        display: inline-block;
        padding: 4px 15px;
        border-radius: 50px;
    }

    .detail-badge {
        background: rgba(255, 255, 255, 0.1);
        padding: 10px;
        border-radius: 12px;
        text-align: center;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: 0.3s;
        height: 100%;
    }

    .detail-label {
        font-size: 0.65rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        opacity: 0.8;
        margin-bottom: 4px;
    }

    .detail-value {
        font-weight: 700;
        font-size: 1rem;
    }
</style>

<div class="card border-0 fade-in bg-transparent">
    <div class="card-body p-0">
        
        <div class="about-hero">
            <div class="deco-circle" style="width: 250px; height: 250px; top: -100px; right: -80px;"></div>
            <div class="deco-circle" style="width: 150px; height: 150px; bottom: -30px; left: -40px;"></div>

            <div class="text-center mb-4">
                <h2 class="text-uppercase fw-bold" style="letter-spacing: 3px; font-size: 1.8rem; text-shadow: 0 2px 10px rgba(0,0,0,0.1);">Profile Developer</h2>
            </div>

            <div class="row g-3 align-items-stretch">
                <div class="col-md-4">
                    <div class="glass-card text-center d-flex flex-column justify-content-center align-items-center h-100">
                        <i class="bi bi-code-square mb-3" style="font-size: 3rem; color: rgba(255,255,255,1);"></i>
                        <h5 class="fw-bold mb-2">PROJECT UAS</h5>
                        <span class="badge bg-white text-primary px-3 py-1 rounded-pill mb-3" style="font-size: 0.75rem;">Semester 3</span>
                        <p class="text-white-50 small mb-0" style="font-size: 0.8rem;">
                            Aplikasi ini dibuat sebagai syarat kelulusan mata kuliah Pemrograman Web 1 dengan penerapan konsep OOP.
                        </p>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="glass-card text-center">
                        <div class="profile-img-container">
                            <img src="images/pp.jpeg" alt="Foto Profil Afdhal">
                        </div>
                        
                        <h3 class="profile-name">Afdhal Agislam</h3>
                        <div class="profile-role">Mahasiswa Teknik Informatika</div>

                        <div class="row g-2 mt-2">
                            <div class="col-sm-4">
                                <div class="detail-badge">
                                    <div class="detail-label">NIM</div>
                                    <div class="detail-value">312410445</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="detail-badge">
                                    <div class="detail-label">Kelas</div>
                                    <div class="detail-value">TI 24 A5</div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="detail-badge">
                                    <div class="detail-label">Tahun</div>
                                    <div class="detail-value">2026</div>
                                </div>
                            </div>
                             <div class="col-sm-12">
                                <div class="detail-badge d-flex align-items-center justify-content-center gap-2">
                                    <i class="bi bi-buildings-fill fs-5"></i>
                                    <div class="text-start">
                                         <div class="detail-label mb-0" style="font-size: 0.6rem;">Kampus</div>
                                         <div class="detail-value" style="font-size: 0.9rem;">Universitas Pelita Bangsa, Cikarang</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>