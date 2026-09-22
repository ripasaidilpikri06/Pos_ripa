<!-- Import Bootstrap Icons jika belum ada di file layout utama -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    .custom-navbar {
        background: rgba(13, 19, 33, 0.85) !important;
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
    }
    
    .navbar-brand-custom {
        font-weight: 800;
        font-size: 1.25rem;
        color: #38bdf8 !important;
        letter-spacing: -0.5px;
    }

    .nav-link-custom {
        font-weight: 500;
        color: #94a3b8 !important;
        padding: 0.5rem 1rem !important;
        border-radius: 8px;
        transition: all 0.2s ease;
    }

    .nav-link-custom:hover {
        color: #38bdf8 !important;
        background-color: rgba(59, 130, 246, 0.15);
    }

    .nav-link-custom.active {
        color: #38bdf8 !important;
        background-color: rgba(59, 130, 246, 0.25);
        font-weight: 600;
        border: 1px solid rgba(59, 130, 246, 0.3);
    }

    .btn-logout {
        border-radius: 50px;
        padding: 0.4rem 1.2rem;
        font-weight: 600;
        font-size: 0.875rem;
    }

    /* Penyesuaian Toggler Button untuk Dark Mode */
    .navbar-toggler {
        border-color: rgba(255, 255, 255, 0.2) !important;
    }

    .navbar-toggler-icon {
        filter: invert(1) grayscale(100%) brightness(200%);
    }
</style>

<nav class="navbar navbar-expand-lg custom-navbar sticky-top py-2">
    <div class="container">
        <!-- Logo / Brand -->
        <a class="navbar-brand navbar-brand-custom d-flex align-items-center gap-2" href="<?php echo e(route('dashboard')); ?>">
            <i class="bi bi-cart-check-fill fs-4 text-info"></i>
            <span>Toko Sneakers</span>
        </a>

        <!-- Toggle Mobile -->
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-3 gap-1">
                <li class="nav-item">
                    <a class="nav-link nav-link-custom <?php echo e(Request::is('dashboard*') ? 'active' : ''); ?>" href="<?php echo e(route('dashboard')); ?>">
                        <i class="bi bi-grid-1x2 me-1"></i> Dashboard
                    </a>
                </li>

                
                <?php if(Route::has('admin.users')): ?>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom <?php echo e(Request::is('admin/users*') ? 'active' : ''); ?>" href="<?php echo e(route('admin.users')); ?>">
                        <i class="bi bi-people me-1"></i> Users
                    </a>
                </li>
                <?php endif; ?>

                <li class="nav-item">
                    <a class="nav-link nav-link-custom <?php echo e(Request::is('produk*') ? 'active' : ''); ?>" href="<?php echo e(route('produk.index')); ?>">
                        <i class="bi bi-box-seam me-1"></i> Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom <?php echo e(Request::is('penjualan*') ? 'active' : ''); ?>" href="<?php echo e(route('penjualan.index')); ?>">
                        <i class="bi bi-receipt me-1"></i> Penjualan
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-custom <?php echo e(Request::is('about') ? 'active' : ''); ?>" href="<?php echo e(route('about')); ?>">
                        <i class="bi bi-info-circle me-1"></i> Tentang Saya
                    </a>
                </li>
            </ul>

            <!-- Right Area: Profile Info & Logout -->
            <div class="d-flex align-items-center gap-3 pt-2 pt-lg-0">
                <?php if(auth()->guard()->check()): ?>
                    <div class="d-none d-lg-block text-end">
                        <div class="fw-bold text-white small" style="line-height: 1.2;"><?php echo e(Auth::user()->name); ?></div>
                        <small class="text-info" style="font-size: 0.75rem;"><?php echo e(Auth::user()->role->name ?? (is_string(Auth::user()->role) ? Auth::user()->role : 'Kasir')); ?></small>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('logout')); ?>" method="POST" class="m-0">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-danger btn-logout d-flex align-items-center gap-2 shadow-sm">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav><?php /**PATH C:\laragon\www\Pos_ripa\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>