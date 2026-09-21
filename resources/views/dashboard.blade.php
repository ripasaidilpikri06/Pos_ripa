@extends('layouts.app')

@section('title', 'Dashboard Executive')

@section('content')

@include('layouts.navbar')

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
    .dashboard-card {
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 16px;
        background: rgba(13, 19, 33, 0.85);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        box-shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.6);
        transition: all 0.3s ease;
        overflow: hidden;
    }

    .dashboard-card:hover {
        transform: translateY(-3px);
        border-color: rgba(59, 130, 246, 0.4);
        box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.8);
    }

    /* Metric Stat Cards */
    .stat-card.primary {
        background: linear-gradient(135deg, #1d4ed8 0%, #3b82f6 100%);
        color: #ffffff;
        border: none;
    }

    .stat-card.success {
        background: linear-gradient(135deg, #047857 0%, #10b981 100%);
        color: #ffffff;
        border: none;
    }

    .stat-card .icon-bg {
        position: absolute;
        right: -10px;
        bottom: -10px;
        opacity: 0.15;
        width: 120px;
        height: 120px;
        pointer-events: none;
    }

    /* Header Section */
    .section-header {
        background: rgba(19, 28, 48, 0.9);
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    .section-title {
        font-size: 1rem;
        font-weight: 700;
        color: #ffffff;
        margin: 0;
    }

    /* Table Styling - High Contrast Fix */
    .table-custom {
        margin-bottom: 0;
        color: #f1f5f9;
        background-color: transparent !important;
    }

    .table-custom thead {
        background-color: rgba(15, 23, 42, 0.95) !important;
    }

    .table-custom th {
        color: #93c5fd !important;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-weight: 700;
        padding: 1rem 1.25rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
        background-color: transparent !important;
    }

    .table-custom td {
        padding: 1rem 1.25rem;
        vertical-align: middle;
        border-bottom: 1px solid rgba(255, 255, 255, 0.06) !important;
        font-size: 0.9rem;
        color: #f8fafc !important;
        background-color: transparent !important;
    }

    .table-custom tbody tr {
        background-color: transparent !important;
    }

    .table-custom tbody tr:hover {
        background-color: rgba(30, 41, 59, 0.5) !important;
    }

    /* Badges */
    .badge-soft-primary { background-color: rgba(99, 102, 241, 0.25); color: #a5b4fc; border: 1px solid rgba(99, 102, 241, 0.4); }
    .badge-soft-warning { background-color: rgba(245, 158, 11, 0.25); color: #fde68a; border: 1px solid rgba(245, 158, 11, 0.4); }
    .badge-soft-danger  { background-color: rgba(239, 68, 68, 0.25); color: #fca5a5; border: 1px solid rgba(239, 68, 68, 0.4); }
    .badge-soft-success { background-color: rgba(16, 185, 129, 0.25); color: #6ee7b7; border: 1px solid rgba(16, 185, 129, 0.4); }

    /* Custom Date Display */
    .date-badge {
        background: rgba(15, 23, 42, 0.8);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #cbd5e1;
    }
</style>

<div class="dashboard-container">
    <!-- Header Page -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 pb-2 border-bottom border-secondary border-opacity-25">
        <div>
            <h1 class="fw-bold text-white m-0">📊 Ringkasan Eksekutif</h1>
            <p class="text-secondary small m-0 mt-1">
                Pantau performa penjualan dan status persediaan barang hari ini.
            </p>
        </div>
        <div class="mt-3 mt-md-0">
            <div class="date-badge rounded-pill px-4 py-2 d-inline-flex align-items-center gap-2 shadow-sm">
                <svg width="18" height="18" fill="none" stroke="#60a5fa" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="fw-semibold small text-white">
                    {{ $tanggalHariIni->translatedFormat('l, d F Y') }}
                </span>
            </div>
        </div>
    </div>

    @can('ViewAny', App\Models\User::class)
    <!-- Section 1 & 2: Sales & Payment Metrics -->
    <div class="row g-4 mb-4">
        <!-- Card Total Penjualan -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card dashboard-card stat-card primary h-100 p-3 position-relative">
                <div class="card-body p-2 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start">
                        <span class="text-white-50 small text-uppercase fw-bold">Total Penjualan</span>
                        <div class="p-2 bg-white bg-opacity-20 rounded-3">
                            <svg width="20" height="20" fill="none" stroke="#ffffff" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h3 class="fw-bold text-white mb-0">Rp {{ number_format($ringkasan['total_penjualan'], 0, ',', '.') }}</h3>
                        <span class="text-white-50 small">Omset Masuk Hari Ini</span>
                    </div>
                </div>
                <svg class="icon-bg text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>

        <!-- Card Total Transaksi -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card dashboard-card stat-card success h-100 p-3 position-relative">
                <div class="card-body p-2 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-start">
                        <span class="text-white-50 small text-uppercase fw-bold">Total Transaksi</span>
                        <div class="p-2 bg-white bg-opacity-20 rounded-3">
                            <svg width="20" height="20" fill="none" stroke="#ffffff" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h3 class="fw-bold text-white mb-0">{{ number_format($ringkasan['total_transaksi'], 0, ',', '.') }}</h3>
                        <span class="text-white-50 small">Struk Terproses</span>
                    </div>
                </div>
                <svg class="icon-bg text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
        </div>

        <!-- Card Pembayaran Tunai -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card dashboard-card h-100 p-3">
                <div class="card-body p-2 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-light small text-uppercase fw-bold">Pembayaran Tunai</span>
                        <span class="badge badge-soft-success rounded-pill px-3 py-1">Cash</span>
                    </div>
                    <div class="mt-3">
                        <h4 class="fw-bold text-white mb-0">Rp {{ number_format($ringkasan['total_cash'], 0, ',', '.') }}</h4>
                        <span class="text-slate-400 small">Total Kas Fisik Hari Ini</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Pembayaran Non-Tunai -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="card dashboard-card h-100 p-3">
                <div class="card-body p-2 d-flex flex-column justify-content-between">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="text-light small text-uppercase fw-bold">Pembayaran Non-Tunai</span>
                        <span class="badge badge-soft-warning rounded-pill px-3 py-1">Digital</span>
                    </div>
                    <div class="mt-3">
                        <h4 class="fw-bold text-white mb-0">Rp {{ number_format($ringkasan['total_non_tunai'], 0, ',', '.') }}</h4>
                        <span class="text-slate-400 small">QRIS, EDC, & Transfer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcan

    <!-- Section 3: Critical Inventory Status -->
    <div class="row g-4 mb-4">
        <!-- Stok Rendah -->
        <div class="col-12 col-lg-6">
            <div class="card dashboard-card h-100">
                <div class="section-header d-flex align-items-center justify-content-between">
                    <h5 class="section-title d-flex align-items-center gap-2">
                        <span class="p-1 rounded bg-warning bg-opacity-25 text-warning d-inline-flex">
                            ⚠️
                        </span>
                        Produk Stok Rendah
                    </h5>
                </div>
                <div class="p-0">
                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th width="12%">#</th>
                                    <th>Nama Produk</th>
                                    <th class="text-end" width="30%">Tersisa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produkStokRendah as $index => $produk)
                                    <tr>
                                        <td class="text-light fw-medium">{{ $produkStokRendah->firstItem() + $index }}</td>
                                        <td class="fw-bold text-white">{{ $produk->nama }}</td>
                                        <td class="text-end">
                                            <span class="badge badge-soft-warning rounded-pill px-3 py-1 fw-semibold">
                                                {{ $produk->stok }} unit
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-light small">
                                            Semua stok produk mencukupi.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($produkStokRendah->hasPages())
                <div class="p-3 border-top border-secondary border-opacity-25 d-flex justify-content-end">
                    {{ $produkStokRendah->links() }}
                </div>
                @endif
            </div>
        </div>

        <!-- Stok Habis -->
        <div class="col-12 col-lg-6">
            <div class="card dashboard-card h-100">
                <div class="section-header d-flex align-items-center justify-content-between">
                    <h5 class="section-title d-flex align-items-center gap-2">
                        <span class="p-1 rounded bg-danger bg-opacity-25 text-danger d-inline-flex">
                            🚫
                        </span>
                        Produk Habis
                    </h5>
                </div>
                <div class="p-0">
                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th width="12%">#</th>
                                    <th>Nama Produk</th>
                                    <th class="text-end" width="30%">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produkStokHabis as $index => $produk)
                                    <tr>
                                        <td class="text-light fw-medium">{{ $produkStokHabis->firstItem() + $index }}</td>
                                        <td class="fw-bold text-white">{{ $produk->nama }}</td>
                                        <td class="text-end">
                                            <span class="badge badge-soft-danger rounded-pill px-3 py-1 fw-semibold">
                                                Out of Stock
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-light small">
                                            Tidak ada produk yang kehabisan stok.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                @if($produkStokHabis->hasPages())
                <div class="p-3 border-top border-secondary border-opacity-25 d-flex justify-content-end">
                    {{ $produkStokHabis->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Section 4: Best Seller Products -->
    <div class="row">
        <div class="col-12">
            <div class="card dashboard-card">
                <div class="section-header d-flex align-items-center justify-content-between">
                    <h5 class="section-title d-flex align-items-center gap-2">
                        <span class="p-1 rounded bg-success bg-opacity-25 text-success d-inline-flex">
                            🔥
                        </span>
                        Produk Terlaris Hari Ini
                    </h5>
                </div>
                <div class="p-0">
                    <div class="table-responsive">
                        <table class="table table-custom align-middle">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th class="text-center">Sisa Stok</th>
                                    <th class="text-end">Total Terjual</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produkTerlaris as $produk)
                                    <tr>
                                        <td>
                                            <span class="fw-bold text-white d-block">{{ $produk->nama }}</span>
                                        </td>
                                        <td class="text-center text-light">
                                            {{ $produk->stok }} unit
                                        </td>
                                        <td class="text-end">
                                            <span class="badge badge-soft-success rounded-pill px-3 py-1 fw-semibold">
                                                {{ $produk->total_terjual }} Terjual
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-4 text-light small">
                                            Belum ada transaksi penjualan yang tercatat hari ini.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection