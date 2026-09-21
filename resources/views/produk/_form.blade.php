<style>
    /* =========================================
       BACKGROUND
    ========================================= */

    body {
        background: #0b0f14 !important;
        color: #ffffff !important;
        min-height: 100vh;
    }

    /* =========================================
       CONTAINER FORM
    ========================================= */

    .product-form-container {
        max-width: 1100px;
        margin: 0 auto;
        padding: 10px 20px 40px;
    }

    /* =========================================
       JANGAN BUAT JUDUL TAMBAHAN
    ========================================= */

    .product-form-container .form-label {
        color: #ffffff !important;
        font-weight: 600;
        margin-bottom: 7px;
    }

    /* =========================================
       INPUT
    ========================================= */

    .product-form-container .form-control {
        background: #1a2535 !important;
        border: 1px solid #34445a !important;
        color: #ffffff !important;
        height: 42px;
        border-radius: 5px;
    }

    .product-form-container .form-control:focus {
        background: #1a2535 !important;
        color: #ffffff !important;
        border-color: #0d6efd !important;
        box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, .15) !important;
    }

    .product-form-container .form-control::placeholder {
        color: #8fa6c2 !important;
    }

    /* =========================================
       FILE INPUT
    ========================================= */

    .product-form-container input[type="file"] {
        color: #ffffff !important;
        background: #1a2535 !important;
        height: 42px;
    }

    .product-form-container input[type="file"]::file-selector-button {
        background: #f8f9fa;
        color: #212529;
        border: 0;
        height: 40px;
        padding: 0 12px;
        margin-right: 10px;
        cursor: pointer;
    }

    /* =========================================
       FOTO
    ========================================= */

    .preview-box {
        min-height: 42px;
    }

    #preview {
        max-width: 150px;
        max-height: 150px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #34445a !important;
        padding: 3px;
        background: #1a2535;
    }

    .current-photo {
        max-width: 150px;
        max-height: 150px;
        object-fit: cover;
        border-radius: 8px;
        border: 2px solid #34445a !important;
        padding: 3px;
    }

    /* =========================================
       ERROR
    ========================================= */

    .invalid-feedback {
        color: #ff6b6b !important;
    }

    .is-invalid {
        border-color: #dc3545 !important;
    }

    /* =========================================
       BUTTON
    ========================================= */

    .btn-save-product {
        background: #198754 !important;
        border-color: #198754 !important;
        color: #ffffff !important;
        font-weight: 700;
        padding: 9px 24px;
    }

    .btn-save-product:hover {
        background: #157347 !important;
        color: #ffffff !important;
    }

    .btn-back-product {
        background: #6c757d !important;
        border-color: #6c757d !important;
        color: #ffffff !important;
        font-weight: 700;
        padding: 9px 24px;
    }

    .btn-back-product:hover {
        background: #5c636a !important;
        color: #ffffff !important;
    }

    /* =========================================
       JARAK FORM
    ========================================= */

    .product-form-container .mb-3 {
        margin-bottom: 18px !important;
    }

    .product-form-container .image-row {
        margin-bottom: 18px !important;
    }

    /* =========================================
       RESPONSIVE
    ========================================= */

    @media (max-width: 767px) {

        .product-form-container {
            padding: 10px 15px 30px;
        }

        .image-row .col-md-6 {
            margin-bottom: 15px;
        }

    }
</style>


<div class="product-form-container">

    @csrf


    {{-- =========================================
         FOTO SAAT INI - MODE EDIT
    ========================================== --}}

    @if (!empty($produk->foto))

        <div class="mb-3">

            <label class="form-label">
                Foto Saat Ini
            </label>

            <br>

            <img
                src="{{ asset('storage/' . $produk->foto) }}"
                alt="Foto Produk"
                class="current-photo"
            >

        </div>

    @endif


    {{-- =========================================
         GAMBAR + PREVIEW
    ========================================== --}}

    <div class="row image-row">

        <div class="col-md-6">

            <label class="form-label">
                Gambar
            </label>

            <input
                type="file"
                name="foto"
                onchange="previewImage(this)"
                accept="image/*"
                class="form-control @error('foto') is-invalid @enderror"
            >

            @error('foto')

                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>

            @enderror

        </div>


        <div class="col-md-6">

            <label class="form-label">
                Preview Foto
            </label>

            <div class="preview-box">

                <img
                    id="preview"
                    src=""
                    alt="Preview Foto"
                    style="display: none;"
                >

            </div>

        </div>

    </div>


    {{-- =========================================
         NAMA PRODUK
    ========================================== --}}

    <div class="mb-3">

        <label class="form-label">
            Nama Produk
        </label>

        <input
            type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $produk->nama ?? '') }}"
            placeholder="Masukkan nama produk"
        >

        @error('name')

            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>

        @enderror

    </div>


    {{-- =========================================
         HARGA BELI
    ========================================== --}}

    <div class="mb-3">

        <label class="form-label">
            Harga Beli
        </label>

        <input
            type="number"
            name="purchase_price"
            class="form-control @error('purchase_price') is-invalid @enderror"
            value="{{ old('purchase_price', $produk->harga_beli ?? '') }}"
            placeholder="Masukkan harga beli"
            min="0"
        >

        @error('purchase_price')

            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>

        @enderror

    </div>


    {{-- =========================================
         HARGA JUAL
    ========================================== --}}

    <div class="mb-3">

        <label class="form-label">
            Harga Jual
        </label>

        <input
            type="number"
            name="selling_price"
            class="form-control @error('selling_price') is-invalid @enderror"
            value="{{ old('selling_price', $produk->harga_jual ?? '') }}"
            placeholder="Masukkan harga jual"
            min="0"
        >

        @error('selling_price')

            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>

        @enderror

    </div>


    {{-- =========================================
         STOK
    ========================================== --}}

    <div class="mb-3">

        <label class="form-label">
            Stok
        </label>

        <input
            type="number"
            name="stock"
            class="form-control @error('stock') is-invalid @enderror"
            value="{{ old('stock', $produk->stok ?? '') }}"
            placeholder="Masukkan jumlah stok"
            min="0"
        >

        @error('stock')

            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>

        @enderror

    </div>


    {{-- =========================================
         TOMBOL
    ========================================== --}}

    <div class="mt-3">

        <button
            type="submit"
            class="btn btn-save-product me-1"
        >
            Simpan
        </button>


        <a
            href="{{ route('produk.index') }}"
            class="btn btn-back-product"
        >
            Kembali
        </a>

    </div>

</div>


<script>

function previewImage(input) {

    const preview = document.getElementById('preview');

    const file = input.files[0];

    if (file) {

        const reader = new FileReader();

        reader.onload = function(e) {

            preview.src = e.target.result;

            preview.style.display = 'block';

        };

        reader.readAsDataURL(file);

    } else {

        preview.src = '';

        preview.style.display = 'none';

    }

}

</script>