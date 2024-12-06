@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-4 fw-bold" style="color: #0051A0; font-size: 1.5rem;">Edit Surat Rahasia</h1>
        <!-- Tombol kembali ke halaman surat rahasia -->
        <a href="{{ url('/surat_rahasia') }}" class="btn btn-secondary">Kembali ke Halaman Surat Rahasia</a>
    </div>

    <!-- Menampilkan error validasi -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk mengedit surat -->
    <form action="{{ url('/surat_rahasia/' . $surat->id) }}" method="POST" class="shadow p-4 bg-white rounded">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" value="{{ old('tanggal_masuk', $surat->tanggal_masuk) }}" required>
            </div>
            <div class="col-md-6">
                <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" class="form-control" id="tanggal_surat" value="{{ old('tanggal_surat', $surat->tanggal_surat) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="bendel" class="form-label">Bendel</label>
                <input type="text" name="bendel" class="form-control" id="bendel" value="{{ old('bendel', $surat->bendel) }}" required>
            </div>
            <div class="col-md-6">
                <label for="dari" class="form-label">Dari</label>
                <input type="text" name="dari" class="form-control" id="dari" value="{{ old('dari', $surat->dari) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nomor_surat" class="form-label">Nomor Surat</label>
                <input type="text" name="nomor_surat" class="form-control" id="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}" required>
            </div>
            <div class="col-md-6">
                <label for="perihal" class="form-label">Perihal</label>
                <input type="text" name="perihal" class="form-control" id="perihal" value="{{ old('perihal', $surat->perihal) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="masuk_ke" class="form-label">Masuk Ke</label>
                <input type="text" name="masuk_ke" class="form-control" id="masuk_ke" value="{{ old('masuk_ke', $surat->masuk_ke) }}" required>
            </div>
            <div class="col-md-6">
                <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                <input type="date" name="tanggal_keluar" class="form-control" id="tanggal_keluar" value="{{ old('tanggal_keluar', $surat->tanggal_keluar) }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="disposisi" class="form-label">Disposisi</label>
            <input type="text" name="disposisi" class="form-control" id="disposisi" value="{{ old('disposisi', $surat->disposisi) }}">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary" style="background-color: #0051A0; border-color: #0051A0;">Simpan</button>
            <a href="{{ url('/surat_rahasia') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
    <!-- Footer -->
    <footer class="text-center py-3 mt-4" style="background-color: transparent;">
        <small>&copy; 2024 ITEDepartement - All Rights Reserved</small>
    </footer>
</div>
@endsection
