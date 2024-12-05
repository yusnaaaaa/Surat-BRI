@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 fw-bold" style="color: #0051A0; font-size: 1.5rem;">Daftar Surat Biasa</h1>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <!-- Form Pencarian -->
        <form action="{{ route('surat_biasa.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari surat..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary" style="background-color: #0051A0; border-color: #0051A0;">Cari</button>
        </form>

        <div>
            <a href="/dashboard" class="btn btn-secondary">Kembali ke Dashboard</a>
            <a href="/surat_biasa/create" class="btn btn-primary" style="background-color: #0051A0; border-color: #0051A0;">Tambah Surat Biasa</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="text-white" style="background-color: #0051A0;">
                <tr>
                    <th>No</th>
                    <th>Tanggal Masuk</th>
                    <th>No Registrasi</th>
                    <th>Bendel</th>
                    <th>Pengirim</th>
                    <th>Nomor Surat</th>
                    <th>Perihal</th>
                    <th>Kepada</th>
                    <th>Tanggal Keluar</th>
                    <th>Disposisi</th>
                    <th>Tindak Lanjut</th>
                    <th>Tanggal Penyelesaian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($surats as $surat)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($surat->tanggal_masuk)->format('Y-m-d') }}</td>
                        <td>{{ $surat->no_reg }}</td>
                        <td>{{ $surat->bendel }}</td>
                        <td>{{ $surat->pengirim }}</td>
                        <td>{{ $surat->nomor_surat }}</td>
                        <td>{{ $surat->perihal }}</td>
                        <td>{{ $surat->kepada }}</td>
                        <td>{{ $surat->tanggal_keluar ? \Carbon\Carbon::parse($surat->tanggal_keluar)->format('Y-m-d') : '-' }}</td>
                        <td>{{ $surat->disposisi ?? '-' }}</td>
                        <td>{{ $surat->tindak_lanjut ?? '-' }}</td>
                        <td>{{ $surat->tanggal_penyelesaian ? \Carbon\Carbon::parse($surat->tanggal_penyelesaian)->format('Y-m-d') : '-' }}</td>
                        <td class="text-center">
                            <a href="{{ url('/surat_biasa/' . $surat->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ url('/surat_biasa/' . $surat->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="13" class="text-center">Tidak ada data surat biasa</td>
                    </tr>
                @endforelse

                {{-- Tambahkan ini untuk menampilkan pesan jika hasil pencarian kosong --}}
                @if ($surats->isEmpty())
                    <div class="alert alert-warning text-center">Tidak ada data yang sesuai dengan pencarian.</div>
                @endif
            </tbody>

        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $surats->links('pagination::bootstrap-5') }}
    </div>
    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-4">
        <small>&copy; 2024 SuratBRI - All Rights Reserved</small>
    </footer>
</div>
@endsection