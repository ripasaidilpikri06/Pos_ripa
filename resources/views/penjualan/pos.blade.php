@extends('layouts.app')

@section('title', 'POS - Kasir')

@section('content')

@include('layouts.navbar')

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

    <!-- =================================================
         FLASH ERROR
    ================================================== -->

    @if (session('errors'))

        <div class="alert alert-danger rounded-4 shadow-sm mb-4 border-0">

            {{ session('errors') }}

        </div>

    @endif


    <!-- =================================================
         HEADER
    ================================================== -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="page-title m-0">

            🖥️ Transaksi Kasir (POS)

        </h2>


        @if($sale)

            <span class="badge transaction-badge fs-6 px-3 py-2 rounded-pill">

                No. Transaksi #{{ $sale->id }}

            </span>

        @endif

    </div>


    <!-- =================================================
         MAIN ROW
    ================================================== -->

    <div class="row g-4">


        <!-- =============================================
             DAFTAR PRODUK
        ============================================== -->

        <div class="col-lg-6">

            <div class="card pos-card p-3 h-100">

                <div class="card-body p-2">


                    <h5 class="mb-3">

                        📦 Daftar Produk

                    </h5>


                    <!-- =================================
                         SEARCH
                    ================================== -->

                    <div class="mb-3">

                        <form
                            method="GET"
                            action="{{ route('penjualan.create') }}"
                        >

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="form-control rounded-pill ps-4 search-input"
                                placeholder="Cari nama produk..."
                                onchange="this.form.submit()"
                            >

                        </form>

                    </div>


                    <!-- =================================
                         PRODUCT LIST
                    ================================== -->

                    <div class="product-list-container">

                        @forelse ($products as $product)


                            <form
                                method="POST"
                                action="{{ route('ItemPenjualan.store') }}"
                                class="row g-2 align-items-center mb-2 p-2 rounded-3 product-item"
                            >

                                @csrf


                                <input
                                    type="hidden"
                                    name="product_id"
                                    value="{{ $product->id }}"
                                >


                                @if($sale)

                                    <input
                                        type="hidden"
                                        name="penjualan_id"
                                        value="{{ $sale->id }}"
                                    >

                                @endif


                                <!-- PRODUCT INFO -->

                                <div class="col-7">

                                    <div class="d-flex align-items-center gap-2">


                                        @if($product->foto)

                                            <img
                                                src="{{ asset('storage/' . $product->foto) }}"
                                                alt="{{ $product->nama }}"
                                                class="product-img-thumb border"
                                            >

                                        @else

                                            <div
                                                class="product-img-thumb d-flex align-items-center justify-content-center text-muted border small"
                                            >

                                                📷

                                            </div>

                                        @endif


                                        <div class="text-truncate">

                                            <div class="product-name text-truncate">

                                                {{ $product->nama }}

                                            </div>


                                            <small class="product-price">

                                                Rp
                                                {{ number_format($product->harga_jual, 0, ',', '.') }}

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

                                        {{ ($sale?->status === 'COMPLETED' || $sale?->status === 'Selesai') ? 'disabled' : '' }}
                                    >

                                </div>


                                <!-- ADD -->

                                <div class="col-2">

                                    <button
                                        type="submit"
                                        class="btn btn-add-product w-100 rounded-pill"

                                        {{ ($sale?->status === 'COMPLETED' || $sale?->status === 'Selesai') ? 'disabled' : '' }}
                                    >

                                        +

                                    </button>

                                </div>

                            </form>


                        @empty


                            <div class="text-center empty-cart py-5">

                                Produk tidak ditemukan.

                            </div>


                        @endforelse

                    </div>

                </div>

            </div>

        </div>


        <!-- =============================================
             KERANJANG
        ============================================== -->

        <div class="col-lg-6">

            <div
                class="card pos-card p-3 h-100 d-flex flex-column justify-content-between"
            >

                <div>


                    <h5 class="mb-3">

                        🛒 Keranjang Belanja

                    </h5>


                    <!-- =================================
                         TABLE CART
                    ================================== -->

                    <div class="table-responsive cart-wrapper mb-3">

                        <table
                            class="table table-hover align-middle table-cart"
                        >

                            <thead>

                                <tr class="small">

                                    <th>
                                        Produk
                                    </th>

                                    <th>
                                        Harga
                                    </th>

                                    <th style="width: 90px;">
                                        Qty
                                    </th>

                                    <th class="text-end">
                                        Subtotal
                                    </th>

                                    <th class="text-center">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>


                            <tbody>


                                @forelse (
                                    $sale?->itemPenjualan
                                    ?? $sale?->details
                                    ?? []
                                    as $item
                                )


                                    <tr>

                                        <!-- PRODUCT -->

                                        <td>

                                            <span class="cart-product-name d-block">

                                                {{ $item->produk?->nama ?? 'Produk Dihapus' }}

                                            </span>

                                        </td>


                                        <!-- PRICE -->

                                        <td class="small cart-price">

                                            Rp
                                            {{ number_format($item->harga_satuan, 0, ',', '.') }}

                                        </td>


                                        <!-- QTY -->

                                        <td>

                                            <form
                                                method="POST"
                                                action="{{ route('ItemPenjualan.update', $item->id) }}"
                                            >

                                                @csrf

                                                @method('PUT')


                                                <input
                                                    type="number"
                                                    name="quantity"

                                                    value="{{ $item->kuantitas ?? $item->jumlah }}"

                                                    min="1"

                                                    class="form-control form-control-sm text-center rounded-pill quantity-input"

                                                    onchange="this.form.submit()"

                                                    {{ ($sale?->status === 'COMPLETED' || $sale?->status === 'Selesai') ? 'disabled' : '' }}
                                                >

                                            </form>

                                        </td>


                                        <!-- SUBTOTAL -->

                                        <td class="text-end cart-subtotal">

                                            Rp
                                            {{ number_format($item->subtotal, 0, ',', '.') }}

                                        </td>


                                        <!-- DELETE -->

                                        <td class="text-center">

                                            @can('delete', $item)

                                                <form
                                                    method="POST"
                                                    action="{{ route('ItemPenjualan.destroy', $item->id) }}"
                                                >

                                                    @csrf

                                                    @method('DELETE')


                                                    <button
                                                        type="submit"
                                                        class="btn btn-outline-danger btn-sm rounded-circle"

                                                        {{ ($sale?->status === 'COMPLETED' || $sale?->status === 'Selesai') ? 'disabled' : '' }}
                                                    >

                                                        🗑️

                                                    </button>

                                                </form>

                                            @endcan

                                        </td>

                                    </tr>


                                @empty


                                    <tr>

                                        <td
                                            colspan="5"
                                            class="text-center empty-cart py-5"
                                        >

                                            Keranjang masih kosong

                                        </td>

                                    </tr>


                                @endforelse


                            </tbody>

                        </table>

                    </div>

                </div>


                <!-- =================================
                     FOOTER CHECKOUT
                ================================== -->

                <div class="total-section pt-3">


                    <!-- TOTAL -->

                    <div
                        class="d-flex justify-content-between align-items-center mb-3"
                    >

                        <span class="fs-5 total-label">

                            Total Pembayaran:

                        </span>


                        <span class="fs-3 total-price">

                            Rp
                            {{ number_format($sale?->total_pembayaran ?? 0, 0, ',', '.') }}

                        </span>

                    </div>


                    @if($sale)


                        <!-- =========================
                             CHECKOUT FORM
                        ========================== -->

                        <form
                            method="POST"
                            action="{{ route('penjualan.update', $sale->id) }}"
                            onsubmit="return confirm('Yakin ingin menyelesaikan transaksi ini?')"
                            class="mb-2"
                        >

                            @csrf

                            @method('PUT')


                            <!-- PAYMENT -->

                            <select
                                name="payment_method"
                                class="form-select form-select-lg mb-2 rounded-pill fs-6 payment-select"
                                required

                                {{ ($sale->status === 'COMPLETED' || $sale->status === 'Selesai') ? 'disabled' : '' }}
                            >

                                <option value="">
                                    -- Pilih Metode Pembayaran --
                                </option>

                                <option
                                    value="CASH"
                                    {{ $sale->metode_pembayaran === 'CASH' ? 'selected' : '' }}
                                >
                                    Cash (Tunai)
                                </option>

                                <option
                                    value="QRIS"
                                    {{ $sale->metode_pembayaran === 'QRIS' ? 'selected' : '' }}
                                >
                                    QRIS
                                </option>

                                <option
                                    value="TRANSFER"
                                    {{ $sale->metode_pembayaran === 'TRANSFER' ? 'selected' : '' }}
                                >
                                    Transfer Bank
                                </option>

                            </select>


                            <!-- CHECKOUT BUTTON -->

                            <button
                                class="btn btn-checkout btn-lg w-100 rounded-pill shadow-sm"

                                {{ ($sale->status === 'COMPLETED' || $sale->status === 'Selesai') ? 'disabled' : '' }}
                            >

                                🚀 Checkout Transaksi

                            </button>

                        </form>


                        <!-- =========================
                             CANCEL TRANSACTION
                        ========================== -->

                        @can('delete', $sale)

                            <form
                                method="POST"
                                action="{{ route('penjualan.destroy', $sale->id) }}"
                                onsubmit="return confirm('Yakin ingin membatalkan transaksi ini?')"
                            >

                                @csrf

                                @method('DELETE')


                                <button
                                    class="btn btn-cancel w-100 rounded-pill fw-semibold"

                                    {{ ($sale->status === 'COMPLETED' || $sale->status === 'Selesai') ? 'disabled' : '' }}
                                >

                                    ❌ Batalkan Transaksi

                                </button>

                            </form>

                        @endcan


                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection