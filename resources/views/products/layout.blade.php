<!DOCTYPE html>
<html>
    <head>
        <title>PT Electronic</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <style>
            body {
                background-color: #e3f2fd; /* Ganti dengan kode warna yang Anda inginkan */
            }
            .navbar-nav .nav-link {
                font-size: 20px; /* Atur ukuran font sesuai preferensi Anda */
            }
        </style>
    </head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Company Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item {{ Request::is('testing1*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('testing1.index') }}">Soal Test 1</a>
                    </li>
                    <li class="nav-item {{ Request::is('testing1*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('testing2.index') }}">Soal Test 2</a>
                    </li>
                    <li class="nav-item {{ Request::is('karyawan*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('karyawan.index') }}">Karyawan</a>
                    </li>
                    <li class="nav-item {{ Request::is('jabatan*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('jabatan.index') }}">Jabatan</a>
                    </li>
                    <li class="nav-item {{ Request::is('level*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('level.index') }}">Level</a>
                    </li>
                    <li class="nav-item {{ Request::is('department*') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('department.index') }}">Department</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>
</html>
