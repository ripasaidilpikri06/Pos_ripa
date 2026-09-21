<?php $__env->startSection('title', 'Tentang Aplikasi & Pengembang'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<!-- Custom CSS Styling - Dark Luxury Theme -->
<style>
    body {
        background-color: #07090e;
        background-image: 
            radial-gradient(at 0% 0%, rgba(29, 78, 216, 0.2) 0px, transparent 50%),
            radial-gradient(at 100% 0%, rgba(14, 165, 233, 0.15) 0px, transparent 50%),
            radial-gradient(at 100% 100%, rgba(15, 23, 42, 0.9) 0px, transparent 50%);
        background-attachment: fixed;
        min-height: 100vh;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        color: #f8fafc;
    }

    .dashboard-container {
        max-width: 1320px;
        margin: 0 auto;
        padding: 2.5rem 1.5rem;
    }

    /* Cards dengan Dark Glassmorphism */
    .about-card {
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        background: rgba(13, 19, 33, 0.85);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.6);
        transition: all 0.3s ease;
    }

    .about-card:hover {
        transform: translateY(-2px);
        border-color: rgba(59, 130, 246, 0.4);
        box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.8);
    }

    .profile-avatar {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 4px 20px rgba(59, 130, 246, 0.3);
        border: 2px solid rgba(59, 130, 246, 0.5);
    }

    .tech-badge {
        font-size: 0.85rem;
        padding: 0.5rem 1rem;
        border-radius: 50px;
        font-weight: 500;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Box Kustom Di Dalam Card */
    .inner-box {
        background: rgba(15, 23, 42, 0.7) !important;
        border: 1px solid rgba(255, 255, 255, 0.08) !important;
        border-radius: 12px;
        transition: all 0.2s ease;
    }

    .inner-box:hover {
        border-color: rgba(59, 130, 246, 0.3) !important;
        background: rgba(15, 23, 42, 0.9) !important;
    }
</style>

<div class="dashboard-container">
    <!-- Header Page -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-white mb-2">ℹ️ Tentang Aplikasi & Pengembang</h1>
        <p class="text-secondary">Informasi sistem Point of Sale (POS) dan profil pengembang aplikasi.</p>
    </div>

    <div class="row g-4">
        <!-- 1. Profil Pengembang -->
        <div class="col-lg-4">
            <div class="card about-card p-4 text-center h-100">
                <div class="mb-3">
                    <div class="profile-avatar bg-primary bg-opacity-25 text-info d-inline-flex align-items-center justify-content-center mx-auto fs-1 fw-bold">
                        RP
                    </div>
                </div>
                <h4 class="fw-bold text-white mb-1">Ripa Saidil Pikri</h4>
                <p class="text-info fw-semibold mb-3">Pengembang Aplikasi POS</p>
                
                <p class="text-secondary small">
                    Pengembang web yang berfokus pada pembuatan sistem manajemen penjualan dan aplikasi berbasis Laravel yang efisien serta mudah digunakan.
                </p>

                <hr class="my-4 border-secondary border-opacity-25">

                <!-- Informasi Pengembang -->
                <h6 class="fw-bold text-white text-start mb-3">📌 Informasi Pengembang</h6>
                <ul class="list-unstyled text-start small text-secondary">
                    <li class="mb-2"><i class="bi bi-person me-2 text-info"></i> <strong class="text-light">Nama:</strong> Ripa Saidil Pikri</li>
                    <li class="mb-2"><i class="bi bi-mortarboard me-2 text-info"></i> <strong class="text-light">Jurusan:</strong> PPLG SMKN 4 TASIKMALAYA</li>
                    <li class="mb-2"><i class="bi bi-briefcase me-2 text-info"></i> <strong class="text-light">Peran:</strong> Full-stack Web Developer</li>
                    <li class="mb-2"><i class="bi bi-code-slash me-2 text-info"></i> <strong class="text-light">Spesialisasi:</strong> Pengembangan Website & Sistem Kasir</li>
                    <li><i class="bi bi-envelope me-2 text-info"></i> <strong class="text-light">Email:</strong> dev@posripa.com</li>
                </ul>
            </div>
        </div>

        <!-- 2. Tentang Aplikasi & Teknologi -->
        <div class="col-lg-8">
            <div class="d-flex flex-column gap-4">
                
                <!-- Tentang Aplikasi -->
                <div class="card about-card p-4">
                    <h5 class="fw-bold text-white mb-3">
                        <i class="bi bi-cart-check-fill text-info me-2"></i>Tentang Aplikasi
                    </h5>
                    <p class="text-secondary leading-relaxed">
                        Aplikasi <strong class="text-light">POS RIPA</strong> adalah sistem Point of Sale modern yang dirancang untuk mempermudah pencatatan transaksi penjualan, kelola stok produk, penanganan hak akses pengguna, serta pemantauan laporan keuangan secara <em class="text-info">real-time</em>.
                    </p>
                    <div class="row g-3 mt-1">
                        <div class="col-md-6">
                            <div class="p-3 inner-box">
                                <h6 class="fw-bold text-white mb-1"><i class="bi bi-box-seam me-2 text-info"></i>Manajemen Produk</h6>
                                <p class="small text-secondary mb-0">Kelola stok, harga, dan riwayat barang dengan rapi.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 inner-box">
                                <h6 class="fw-bold text-white mb-1"><i class="bi bi-receipt me-2 text-info"></i>Transaksi Cepat</h6>
                                <p class="small text-secondary mb-0">Proses kasir instan dengan ringkasan transaksi detail.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pengembangan Website & Teknologi yang Digunakan -->
                <div class="card about-card p-4">
                    <h5 class="fw-bold text-white mb-3">
                        <i class="bi bi-cpu-fill text-info me-2"></i>Pengembangan Website & Teknologi
                    </h5>
                    <p class="text-secondary small mb-3">
                        Sistem ini dibangun dengan arsitektur web modern untuk menjamin performa yang cepat, aman, dan responsif di berbagai perangkat.
                    </p>

                    <h6 class="fw-bold text-white small mb-2">Teknologi yang Digunakan:</h6>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-danger bg-opacity-25 text-danger tech-badge"><i class="bi bi-box me-1"></i> Laravel (PHP Framework)</span>
                        <span class="badge bg-primary bg-opacity-25 text-info tech-badge"><i class="bi bi-bootstrap me-1"></i> Bootstrap 5</span>
                        <span class="badge bg-secondary bg-opacity-25 text-light tech-badge"><i class="bi bi-database me-1"></i> MySQL</span>
                        <span class="badge bg-warning bg-opacity-25 text-warning tech-badge"><i class="bi bi-filetype-js me-1"></i> JavaScript / Blade</span>
                        <span class="badge bg-info bg-opacity-25 text-info tech-badge"><i class="bi bi-fonts me-1"></i> Bootstrap Icons</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\masrip\resources\views/tentang.blade.php ENDPATH**/ ?>