<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm" style="padding: 0.5rem 1rem;">
    <div class="container-fluid">
        <!-- Logo dan Brand -->
        <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo-BRI.png') }}" alt="Logo" style="height: 30px; max-height: 30px;" class="me-2">
        </a>

        <!-- Toggler untuk tampilan mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navbar -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Informasi Pengguna -->
                <li class="nav-item d-flex align-items-center">
                    <span class="nav-link m-0 p-0">You're logged in as <strong>{{ auth()->user()->name }}</strong></span>
                </li>

                <!-- Tombol Logout -->
                <li class="nav-item ms-3">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>
