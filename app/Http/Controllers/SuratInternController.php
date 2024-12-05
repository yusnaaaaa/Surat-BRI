<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratIntern;

class SuratInternController extends Controller
{
    /**
     * Menampilkan daftar surat intern dengan fitur pencarian.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $surats = SuratIntern::when($search, function ($query, $search) {
            return $query->where('nomor_surat', 'like', "%{$search}%")
                         ->orWhere('bagian', 'like', "%{$search}%")
                         ->orWhere('dari', 'like', "%{$search}%");
        })->paginate(10);

        return view('surat_intern.index', compact('surats'));
    }

    /**
     * Menampilkan halaman form tambah surat intern.
     */
    public function create()
    {
        return view('surat_intern.create');
    }

    /**
     * Menyimpan data surat intern yang baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'bagian' => 'required|string',
            'dari' => 'required|string',
            'bendel' => 'required|string',
            'nomor_surat' => 'required|string',
            'perihal' => 'required|string',
            'masuk_ke' => 'required|string',
            'tanggal_kembali' => 'nullable|date',
        ]);

        SuratIntern::create($request->all());

        return redirect('/surat_intern')->with('status', 'Berhasil menambahkan surat intern!');
    }

    /**
     * Menampilkan halaman form edit surat intern.
     */
    public function edit($id)
    {
        $surat = SuratIntern::findOrFail($id);
        return view('surat_intern.edit', compact('surat'));
    }

    /**
     * Mengupdate data surat intern yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'bagian' => 'required|string',
            'dari' => 'required|string',
            'bendel' => 'required|string',
            'nomor_surat' => 'required|string',
            'perihal' => 'required|string',
            'masuk_ke' => 'required|string',
            'tanggal_kembali' => 'nullable|date',
        ]);

        $surat = SuratIntern::findOrFail($id);
        $surat->update($request->all());

        return redirect('/surat_intern')->with('status', 'Berhasil mengubah surat intern!');
    }

    /**
     * Menghapus data surat intern.
     */
    public function destroy($id)
    {
        SuratIntern::findOrFail($id)->delete();
        return redirect('/surat_intern')->with('status', 'Berhasil menghapus surat intern!');
    }
}
