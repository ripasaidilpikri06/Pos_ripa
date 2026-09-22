

<?php $__env->startSection('title', 'POS - Kasir'); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('layouts.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<style>
    /* =====================================================
       BACKGROUND UTAMA
    ===================================================== */

    body {
        background: #0b0f14 !important;
        min-height: 100vh;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        color: #f8fafc;
    }

    /* =====================================================
       CONTAINER
    ===================================================== */

    .pos-container {
        width: 100%;
        padding: 28px 5%;
    }

    /* =====================================================
       JUDUL HALAMAN
    ===================================================== */

    .page-title {
        color: #f8fafc !important;
        font-weight: 700;
    }

    /* =====================================================
       CARD
    ===================================================== */

    .pos-card {
        border: 1px solid #263447 !important;
        border-radius: 16px !important;
        background: #f8f9fa !important;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
        overflow: hidden;
    }

    /* =====================================================
       JUDUL CARD
    ===================================================== */

    .pos-card h5 {
        color: #212529 !important;
        font-weight: 700;
    }

    /* =====================================================
       SEARCH
    ===================================================== */

    .search-input {
        background: #1a2535 !important;
        border: 1px solid #34445a !important;
        color: #ffffff !important;
        height: 42px;
    }

    .search-input::placeholder {
        color: #a8b3c2 !important;
        opacity: 1;
    }

    .search-input:focus {
        background: #1a2535 !important;
        color: #ffffff !important;
        border-color: #0d6efd !important;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15) !important;
    }

    /* =====================================================
       PRODUCT LIST
    ===================================================== */

    .product-list-container {
        max-height: 65vh;
        overflow-y: auto;
        padding-right: 4px;
    }

    .product-list-container::-webkit-scrollbar {
        width: 6px;
    }

    .product-list-container::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }

    .product-list-container::-webkit-scrollbar-track {
        background: transparent;
    }

    /* =====================================================
       PRODUCT ITEM
    ===================================================== */

    .product-item {
        background: #ffffff !important;
        border: 1px solid #d8dee7 !important;
        transition: all 0.2s ease;
    }

    .product-item:hover {
        border-color: #0d6efd !important;
        box-shadow: 0 3px 10px rgba(13, 110, 253, 0.12);
    }

    .product-img-thumb {
        width: 48px;
        height: 48px;
        object-fit: cover;
        border-radius: 10px;
        background: #e9ecef;
        flex-shrink: 0;
    }

    .product-name {
        color: #212529 !important;
        font-weight: 700;
    }

    .product-price {
        color: #0d6efd !important;
        font-weight: 600;
    }

    /* =====================================================
       QUANTITY
    ===================================================== */

    .quantity-input {
        background: #1a2535 !important;
        border: 1px solid #34445a !important;
        color: #ffffff !important;
        text-align: center;
    }

    .quantity-input:focus {
        background: #1a2535 !important;
        color: #ffffff !important;
        border-color: #0d6efd !important;
        box-shadow: none !important;
    }

    /* =====================================================
       TOMBOL TAMBAH
    ===================================================== */

    .btn-add-product {
        background: #0d6efd !important;
        border: none !important;
        color: #ffffff !important;
        font-weight: 700;
    }

    .btn-add-product:hover {
        background: #0b5ed7 !important;
    }

    /* =====================================================
       CART TABLE
    ===================================================== */

    .cart-wrapper {
        border: 1px solid #d8dee7 !important;
        background: #ffffff !important;
        border-radius: 10px;
        overflow: hidden;
    }

    .table-cart {
        margin-bottom: 0 !important;
        color: #212529 !important;
    }

    .table-cart thead {
        background: #edf2f7 !important;
    }

    .table-cart thead th {
        color: #212529 !important;
        font-weight: 700;
        border-bottom: 1px solid #d8dee7 !important;
        white-space: nowrap;
    }

    .table-cart tbody td {
        color: #343a40 !important;
        border-color: #e1e5ea !important;
    }

    .table-cart tbody tr:hover {
        background: #f8fafc !important;
    }

    .cart-product-name {
        color: #212529 !important;
        font-weight: 600;
    }

    .cart-price {
        color: #343a40 !important;
    }

    .cart-subtotal {
        color: #0d6efd !important;
        font-weight: 700;
    }

    /* =====================================================
       EMPTY CART
    ===================================================== */

    .empty-cart {
        color: #6c757d !important;
    }

    /* =====================================================
       TOTAL PEMBAYARAN
    ===================================================== */

    .total-section {
        border-top: 1px solid #d8dee7 !important;
    }

    .total-label {
        color: #6c757d !important;
    }

    .total-price {
        color: #0d6efd !important;
        font-weight: 700;
    }

    /* =====================================================
       PAYMENT SELECT
    ===================================================== */

    .payment-select {
        background-color: #1a2535 !important;
        color: #ffffff !important;
        border: 1px solid #34445a !important;
    }

    .payment-select:focus {
        background-color: #1a2535 !important;
        color: #ffffff !important;
        border-color: #0d6efd !important;
        box-shadow: none !important;
    }

    .payment-select option {
        background: #1a2535 !important;
        color: #ffffff !important;
    }

    /* =====================================================
       TRANSACTION BADGE
    ===================================================== */

    .transaction-badge {
        background: #0d6efd !important;
        color: #ffffff !important;
        font-weight: 700;
    }

    /* =====================================================
       CHECKOUT
    ===================================================== */

    .btn-checkout {
        background: #198754 !important;
        border-color: #198754 !important;
        color: #ffffff !important;
        font-weight: 700;
    }

    .btn-checkout:hover {
        background: #157347 !important;
        border-color: #157347 !important;
    }

    /* =====================================================
       BATAL TRANSAKSI
    ===================================================== */

    .btn-cancel {
        color: #dc3545 !important;
        border-color: #dc3545 !important;
        background: #ffffff !important;
    }

    .btn-cancel:hover {
        background: #dc3545 !important;
        color: #ffffff !important;
    }

    /* =====================================================
       ALERT
    ===================================================== */

    .alert-danger {
        color: #842029 !important;
    }

    /* =====================================================
       MOBILE
    ===================================================== */

    @media (max-width: 991px) {
        .pos-container {
            padding: 20px;
        }

        .product-list-container {
            max-height: none;
        }
    }

    @media (max-width: 576px) {
        .pos-container {
            padding: 15px;
        }

        .page-title {
            font-size: 22px;
        }

        .transaction-badge {
            font-size: 12px !important;
        }
    }
</style>

<!-- =====================================================
     MAIN CONTAINER
===================================================== -->

<div class="pos-container">

    <!-- FLASH ERROR -->
    <?php if(session('errors')): ?>
        <div class="alert alert-danger rounded-4 shadow-sm mb-4 border-0">
            <?php echo e(session('errors')); ?>

        </div>
    <?php endif; ?>

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="page-title m-0">
            🖥️ Transaksi Kasir (POS)
        </h2>

        <?php if($sale): ?>
            <span class="badge transaction-badge fs-6 px-3 py-2 rounded-pill">
                No. Transaksi #<?php echo e($sale->id); ?>

            </span>
        <?php endif; ?>
    </div>

    <!-- MAIN ROW -->
    <div class="row g-4">

        <!-- DAFTAR PRODUK -->
        <div class="col-lg-6">
            <div class="card pos-card p-3 h-100">
                <div class="card-body p-2">
                    <h5 class="mb-3">
                        📦 Daftar Produk
                    </h5>

                    <!-- SEARCH -->
                    <div class="mb-3">
                        <form method="GET" action="<?php echo e(route('penjualan.create')); ?>">
                            <input
                                type="text"
                                name="search"
                                value="<?php echo e(request('search')); ?>"
                                class="form-control rounded-pill ps-4 search-input"
                                placeholder="Cari nama produk..."
                                onchange="this.form.submit()"
                            >
                        </form>
                    </div>

                    <!-- PRODUCT LIST -->
                    <div class="product-list-container">
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <form
                                method="POST"
                                action="<?php echo e(route('ItemPenjualan.store')); ?>"
                                class="row g-2 align-items-center mb-2 p-2 rounded-3 product-item"
                            >
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">

                                <?php if($sale): ?>
                                    <input type="hidden" name="penjualan_id" value="<?php echo e($sale->id); ?>">
                                <?php endif; ?>

                                <!-- PRODUCT INFO -->
                                <div class="col-7">
                                    <div class="d-flex align-items-center gap-2">
                                        <?php if($product->foto): ?>
                                            <img
                                                src="<?php echo e(asset('storage/' . $product->foto)); ?>"
                                                alt="<?php echo e($product->nama); ?>"
                                                class="product-img-thumb border"
                                            >
                                        <?php else: ?>
                                            <div class="product-img-thumb d-flex align-items-center justify-content-center text-muted border small">
                                                📷
                                            </div>
                                        <?php endif; ?>

                                        <div class="text-truncate">
                                            <div class="product-name text-truncate">
                                                <?php echo e($product->nama); ?>

                                            </div>
                                            <small class="product-price">
                                                Rp <?php echo e(number_format($product->harga_jual, 0, ',', '.')); ?>

                                            </small>
                                        </div>
                                    </div>
                                </div>

                                <!-- QUANTITY -->
                                <div class="col-3">
                                    <input
                                        type="number"
                                        name="quantity"
                                        value="1"
                                        min="1"
                                        class="form-control rounded-pill quantity-input"
                                        <?php echo e(($sale?->status === 'COMPLETED' || $sale?->status === 'Selesai') ? 'disabled' : ''); ?>

                                    >
                                </div>

                                <!-- ADD -->
                                <div class="col-2">
                                    <button
                                        type="submit"
                                        class="btn btn-add-product w-100 rounded-pill"
                                        <?php echo e(($sale?->status === 'COMPLETED' || $sale?->status === 'Selesai') ? 'disabled' : ''); ?>

                                    >
                                        +
                                    </button>
                                </div>
                            </form>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="text-center empty-cart py-5">
                                Produk tidak ditemukan.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- KERANJANG -->
        <div class="col-lg-6">
            <div class="card pos-card p-3 h-100 d-flex flex-column justify-content-between">
                <div>
                    <h5 class="mb-3">
                        🛒 Keranjang Belanja
                    </h5>

                    <!-- TABLE CART -->
                    <div class="table-responsive cart-wrapper mb-3">
                        <table class="table table-hover align-middle table-cart">
                            <thead>
                                <tr class="small">
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th style="width: 90px;">Qty</th>
                                    <th class="text-end">Subtotal</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $sale?->itemPenjualan ?? $sale?->details ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <!-- PRODUCT -->
                                        <td>
                                            <span class="cart-product-name d-block">
                                                <?php echo e($item->produk?->nama ?? 'Produk Dihapus'); ?>

                                            </span>
                                        </td>

                                        <!-- PRICE -->
                                        <td class="small cart-price">
                                            Rp <?php echo e(number_format($item->harga_satuan, 0, ',', '.')); ?>

                                        </td>

                                        <!-- QTY -->
                                        <td>
                                            <form
                                                method="POST"
                                                action="<?php echo e(route('ItemPenjualan.update', $item->id)); ?>"
                                            >
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                <input
                                                    type="number"
                                                    name="quantity"
                                                    value="<?php echo e($item->kuantitas ?? $item->jumlah); ?>"
                                                    min="1"
                                                    class="form-control form-control-sm text-center rounded-pill quantity-input"
                                                    onchange="this.form.submit()"
                                                    <?php echo e(($sale?->status === 'COMPLETED' || $sale?->status === 'Selesai') ? 'disabled' : ''); ?>

                                                >
                                            </form>
                                        </td>

                                        <!-- SUBTOTAL -->
                                        <td class="text-end cart-subtotal">
                                            Rp <?php echo e(number_format($item->subtotal, 0, ',', '.')); ?>

                                        </td>

                                        <!-- DELETE -->
                                        <td class="text-center">
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $item)): ?>
                                                <form
                                                    method="POST"
                                                    action="<?php echo e(route('ItemPenjualan.destroy', $item->id)); ?>"
                                                >
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button
                                                        type="submit"
                                                        class="btn btn-outline-danger btn-sm rounded-circle"
                                                        <?php echo e(($sale?->status === 'COMPLETED' || $sale?->status === 'Selesai') ? 'disabled' : ''); ?>

                                                    >
                                                        🗑️
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="text-center empty-cart py-5">
                                            Keranjang masih kosong
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- FOOTER CHECKOUT -->
                <div class="total-section pt-3">
                    <!-- TOTAL -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="fs-5 total-label">
                            Total Pembayaran:
                        </span>
                        <span class="fs-3 total-price">
                            Rp <?php echo e(number_format($sale?->total_pembayaran ?? 0, 0, ',', '.')); ?>

                        </span>
                    </div>

                    <?php if($sale): ?>
                        <!-- CHECKOUT FORM -->
                        <form
                            method="POST"
                            action="<?php echo e(route('penjualan.update', $sale->id)); ?>"
                            onsubmit="return confirm('Yakin ingin menyelesaikan transaksi ini?')"
                            class="mb-2"
                        >
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <!-- PAYMENT -->
                            <select
                                id="paymentMethodSelect"
                                name="payment_method"
                                class="form-select form-select-lg mb-2 rounded-pill fs-6 payment-select"
                                required
                                <?php echo e(($sale->status === 'COMPLETED' || $sale->status === 'Selesai') ? 'disabled' : ''); ?>

                            >
                                <option value="">-- Pilih Metode Pembayaran --</option>
                                <option value="CASH" <?php echo e($sale->metode_pembayaran === 'CASH' ? 'selected' : ''); ?>>
                                    Cash (Tunai)
                                </option>
                                <option value="QRIS" <?php echo e($sale->metode_pembayaran === 'QRIS' ? 'selected' : ''); ?>>
                                    QRIS
                                </option>
                                <option value="TRANSFER" <?php echo e($sale->metode_pembayaran === 'TRANSFER' ? 'selected' : ''); ?>>
                                    Transfer Bank
                                </option>
                            </select>

                            <!-- CHECKOUT BUTTON -->
                            <button
                                class="btn btn-checkout btn-lg w-100 rounded-pill shadow-sm"
                                <?php echo e(($sale->status === 'COMPLETED' || $sale->status === 'Selesai') ? 'disabled' : ''); ?>

                            >
                                🚀 Checkout Transaksi
                            </button>
                        </form>

                        <!-- CANCEL TRANSACTION -->
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete', $sale)): ?>
                            <form
                                method="POST"
                                action="<?php echo e(route('penjualan.destroy', $sale->id)); ?>"
                                onsubmit="return confirm('Yakin ingin membatalkan transaksi ini?')"
                            >
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button
                                    class="btn btn-cancel w-100 rounded-pill fw-semibold"
                                    <?php echo e(($sale->status === 'COMPLETED' || $sale->status === 'Selesai') ? 'disabled' : ''); ?>

                                >
                                    ❌ Batalkan Transaksi
                                </button>
                            </form>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- =====================================================
     MODAL POPUP QRIS
===================================================== -->
<div class="modal fade" id="qrisModal" tabindex="-1" aria-labelledby="qrisModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-dark border-0 rounded-4 shadow">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" id="qrisModalLabel">Pembayaran QRIS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <p class="text-muted mb-2">Scan kode QRIS di bawah ini untuk menyelesaikan pembayaran:</p>
                
                <!-- Dynamic QR Code generator using API -->
                <div class="p-3 bg-white d-inline-block rounded-3 border mb-3">
                    <img 
                        src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=POS-TRANSAKSI-<?php echo e($sale?->id); ?>-TOTAL-<?php echo e($sale?->total_pembayaran); ?>" 
                        alt="QRIS Code" 
                        class="img-fluid"
                        style="max-width: 220px;"
                    >
                </div>
                
                <h4 class="fw-bold text-primary mb-0">
                    Rp <?php echo e(number_format($sale?->total_pembayaran ?? 0, 0, ',', '.')); ?>

                </h4>
                <small class="text-muted">No. Transaksi: #<?php echo e($sale?->id); ?></small>
            </div>
            <div class="modal-footer border-0 pt-0 justify-content-center">
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- =====================================================
     JAVASCRIPT SCRIPT
===================================================== -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paymentSelect = document.getElementById('paymentMethodSelect');
        if (paymentSelect) {
            paymentSelect.addEventListener('change', function () {
                if (this.value === 'QRIS') {
                    const qrisModal = new bootstrap.Modal(document.getElementById('qrisModal'));
                    qrisModal.show();
                }
            });
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\Pos_ripa\resources\views/penjualan/pos.blade.php ENDPATH**/ ?>