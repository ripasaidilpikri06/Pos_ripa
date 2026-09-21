@extends('layouts.app')

@section('title', 'Users')

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

    /* Badges */
    .badge-soft-info { 
        background-color: rgba(14, 165, 233, 0.25); 
        color: #38bdf8; 
        border: 1px solid rgba(14, 165, 233, 0.4); 
    }
</style>

<div class="dashboard-container">
    <!-- Header Page -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 pb-2 border-bottom border-secondary border-opacity-25">
        <div>
            <h1 class="fw-bold text-white m-0">👥 Halaman Users</h1>
            <p class="text-secondary small m-0 mt-1">
                Kelola data pengguna, hak akses, dan peran dalam sistem.
            </p>
        </div>
        <div class="mt-3 mt-md-0">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary px-4 py-2 rounded-pill fw-semibold shadow-sm">
                ➕ Create User
            </a>
        </div>
    </div>

    <!-- Card Wrapper -->
    <div class="card dashboard-card p-4">
        <!-- Form Search -->
        <form action="{{ route('admin.users') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input 
                    type="text" 
                    name="search" 
                    value="{{ request('search') }}" 
                    class="form-control form-control-lg border-end-0 rounded-start-pill ps-4" 
                    placeholder="Search username or email..."
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
                        <th scope="col" width="8%">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col" class="text-center" width="22%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="text-light fw-medium">{{ $users->firstItem() + $loop->index }}</td>
                            <td class="fw-bold text-white">{{ $user->name }}</td>
                            <td class="text-secondary">{{ $user->email }}</td>
                            <td>
                                <span class="badge badge-soft-info px-3 py-1.5 rounded-pill fw-semibold">
                                    {{ $user->role->name }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-warning rounded-pill px-3 me-1 fw-semibold text-dark">
                                    ✏️ Edit akun
                                </a>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger rounded-pill px-3 fw-semibold" onclick="return confirm('Yakin hapus user ini?')">
                                        🗑️ Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-secondary small">
                                Data user tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($users->hasPages())
            <div class="d-flex justify-content-end mt-4">
                {{ $users->links() }}
            </div>
        @endif
    </div>
</div>

@endsection