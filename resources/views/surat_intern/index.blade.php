@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4 fw-bold" style="color: #0051A0; font-size: 1.5rem;">Daftar Surat Intern</h1>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="mb-3 d-flex justify-content-between align-items-center">
        <!-- Form Pencarian -->
        <form action="{{ route('surat_intern.index') }}" method="GET" class="d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari surat intern..." value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary" style="background-color: #0051A0; border-color: #0051A0;">Cari</button>
        </form>

        <div>
            <a href="/dashboard" class="btn btn-secondary">Kembali ke Dashboard</a>
            <a href="/surat_intern/create" class="btn btn-primary" style="background-color: #0051A0; border-color: #0051A0;">Tambah Surat Intern</a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover table-sm align-middle">
            <thead class="text-white" style="background-color: #0051A0;">
                <tr>
                    @foreach([
                        'no' => 'No',
                        'tanggal_masuk' => 'Tanggal Masuk',
                        'bagian' => 'Bagian',
                        'dari' => 'Dari',
                        'bendel' => 'Bendel',
                        'nomor_surat' => 'Nomor Surat',
                        'perihal' => 'Perihal',
                        'masuk_ke' => 'Masuk Ke',
                        'tanggal_kembali' => 'Tanggal Kembali'
                    ] as $column => $label)
                        <th>
                            <a href="{{ route('surat_intern.index', [
                                'sort' => request('sort') === 'asc' && request('column') === $column ? 'desc' : 'asc',
                                'column' => $column
                            ]) }}" class="text-dark">
                                {{ $label }}
                                @if(request('column') === $column)
                                    @if(request('sort') === 'asc')
                                        <i class="bi bi-arrow-down"></i>
                                    @elseif(request('sort') === 'desc')
                                        <i class="bi bi-arrow-up"></i>
                                    @endif
                                @else
                                    <i class="bi bi-arrow-down-up"></i>
                                @endif
                            </a>
                        </th>
                    @endforeach
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($surats as $surat)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($surat->tanggal_masuk)->format('Y-m-d') }}</td>
                        <td>{{ $surat->bagian }}</td>
                        <td>{{ $surat->dari }}</td>
                        <td>{{ $surat->bendel }}</td>
                        <td>{{ $surat->nomor_surat }}</td>
                        <td>{{ $surat->perihal }}</td>
                        <td>{{ $surat->masuk_ke }}</td>
                        <td>{{ $surat->tanggal_kembali ? \Carbon\Carbon::parse($surat->tanggal_kembali)->format('Y-m-d') : '-' }}</td>
                        <td class="text-center">
                            <a href="{{ url('/surat_intern/' . $surat->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ url('/surat_intern/' . $surat->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center">Tidak ada data surat intern</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $surats->links('pagination::bootstrap-5') }}
    </div>
    <footer class="bg-light text-center py-3 mt-4">
        <small>&copy; 2024 SuratBRI - All Rights Reserved</small>
    </footer>
</div>
@endsection
