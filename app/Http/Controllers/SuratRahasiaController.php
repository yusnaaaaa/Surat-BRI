<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SuratRahasia;

class SuratRahasiaController extends Controller
{
    /**
     * Menampilkan daftar surat rahasia dengan fitur pencarian.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $surats = SuratRahasia::when($search, function ($query, $search) {
            return $query->where('nomor_surat', 'like', "%{$search}%")
                         ->orWhere('dari', 'like', "%{$search}%")
                         ->orWhere('perihal', 'like', "%{$search}%");
        })->paginate(10);

        return view('surat_rahasia.index', compact('surats'));
    }

    /**
     * Menampilkan halaman form tambah surat rahasia.
     */
    public function create()
    {
        return view('surat_rahasia.create');
    }

    /**
     * Menyimpan data surat rahasia yang baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'tanggal_surat' => 'required|date',
            'bendel' => 'required|string',
            'dari' => 'required|string',
            'nomor_surat' => 'required|string',
            'perihal' => 'required|string',
            'masuk_ke' => 'required|string',
            'tanggal_keluar' => 'nullable|date',
            'disposisi' => 'nullable|string',
        ]);

        SuratRahasia::create($request->all());

        return redirect('/surat_rahasia')->with('status', 'Berhasil menambahkan surat rahasia!');
    }

    /**
     * Menampilkan halaman form edit surat rahasia.
     */
    public function edit($id)
    {
        $surat = SuratRahasia::findOrFail($id);
        return view('surat_rahasia.edit', compact('surat'));
    }

    /**
     * Mengupdate data surat rahasia yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_masuk' => 'required|date',
            'tanggal_surat' => 'required|date',
            'bendel' => 'required|string',
            'dari' => 'required|string',
            'nomor_surat' => 'required|string',
            'perihal' => 'required|string',
            'masuk_ke' => 'required|string',
            'tanggal_keluar' => 'nullable|date',
            'disposisi' => 'nullable|string',
        ]);

        $surat = SuratRahasia::findOrFail($id);
        $surat->update($request->all());

        return redirect('/surat_rahasia')->with('status', 'Berhasil mengubah surat rahasia!');
    }

    /**
     * Menghapus data surat rahasia.
     */
    public function destroy($id)
    {
        SuratRahasia::findOrFail($id)->delete();
        return redirect('/surat_rahasia')->with('status', 'Berhasil menghapus surat rahasia!');
    }
}
