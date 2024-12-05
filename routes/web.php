<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratBiasaController;
use App\Http\Controllers\SuratInternController;
use App\Http\Controllers\SuratRahasiaController;
use Illuminate\Support\Facades\Route;

// Rute Welcome atau Login
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard'); // Jika sudah login, arahkan ke dashboard
    }
    return view('auth.login'); // Jika belum login, tampilkan halaman login
})->name('home');

// Rute Register
Route::get('/register', function () {
    return view('auth.register');
})->middleware('guest')->name('register');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute Logout
Route::post('/logout', function () {
    auth()->logout(); // Logout pengguna
    return redirect('/'); // Redirect ke halaman login (welcome)
})->name('logout');

// Middleware untuk akses terautentikasi
Route::middleware('auth')->group(function () {
    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Surat Biasa
    Route::get('/surat_biasa', [SuratBiasaController::class, 'index'])->name('surat_biasa.index');
    Route::post('/surat_biasa', [SuratBiasaController::class, 'store'])->name('surat_biasa.store');
    Route::get('/surat_biasa/create', [SuratBiasaController::class, 'create'])->name('surat_biasa.create');
    Route::get('/surat_biasa/{id}', [SuratBiasaController::class, 'show'])->name('surat_biasa.show');
    Route::get('/surat_biasa/{id}/edit', [SuratBiasaController::class, 'edit'])->name('surat_biasa.edit');
    Route::put('/surat_biasa/{id}', [SuratBiasaController::class, 'update'])->name('surat_biasa.update');
    Route::delete('/surat_biasa/{id}', [SuratBiasaController::class, 'destroy'])->name('surat_biasa.destroy');

    // Surat Intern
    Route::get('/surat_intern', [SuratInternController::class, 'index'])->name('surat_intern.index');
    Route::post('/surat_intern', [SuratInternController::class, 'store'])->name('surat_intern.store');
    Route::get('/surat_intern/create', [SuratInternController::class, 'create'])->name('surat_intern.create');
    Route::get('/surat_intern/{id}', [SuratInternController::class, 'show'])->name('surat_intern.show');
    Route::get('/surat_intern/{id}/edit', [SuratInternController::class, 'edit'])->name('surat_intern.edit');
    Route::put('/surat_intern/{id}', [SuratInternController::class, 'update'])->name('surat_intern.update');
    Route::delete('/surat_intern/{id}', [SuratInternController::class, 'destroy'])->name('surat_intern.destroy');

    // Surat Rahasia
    Route::get('/surat_rahasia', [SuratRahasiaController::class, 'index'])->name('surat_rahasia.index');
    Route::post('/surat_rahasia', [SuratRahasiaController::class, 'store'])->name('surat_rahasia.store');
    Route::get('/surat_rahasia/create', [SuratRahasiaController::class, 'create'])->name('surat_rahasia.create');
    Route::get('/surat_rahasia/{id}', [SuratRahasiaController::class, 'show'])->name('surat_rahasia.show');
    Route::get('/surat_rahasia/{id}/edit', [SuratRahasiaController::class, 'edit'])->name('surat_rahasia.edit');
    Route::put('/surat_rahasia/{id}', [SuratRahasiaController::class, 'update'])->name('surat_rahasia.update');
    Route::delete('/surat_rahasia/{id}', [SuratRahasiaController::class, 'destroy'])->name('surat_rahasia.destroy');
});

require __DIR__ . '/auth.php';
