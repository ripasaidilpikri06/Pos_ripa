@extends('layouts.app')

@section('content')
<div class="container-fluid px-0 m-0" style="background-color: #0d1117; min-height: 100vh; position: absolute; top: 0; left: 0; width: 100%; padding-top: 80px !important;">
    <div class="container py-4">
        <!-- Header Halaman -->
        <div class="mb-4 px-3">
            <h3 class="text-white fw-bold" style="font-size: 24px;">
                {{ isset($user) ? 'Edit User' : 'Tambah User' }}
            </h3>
        </div>

        <!-- Card Form -->
        <div class="card border-0 shadow-lg mx-3" style="background-color: #121824; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.05) !important;">
            <div class="card-body p-4 p-md-5">
                <form action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="POST">
                    @csrf
                    @isset($user)
                        @method('PUT')
                    @endisset

                    <div class="mb-3">
                        <label class="form-label text-light fw-medium">Name</label>
                        <input type="text" name="name"
                               class="form-control text-light @error('name') is-invalid @enderror"
                               style="background-color: #1a2234; border-color: #2a3447; padding: 10px 15px;"
                               value="{{ old('name', $user->name ?? '') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light fw-medium">Email</label>
                        <input type="email" name="email"
                               class="form-control text-light @error('email') is-invalid @enderror"
                               style="background-color: #1a2234; border-color: #2a3447; padding: 10px 15px;"
                               value="{{ old('email', $user->email ?? '') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light fw-medium">Password</label>
                        <input type="password" name="password"
                               class="form-control text-light @error('password') is-invalid @enderror"
                               style="background-color: #1a2234; border-color: #2a3447; padding: 10px 15px;">
                        <small class="text-muted">Kosongkan jika tidak ingin mengubah password.</small>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label text-light fw-medium">Role</label>
                        <select name="role_id" 
                                class="form-select text-light @error('role_id') is-invalid @enderror"
                                style="background-color: #1a2234; border-color: #2a3447; padding: 10px 15px;">
                            <option value="" style="background-color: #1a2234; color: #adb5bd;">-- Pilih Role --</option>
                            @foreach($roles as $role)
                                 <option value="{{ $role->id }}" style="background-color: #1a2234; color: #fff;"
                                     @selected(old('role_id', $user->role_id ?? '') == $role->id)>
                                     {{ ucfirst($role->name) }}
                                 </option>
                            @endforeach
                        </select>
                        @error('role_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2 pt-2">
                        <button type="submit" class="btn btn-success px-4 fw-semibold" style="background-color: #198754; border: none;">
                            {{ isset($user) ? 'Perbarui' : 'Simpan' }}
                        </button>
                        <a href="{{ route('admin.users') }}" class="btn btn-secondary px-4 fw-semibold" style="background-color: #dc3545; border: none;">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection