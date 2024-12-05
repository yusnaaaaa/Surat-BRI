<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Inter', sans-serif;
        }
        .card-button {
            cursor: pointer;
            transition: transform 0.2s;
        }
        .card-button:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        .welcome-title {
            color: #0051A0;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/logo-BRI.png') }}" alt="BRI Logo" width="80" height="auto" class="me-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item me-3">
                        <span class="nav-link">You're logged in as, <strong>{{ auth()->user()->name ?? 'User' }}</strong></span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container py-4">
        <div class="row text-center mb-4">
            <h2 class="welcome-title">Welcome To SuratBRI</h2>
        </div>

        <!-- Cards Section -->
        <div class="row justify-content-center">
            <div class="col-md-3 mb-3">
                <div class="card card-button shadow text-center" onclick="window.location.href='/surat_biasa'">
                    <div class="card-body">
                        <h5 class="card-title">Surat Biasa</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-button shadow text-center" onclick="window.location.href='/surat_intern'">
                    <div class="card-body">
                        <h5 class="card-title">Surat Intern</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card card-button shadow text-center" onclick="window.location.href='/surat_rahasia'">
                    <div class="card-body">
                        <h5 class="card-title">Surat Rahasia</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-4">
        <small>&copy; 2024 SuratBRI - All Rights Reserved</small>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
