

<?php $__env->startSection('title', 'Produk'); ?>

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

    .dashboard-card {
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        background: rgba(13, 19, 33, 0.85);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.6);
        transition: all 0.3s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-2px);
        border-color: rgba(59, 130, 246, 0.4);
        box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.8);
    }

    .product-card {
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        background: rgba(13, 19, 33, 0.85);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.6);
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .product-card:hover {
        transform: translateY(-5px);
        border-color: rgba(59, 130, 246, 0.4);
        box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.8);
    }

    .product-img-wrapper {
        height: 200px;
        overflow: hidden;
        position: relative;
        background-color: rgba(15, 23, 42, 0.9);
    }

    .product-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-card:hover .product-img {
        transform: scale(1.05);
    }

    .no-img-placeholder {
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #64748b;
        background-color: rgba(15, 23, 42, 0.9);
    }

    .form-control {
        background-color: rgba(15, 23, 42, 0.7) !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
        color: #f8fafc !important;
    }

    .form-control:focus {
        background-color: rgba(15, 23, 42, 0.9) !important;
        border-color: #3b82f6 !important;
        box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25) !important;
        color: #f8fafc !important;
    }

    .form-control::placeholder {
        color: #64748b !important;
    }

    .badge-soft-light {
        background-color: rgba(255, 255, 255, 0.1) !important;
        color: #f1f5f9 !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
    }
</style>

<div class="dashboard-container">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 pb-2 border-bottom border-secondary border-opacity-25">
        <div>
            <h1 class="fw-bold text-white m-0">📦 Halaman Produk</h1>
            <p class="text-secondary small m-0 mt-1">
                Kelola daftar produk, stok, dan informasi harga barang.
            </p>
        </div>
        <div class="mt-3 mt-md-0">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', App\Models\Produk::class)): ?>
            <a href="<?php echo e(route('produk.create')); ?>" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold shadow-sm">
                ➕ Create Produk
            </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="card dashboard-card p-4 mb-4">
        <form action="<?php echo e(route('produk.index')); ?>" method="GET">
            <div class="input-group">
                <input 
                    type="text" 
                    name="search" 
                    value="<?php echo e(request('search')); ?>" 
                    class="form-control form-control-lg border-end-0 rounded-start-pill ps-4" 
                    placeholder="Search nama produk..."
                >
                <button class="btn btn-primary rounded-end-pill px-4" type="submit">
                    🔍 Search
                </button>
            </div>
        </form>
    </div>

    <div class="row g-4 mb-4">
        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                // Hitung Harga Jual Diskon (Harga Beli awal dikurangi diskon 10%)
                $harga_jual_diskon = $product->harga_beli * 0.90;
            ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card product-card h-100">
                    <div class="product-img-wrapper">
                        <?php if($product->foto && Storage::disk('public')->exists($product->foto)): ?>
                            <img src="<?php echo e(asset('storage/'.$product->foto)); ?>" class="product-img" alt="<?php echo e($product->nama); ?>">
                        <?php else: ?>
                            <div class="no-img-placeholder text-center p-3">
                                <div>
                                    <span class="fs-1 d-block">🖼️</span>
                                    <small class="fw-semibold text-secondary">Tidak Ada Foto</small>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Badge Promo Diskon 10% -->
                        <span class="position-absolute top-0 start-0 m-3 badge rounded-pill bg-warning text-dark fw-bold shadow-sm">
                            🏷️ DISKON 10%
                        </span>

                        <span class="position-absolute top-0 end-0 m-3 badge rounded-pill <?php echo e($product->stok > 0 ? 'bg-success' : 'bg-danger'); ?> shadow-sm">
                            Stok: <?php echo e($product->stok); ?>

                        </span>
                    </div>

                    <div class="card-body d-flex flex-column justify-content-between p-4">
                        <div>
                            <div class="d-flex align-items-center mb-2">
                                <span class="badge badge-soft-light me-2">#<?php echo e($products->firstItem() + $loop->index); ?></span>
                                <small class="text-secondary text-truncate">👤 <?php echo e($product->user->name ?? '-'); ?></small>
                            </div>
                            <h5 class="card-title fw-bold text-white text-truncate mb-3" title="<?php echo e($product->nama); ?>">
                                <?php echo e($product->nama); ?>

                            </h5>
                            
                            <div class="mb-3">
                                <!-- Harga Beli Awal (Diubah warna dari text-warning menjadi text-info/biru) -->
                                <div class="d-flex justify-content-between align-items-center mb-1">
                                    <small class="text-secondary">Harga Beli Awal:</small>
                                    <span class="text-decoration-line-through text-info fw-semibold">
                                        Rp <?php echo e(number_format($product->harga_beli, 0, ',', '.')); ?>

                                    </span>
                                </div>

                                <hr class="border-secondary opacity-25 my-2">

                                <!-- Harga Setelah Diskon -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-secondary fw-semibold">Harga Setelah Diskon:</small>
                                    <span class="fw-bold text-info fs-6">
                                        Rp <?php echo e(number_format($harga_jual_diskon, 0, ',', '.')); ?>

                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="pt-3 border-top border-secondary border-opacity-25 mt-2">
                            <div class="d-flex gap-2">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $product)): ?>
                                <a href="<?php echo e(route('produk.edit', $product->id)); ?>" class="btn btn-primary btn-sm w-100 rounded-pill fw-semibold">
                                    ✏️ Edit
                                </a>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $product)): ?>
                                <form action="<?php echo e(route('produk.destroy', $product->id)); ?>" method="POST" class="w-100">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="btn btn-danger btn-sm w-100 rounded-pill fw-semibold" onclick="return confirm('Apakah anda yakin akan menghapus produk ini?')">
                                        🗑️ Hapus
                                    </button>
                                </form>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="card dashboard-card p-5 text-center">
                    <span class="fs-1 d-block mb-3">📂</span>
                    <h4 class="fw-bold text-white">Data tidak tersedia</h4>
                    <p class="text-secondary mb-0">Belum ada produk yang ditambahkan atau hasil pencarian tidak ditemukan.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <?php if($products->hasPages()): ?>
        <div class="d-flex justify-content-end">
            <?php echo e($products->links()); ?>

        </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Pos_ripa\resources\views/produk/index.blade.php ENDPATH**/ ?>