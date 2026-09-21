@extends('layouts.app')

@section('title', 'Login Toko Sneakers')

@section('content')

<!-- Custom CSS Styling - Dark Luxury Theme -->
<style>
    body {
        background-color: #07090e;
        background-image: 
            radial-gradient(at 0% 0%, rgba(29, 78, 216, 0.25) 0px, transparent 50%),
            radial-gradient(at 100% 0%, rgba(14, 165, 233, 0.2) 0px, transparent 50%),
            radial-gradient(at 100% 100%, rgba(15, 23, 42, 0.95) 0px, transparent 50%);
        background-attachment: fixed;
        min-height: 100vh;
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        color: #f8fafc;
    }

    /* Card Login dengan Dark Glassmorphism */
    .login-card {
        width: 100%;
        max-width: 420px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        background: rgba(13, 19, 33, 0.85);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.7);
    }

    .login-header {
        background: transparent !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        padding: 1.5rem 1.5rem 1rem 1.5rem;
    }

    /* Form Input Styling */
    .form-control {
        background-color: rgba(15, 23, 42, 0.7) !important;
        border-color: rgba(255, 255, 255, 0.1) !important;
        color: #f8fafc !important;
        border-radius: 10px;
        padding: 0.75rem 1rem;
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

    .form-label {
        font-weight: 500;
        color: #cbd5e1;
        font-size: 0.9rem;
    }
</style>

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="card login-card text-center position-relative">
        <div class="login-header">
            <h4 class="fw-bold text-white m-0">🛒 Login Toko Sneakers</h4>
            <p class="text-secondary small mt-1 mb-0">Silakan masuk menggunakan akun Anda</p>
        </div>
        
        <div class="card-body p-4 text-start">
            <form action="{{ route('auth') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="nama@email.com" aria-describedby="emailHelp">
                    @error('email')
                        <div class="badge text-bg-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="••••••••">
                    @error('password')
                        <div class="badge text-bg-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 py-2 rounded-pill fw-semibold shadow-sm">
                    🚀 Masuk
                </button>
            </form>
        </div>
    </div>
</div>

@endsection