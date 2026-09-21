@extends('layouts.app')

@section('title', 'Penjualan')

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
    }

    .dashboard-card:hover {
        transform: translateY(-2px);
        border-color: rgba(59, 130, 246, 0.4);
        box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.8);
    }

    /* Form Input Styling */
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

    .product-img-thumb {
        width: 48px;
        height: 48px;
        object-fit: cover;
        border-radius: 8px;
    }

    /* Badge Custom */
    .badge-soft-light {
        background-color: rgba(255, 255, 255, 0.1) !important;
        color: #f1f5f9 !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
    }

    /* Modal Styling for Dark Theme */
    .modal-content {
        background: #0d1321 !important;
        border: 1px solid rgba(255, 255, 255, 0.12) !important;
        color: #f8fafc !important;
    }

    .modal-header, .modal-footer {
        border-color: rgba(255, 255, 255, 0.1) !important;
    }

    .btn-close {
        filter: invert(1) grayscale(100%) brightness(200%);
    }
</style>

<div class="dashboard-container">
    <!-- Flash Message Error -->
    @if (session('errors'))
        <div class="alert alert-danger rounded-4 shadow-sm mb-4 border-0 bg-danger bg-opacity-25 text-danger border border-danger border-opacity-50">
            {{ session('errors') }}
        </div>
    @endif

    <!-- Header Page -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 pb-2 border-bottom border-secondary border-opacity-25">
        <div>
            <h1 class="fw-bold text-white m-0">🛒 Halaman Penjualan</h1>
            <p class="text-secondary small m-0 mt-1">
                Kelola riwayat transaksi penjualan dan detail item produk.
            </p>
        </div>
        <div class="mt-3 mt-md-0">
            <a href="{{ route('penjualan.create') }}" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold shadow-sm">
                ➕ Create Penjualan
            </a>
        </div>
    </div>

    <!-- Card Wrapper -->
    <div class="card dashboard-card p-4">
        <!-- Form Search -->
        <form action="{{ route('penjualan.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request()->search }}" 
                    class="form-control form-control-lg border-end-0 rounded-start-pill ps-4" 
                    placeholder="Search penjualan..."
                >
                <button class="btn btn-primary rounded-end-pill px-4" type="submit">
                    🔍 Search
                </button>
            </div>
        </form>

        <!-- Data Table -->
        <div class="table-responsive">
            <table class="table table-custom align-middle">
                <thead>
                    <tr>
                        <th scope="col" width="6%">#</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Kasir</th>
                        <th scope="col">Total Pembayaran</th>
                        <th scope="col">Metode Pembayaran</th>
                        <th scope="col">Status</th>
                        <th scope="col" class="text-center" width="24%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sales as $sale)
                        <tr>
                            <td class="text-light fw-medium">{{ $sales->firstItem() + $loop->index }}</td>
                            <td class="text-secondary">{{ $sale->created_at->translatedFormat('d-m-Y H:i:s') }}</td>
                            <td class="fw-bold text-white">{{ $sale->user->name ?? 'N/A' }}</td>
                            <td class="fw-bold text-info">Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</td>
                            <td>
                                <span class="badge badge-soft-light px-3 py-2 rounded-pill">
                                    {{ $sale->metode_pembayaran }}
                                </span>
                            </td>
                            <td>
                                <span class="badge {{ $sale->status == 'Selesai' || $sale->status == 'COMPLETED' ? 'bg-success' : 'bg-warning text-dark' }} px-3 py-2 rounded-pill fw-semibold">
                                    {{ $sale->status }}
                                </span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <button type="button" class="btn btn-sm btn-primary rounded-pill px-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#detailModal{{ $sale->id }}">
                                        👁️ Detail
                                    </button>

                                    @can('view', $sale)
                                        <a href="{{ route('penjualan.edit', $sale) }}" class="btn btn-sm btn-warning rounded-pill px-3 fw-semibold text-dark">
                                            ✏️ Edit
                                        </a>
                                    @endcan
                                    
                                    @can('delete', $sale)
                                        <form action="{{ route('penjualan.destroy', $sale) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger rounded-pill px-3 fw-semibold" onclick="return confirm('Apakah anda yakin akan menghapus penjualan ini?')">
                                                🗑️ Hapus
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-secondary text-center py-4 small">
                                Data Tidak Ditemukan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($sales->hasPages())
            <div class="d-flex justify-content-end mt-4">
                {{ $sales->links() }}
            </div>
        @endif
    </div>
</div>

<!-- ================= MODAL DETAIL PENJUALAN ================= -->
@foreach($sales as $sale)
    <div class="modal fade" id="detailModal{{ $sale->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $sale->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header border-bottom pb-3">
                    <h5 class="modal-title fw-bold text-white" id="detailModalLabel{{ $sale->id }}">
                        🧾 Rincian Transaksi #{{ $sale->id }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-start p-4">
                    <!-- Informasi Kasir & Tanggal -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <p class="mb-1 text-secondary small">Kasir</p>
                            <p class="fw-bold text-white mb-0">{{ $sale->user->name ?? '-' }}</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <p class="mb-1 text-secondary small">Waktu Transaksi</p>
                            <p class="fw-bold text-white mb-0">{{ $sale->created_at->translatedFormat('d F Y, H:i:s') }}</p>
                        </div>
                    </div>

                    <!-- Tabel Item Produk Beserta Foto -->
                    <div class="table-responsive rounded-3 border border-secondary border-opacity-25">
                        <table class="table table-custom align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama Produk</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-end">Harga Satuan</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $items = (isset($sale->itemPenjualan) && $sale->itemPenjualan->count() > 0) 
                                        ? $sale->itemPenjualan 
                                        : ($sale->details ?? []);
                                @endphp

                                @forelse($items as $detail)
                                    <tr>
                                        <td style="width: 60px;">
                                            @if(optional($detail->produk)->foto)
                                                <img src="{{ asset('storage/' . $detail->produk->foto) }}" alt="{{ $detail->produk->nama }}" class="product-img-thumb border border-secondary">
                                            @else
                                                <div class="product-img-thumb bg-dark d-flex align-items-center justify-content-center text-secondary border border-secondary small">
                                                    📷
                                                </div>
                                            @endif
                                        </td>
                                        <td class="fw-semibold text-white">
                                            {{ $detail->produk->nama ?? 'Produk Dihapus' }}
                                        </td>
                                        <td class="text-center fw-semibold text-light">
                                            {{ $detail->kuantitas ?? $detail->jumlah ?? 0 }}
                                        </td>
                                        <td class="text-end text-light">
                                            Rp {{ number_format($detail->harga_satuan ?? 0, 0, ',', '.') }}
                                        </td>
                                        <td class="text-end fw-bold text-info">
                                            Rp {{ number_format($detail->subtotal ?? 0, 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-secondary py-3 small">
                                            Detail item tidak ditemukan.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Ringkasan Total & Pembayaran -->
                    <div class="d-flex justify-content-between align-items-center mt-3 pt-2">
                        <div>
                            <span class="text-secondary small d-block">Metode Pembayaran</span>
                            <span class="badge badge-soft-light px-3 py-2 rounded-pill mt-1">
                                {{ $sale->metode_pembayaran }}
                            </span>
                        </div>
                        <div class="text-end">
                            <span class="text-secondary small d-block">Total Pembayaran</span>
                            <span class="fs-4 fw-bold text-info">Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top-0 pt-0">
                    <button type="button" class="btn btn-secondary rounded-pill px-4 text-white" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection