@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-4 fw-bold" style="color: #0051A0; font-size: 1.5rem;">Edit Surat Biasa</h1>
        <!-- Tombol kembali ke halaman surat biasa -->
        <a href="{{ url('/surat_biasa') }}" class="btn btn-secondary">Kembali ke Halaman Surat Biasa</a>
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
    <form action="{{ url('/surat_biasa/' . $surat->id) }}" method="POST" class="shadow p-4 bg-white rounded">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" value="{{ old('tanggal_masuk', $surat->tanggal_masuk) }}" required>
            </div>
            <div class="col-md-6">
                <label for="no_reg" class="form-label">Nomor Registrasi</label>
                <input type="text" name="no_reg" class="form-control" id="no_reg" value="{{ old('no_reg', $surat->no_reg) }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="bendel" class="form-label">Bendel</label>
                <input type="text" name="bendel" class="form-control" id="bendel" value="{{ old('bendel', $surat->bendel) }}" required>
            </div>
            <div class="col-md-6">
                <label for="pengirim" class="form-label">Pengirim</label>
                <input type="text" name="pengirim" class="form-control" id="pengirim" value="{{ old('pengirim', $surat->pengirim) }}" required>
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
                <label for="kepada" class="form-label">Kepada</label>
                <input type="text" name="kepada" class="form-control" id="kepada" value="{{ old('kepada', $surat->kepada) }}" required>
            </div>
            <div class="col-md-6">
                <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                <input type="date" name="tanggal_keluar" class="form-control" id="tanggal_keluar" value="{{ old('tanggal_keluar', $surat->tanggal_keluar) }}">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="disposisi" class="form-label">Disposisi</label>
                <input type="text" name="disposisi" class="form-control" id="disposisi" value="{{ old('disposisi', $surat->disposisi) }}">
            </div>
            <div class="col-md-6">
                <label for="tindak_lanjut" class="form-label">Tindak Lanjut</label>
                <input type="text" name="tindak_lanjut" class="form-control" id="tindak_lanjut" value="{{ old('tindak_lanjut', $surat->tindak_lanjut) }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="tanggal_penyelesaian" class="form-label">Tanggal Penyelesaian</label>
            <input type="date" name="tanggal_penyelesaian" class="form-control" id="tanggal_penyelesaian" value="{{ old('tanggal_penyelesaian', $surat->tanggal_penyelesaian) }}">
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary" style="background-color: #0051A0; border-color: #0051A0;">Simpan</button>
            <a href="{{ url('/surat_biasa') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
    <!-- Footer -->
    <footer class="text-center py-3 mt-4" style="background-color: transparent;">
        <small>&copy; 2024 ITEDepartement - All Rights Reserved</small>
    </footer>
</div>
@endsection
