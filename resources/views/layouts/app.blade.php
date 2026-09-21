<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Aplikasi' }}</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        /* =========================
           BODY
        ========================= */
        body {
            margin: 0;
            padding: 0;
            background-color: #0d1117;
            color: #ffffff;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* =========================
           CONTAINER
        ========================= */
        .main-container {
            width: 100%;
            max-width: 1170px;
            margin: 0 auto;
            padding: 30px 0;
        }

        /* =========================
           TITLE
        ========================= */
        .page-title {
            color: #ffffff;
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        /* =========================
           CARD
        ========================= */
        .form-card {
            background-color: #111827;
            border: 1px solid #202938;
            border-radius: 10px;
            padding: 45px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.15);
        }

        /* =========================
           LABEL
        ========================= */
        .form-label {
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        /* =========================
           INPUT
        ========================= */
        .form-control,
        .form-select {
            height: 43px;
            background-color: #1b2537;
            border: 1px solid #2c394e;
            border-radius: 6px;
            color: #ffffff;
            font-size: 14px;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #1b2537;
            color: #ffffff;
            border-color: #3b82f6;
            box-shadow: none;
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        /* File input */
        input[type="file"] {
            padding: 8px 12px;
        }

        input[type="file"]::file-selector-button {
            background-color: #e5e7eb;
            color: #111827;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            margin-right: 10px;
        }

        /* =========================
           PREVIEW
        ========================= */
        .preview-container {
            min-height: 100px;
        }

        #preview {
            max-width: 150px;
            max-height: 150px;
            object-fit: cover;
            border-radius: 6px;
            border: 1px solid #374151;
            padding: 4px;
            background-color: #1b2537;
        }

        /* =========================
           BUTTON
        ========================= */
        .btn {
            font-size: 14px;
            font-weight: 600;
            padding: 8px 22px;
            border-radius: 5px;
        }

        .btn-success {
            background-color: #198754;
            border-color: #198754;
        }

        .btn-success:hover {
            background-color: #157347;
            border-color: #146c43;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #bb2d3b;
            border-color: #b02a37;
        }

        /* =========================
           ERROR
        ========================= */
        .invalid-feedback {
            color: #ff6b6b;
            font-size: 13px;
        }

        .is-invalid {
            border-color: #dc3545 !important;
        }

        /* =========================
           RESPONSIVE
        ========================= */
        @media (max-width: 1200px) {
            .main-container {
                max-width: 95%;
            }
        }

        @media (max-width: 768px) {
            .main-container {
                max-width: 100%;
                padding: 20px 15px;
            }

            .form-card {
                padding: 25px 20px;
            }

            .page-title {
                font-size: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="main-container">
        @yield('content')
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
